<?php

namespace frontend\controllers;

use common\models\Carrinho;
use common\models\Faturas;
use common\models\LinhaCarrinho;
use common\models\LinhaFatura;
use common\models\Produto;
use Exception;
use frontend\models\SearchCarrinho;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Carbon\Carbon;
use yii\web\Response;


/**
 * CarrinhoController implements the CRUD actions for Carrinho model.
 */
class CarrinhoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['view','adicionar-ao-carrinho','update-quantidade','concluir-carrinho','delete'],
                        'roles' => ['utente'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Displays a single Carrinho model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionView()
    {

        if (!Yii::$app->user->isGuest) {
            $userId = Yii::$app->user->id;


            $carrinho = Carrinho::find()->where(['user_id' => $userId])->one();

            if ($carrinho) {
                return $this->render('view', [
                    'carrinho' => $carrinho,
                ]);
            }
        }
        return $this->redirect(['/site/login']);
    }

    /**
     * Creates a new Carrinho model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

    public function actionAdicionarAoCarrinho($produtoId)
    {
        if (!Yii::$app->user->isGuest) {
            $userId = Yii::$app->user->id;

            $carrinho = Carrinho::find()->where(['user_id' => $userId])->one();

            if (!$carrinho) {
                $carrinho = new Carrinho();
                $carrinho->user_id = $userId;
                $carrinho->data = Carbon::now();
                $carrinho->save();
            }

            $linhaCarrinho = LinhaCarrinho::find()
                ->where(['carrinho_id' => $carrinho->id, 'produto_id' => $produtoId])
                ->one();

            $produto = Produto::find()->where(['id' => $produtoId])->one();

            if ($linhaCarrinho) {
                $linhaCarrinho->quantidade += 1;
                $linhaCarrinho->recalcularIva();
                $linhaCarrinho->valortotal = $linhaCarrinho->calcularTotal();
            } else {
                $linhaCarrinho = new LinhaCarrinho();
                $linhaCarrinho->carrinho_id = $carrinho->id;
                $linhaCarrinho->quantidade = 1;
                $linhaCarrinho->produto_id = $produto->id;
                $linhaCarrinho->valorunitario = $produto->precounitario;
                $linhaCarrinho->valoriva = $produto->calcularIva();
                $linhaCarrinho->valortotal = $linhaCarrinho->calcularTotal();
            }
            $linhaCarrinho->save();

            return $this->redirect(['produto/']);
        } else {
            return $this->redirect(['/site/login']);
        }
    }


    /**
     * Updates an existing Carrinho model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdateQuantidade($linhaCarrinhoId)
    {
        $linhaCarrinho = LinhaCarrinho::findOne($linhaCarrinhoId);

        if ($linhaCarrinho !== null) {
            $novaQuantidade = Yii::$app->request->post('quantidade')[$linhaCarrinhoId];
            $linhaCarrinho->quantidade = $novaQuantidade;
            $linhaCarrinho->save();

            $linhaCarrinho->recalcularIva();
            $total = $linhaCarrinho->calcularTotal();
            $linhaCarrinho->valortotal = $total;
            $linhaCarrinho->save();
        }
        return $this->redirect(['view']);
    }


    public function actionConcluirCarrinho()
    {
        if (!Yii::$app->user->isGuest) {
            $userId = Yii::$app->user->id;
            $carrinho = Carrinho::find()->where(['user_id' => $userId])->one();


            if ($carrinho) {
                try {
                    $fatura = new Faturas();
                    $fatura->profile_id = $userId;
                    $fatura->data = Carbon::now();
                    $fatura->valortotal = 0;
                    $fatura->ivatotal = 0;
                    $fatura->subtotal = 0;
                    $fatura->estado = 'Pago';

                    if (!$fatura->save()) {
                        throw new Exception('Erro ao guardar a fatura: ' . implode(', ', $fatura->getFirstErrors()));
                    }
                    $linhasCarrinho = $carrinho->getLinhaCarrinhos()->all();
                    foreach ($linhasCarrinho as $linhaCarrinho) {
                        $linhaFatura = new LinhaFatura();
                        $linhaFatura->fatura_id = $fatura->id;
                        $linhaFatura->produto_id = $linhaCarrinho->produto_id;
                        $linhaFatura->quantidade = (int)$linhaCarrinho->quantidade;
                        $linhaFatura->valorunitario = $linhaCarrinho->valorunitario;
                        $linhaFatura->valoriva = $linhaCarrinho->valoriva;
                        $linhaFatura->valortotal = $linhaCarrinho->valortotal;

                        // Atualizar o stock do produto
                        $produto = Produto::findOne($linhaCarrinho->produto_id);
                        if ($produto) {
                            // Verificar se há stock suficiente
                            if ($linhaCarrinho->quantidade <= $produto->stock) {
                                $produto->stock -= $linhaCarrinho->quantidade;
                                if (!$produto->save()) {
                                    throw new Exception('Erro ao atualizar o stock do produto: ' . implode(', ', $produto->getFirstErrors()));
                                }
                            } else {
                                throw new Exception('A Quantidade selecionada é superior ao stock disponível para o  seguinte Produto: ' . $produto->nome );
                            }
                        }

                        if (!$linhaFatura->save()) {
                            throw new Exception('Erro ao guardar a linha de fatura: ' . implode(', ', $linhaFatura->getFirstErrors()));
                        }
                        // Remover a linha do carrinho
                        if (!$linhaCarrinho->delete()) {
                            throw new Exception('Erro ao eliminar a linha do carrinho: ' . implode(', ', $linhaCarrinho->getFirstErrors()));
                        }

                        // Atualiza os valores totais da fatura com base na linha_fatura
                        $fatura->valortotal += $linhaFatura->valortotal;
                        $fatura->ivatotal += $linhaFatura->valoriva;
                        $fatura->subtotal += $linhaFatura->valortotal - $linhaFatura->valoriva;
                    }
                    if (!$fatura->save()) {
                        throw new Exception('Erro ao guardar os valores atualizados da fatura: ' . implode(', ', $fatura->getFirstErrors()));
                    }
                    //Remover o carrinho
                    $carrinho->delete();
                    Yii::$app->session->setFlash('success', 'Carrinho concluído com sucesso!');
                } catch (Exception $e) {
                    Yii::$app->session->setFlash('error', $e->getMessage());
                }
            } else {
                Yii::$app->session->setFlash('error', 'Não foi possível processar a compra do carrinho!');
            }

            return $this->redirect(['produto/']);
        } else {
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Deletes an existing Carrinho model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($linhaCarrinhoId)
    {
        $linhaCarrinho = LinhaCarrinho::findOne($linhaCarrinhoId);

        if (!$linhaCarrinho) {
            throw new NotFoundHttpException('A linha de carrinho não foi encontrada.');
        }
        $carrinhoId = $linhaCarrinho->carrinho_id;

        $linhaCarrinho->delete();
        return $this->redirect(['view']);
    }

    /**
     * Finds the Carrinho model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Carrinho the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Carrinho::findOne(['id' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
