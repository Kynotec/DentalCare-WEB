<?php

namespace frontend\controllers;

use common\models\Carrinho;
use common\models\Faturas;
use common\models\LinhaCarrinho;
use common\models\Produto;
use frontend\models\SearchCarrinho;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Carbon\Carbon;


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
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
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
                $linhaCarrinho->produto_id = $produtoId;
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

        // Recalcula o total do carrinho após a remoção da linha
        //  $this->recalcularTotalCarrinho($carrinhoId);

        // Redireciona para a página do carrinho ou qualquer outra página desejada
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
