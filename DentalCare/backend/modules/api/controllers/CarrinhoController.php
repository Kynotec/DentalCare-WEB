<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;

use common\models\Faturas;
use common\models\Imagem;
use common\models\Carrinho;
use common\models\LinhaCarrinho;
use common\models\LinhaFatura;
use common\models\Produto;
use Exception;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use yii;
use yii\web\BadRequestHttpException;

class CarrinhoController extends ActiveController
{
    public $modelClass = 'common\models\Carrinho';


    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    public function actionBuscarcarrinho($user_id)
    {
        $carrinhos = Carrinho::find()->where(['user_id' => $user_id])->one();

        if ($carrinhos) {
            // Busca as linhas do carrinho
            $linhasCarrinho = LinhaCarrinho::find()->where(['carrinho_id' => $carrinhos->id])->all();
            $linhasCarrinhoarray = [];
            foreach ($linhasCarrinho as $linhaCarrinho){
                $imagem = Imagem::find()->where(['produto_id'=>$linhaCarrinho->produto_id])->one();
                $linhasCarrinhoarray[] = ['id'=>$linhaCarrinho->id,
                    'nome'=>$linhaCarrinho->produto->nome,
                    'quantidade'=>$linhaCarrinho->quantidade,
                    'valortotal'=>$linhaCarrinho->valortotal,
                    'imagem'=>$imagem->filename];
            }
            return $linhasCarrinhoarray;
        }

        // Retorna algo indicando que o carrinho não foi encontrado
        return [
         //   'message' => 'Não existem produtos no carrinho.',
        ];
    }

    public function actionRemoverlinhacarrinho($carrinhoid)
    {
        $linhasCarrinho = LinhaCarrinho::findOne($carrinhoid);
        if ($linhasCarrinho) // se existir
        {
            $linhasCarrinho->delete();
            return true;
        }
        return false;
    }


    public function actionCheckoutcarrinho($user_id)
    {

            $carrinho = Carrinho::find()->where(['user_id' => $user_id])->one();


            if ($carrinho) {

                    $fatura = new Faturas();
                    $fatura->profile_id = $user_id;
                    $fatura->data = date('Y-m-d H:i:s');
                    $fatura->valortotal = 0;
                    $fatura->ivatotal = 0;
                    $fatura->subtotal = 0;
                    $fatura->estado = 'Pago';
                    $fatura->save();
                    $carrinhoforeach = $carrinho->getLinhaCarrinhos()->all();

                    foreach ($carrinhoforeach as $linhaCarrinho) {
                        $linhaFatura = new LinhaFatura();
                        $linhaFatura->fatura_id = $fatura->id;
                        $linhaFatura->produto_id = $linhaCarrinho->produto_id;
                        $linhaFatura->quantidade = (int)$linhaCarrinho->quantidade;
                        $linhaFatura->valorunitario = $linhaCarrinho->valorunitario;
                        $linhaFatura->valoriva = $linhaCarrinho->valoriva;
                        $linhaFatura->valortotal = $linhaCarrinho->valortotal;
                        $linhaFatura->save();

                        // Atualiza os valores totais da fatura com base na linha_fatura
                        $fatura->valortotal += $linhaFatura->valortotal;
                        $fatura->ivatotal += $linhaFatura->valoriva;
                        $fatura->subtotal += $linhaFatura->valortotal - $linhaFatura->valoriva;
                    }
                    $fatura->save();

                    //Remover o carrinho
                    $carrinho->delete();
                    return true;
            }else{
                return false;

            }

    }


    public function actionAdicionar($produto_id, $user_id)
    {
        $request = \Yii::$app->request;
        $quantidade = $request->getBodyParam('quantidade');


        $carrinho = Carrinho::find()->where(['user_id' => $user_id])->one();

        if (!$carrinho) {
            $carrinho = new Carrinho();
            $carrinho->user_id = $user_id;
            $carrinho->data = date('Y-m-d');
            $carrinho->save();
        }

        $linhaCarrinho = LinhaCarrinho::find()
            ->where(['carrinho_id' => $carrinho->id, 'produto_id' => $produto_id])
            ->one();

        $produto = Produto::find()->where(['id' => $produto_id])->one();

        if ($linhaCarrinho) {
            $linhaCarrinho->quantidade += $quantidade;
            $linhaCarrinho->recalcularIva();
            $linhaCarrinho->valortotal = $linhaCarrinho->calcularTotal();
        } else {
            $linhaCarrinho = new LinhaCarrinho();
            $linhaCarrinho->carrinho_id = $carrinho->id;
            $linhaCarrinho->quantidade = $quantidade;
            $linhaCarrinho->produto_id = $produto->id;
            $linhaCarrinho->valorunitario = $produto->precounitario;
            $linhaCarrinho->valoriva = $produto->calcularIva();
            $linhaCarrinho->valortotal = $linhaCarrinho->calcularTotal();
        }
        $linhaCarrinho->save();

        return [

        ];

    }



    public function actionDatacarrinho($user_id)
    {
        $carrinhomodel = new $this->modelClass;

        $carrinho = $carrinhomodel::find()
            ->where(['user_id' => $user_id])
            ->all();
        return $carrinho;
    }


}
