<?php

namespace frontend\controllers;

use common\models\Carrinho;
use common\models\LinhaCarrinho;
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

            // Encontrar ou criar o carrinho  do User
            $carrinho = Carrinho::find()->where(['user_id' => $userId])->one();

            if (!$carrinho) {
                $carrinho = new Carrinho();
                $carrinho->user_id = $userId;
                $carrinho->data = Carbon::now();
                $linhaCarrinho = new LinhaCarrinho();
              //  $carrinho->valortotal; falta calcular
                $carrinho->save();
            }

            // Verificar o produto se já existe no carrinho
            $linhaCarrinho = LinhaCarrinho::find()
                ->where(['carrinho_id' => $carrinho->id, 'produto_id' => $produtoId])
                ->one();

            if ($linhaCarrinho) {
                // Se o produto já existe, atualizar a quantidade
                $linhaCarrinho->quantidade += 1;
            } else {
                // Se o produto não existe, criar uma nova linha no carrinho
                $linhaCarrinho = new LinhaCarrinho();
                $linhaCarrinho->carrinho_id = $carrinho->id;
                $linhaCarrinho->quantidade = 1;
                $linhaCarrinho->valortotal = $linhaCarrinho->quantidade * $linhaCarrinho->produto->precounitario;
                //$linhaCarrinho->valoriva = 1; falta calcular

                $linhaCarrinho->produto_id = $produtoId;
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

        // Encontra a LinhaCarrinho pelo ID
        $linhaCarrinho = LinhaCarrinho::findOne($linhaCarrinhoId);

        // Se a LinhaCarrinho não for encontrada, lança uma exceção NotFoundHttpException
        if (!$linhaCarrinho) {
            throw new NotFoundHttpException('A linha de carrinho não foi encontrada.');
        }

        // Obtém o ID do carrinho antes de deletar a linha
        $carrinhoId = $linhaCarrinho->carrinho_id;

        // Deleta a LinhaCarrinho
        $linhaCarrinho->delete();

        // Recalcula o total do carrinho após a remoção da linha
      //  $this->recalcularTotalCarrinho($carrinhoId);

        // Redireciona para a página do carrinho ou qualquer outra página desejada
        return $this->redirect(['view']);
    }

    /**
     * Recalcula o total do carrinho.
     * @param int $carrinhoId ID do carrinho
     */
    protected function recalcularTotalCarrinho($carrinhoId)
    {
        $carrinho = Carrinho::findOne($carrinhoId);

        if ($carrinho) {
            // Lógica para recalcular o total do carrinho
            // Implemente conforme necessário com base na estrutura do seu modelo
            $carrinho->calcularTotalCarrinho();
        }
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
