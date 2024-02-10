<?php

namespace backend\modules\api\controllers;

use common\models\Imagem;
use common\models\Iva;
use yii\rest\ActiveController;

class ServicoController extends ActiveController
{
    public $modelClass = 'common\models\Servico';
    //Permite ir buscar o valor da percentagem do iva_id associado
    public function actionGetIva()
    {
        $model = new $this->modelClass;

        $servicos = $model::find()
            ->select([
                'servicos.id',
                'servicos.referencia',
                'servicos.nome',
                'servicos.descricao',
                'servicos.preco',
                'servicos.ativo',
                'servicos.iva_id',
                '(SELECT percentagem FROM ivas WHERE id = servicos.iva_id) AS ivaspercentagem'
            ])
            ->asArray()
            ->all();

        return $servicos;
    }


    public function actionServicospeladescricao($descricao)
    {
        $servicomodel = new $this->modelClass;
        $servico = $servicomodel::find()
            ->where(['descricao' => $descricao])
            ->all();
        return $servico;
    }


    public function actionGetImagem()
    {
        $servicos =  $this->modelClass::find()->all();
        $servicosarray = [];
        foreach ($servicos as $servico){

            $imagem = Imagem::find()->where(['servico_id'=>$servico->id])->one();
            $ivaspercentagem = Iva::find()->where(['id'=>$servico->iva_id])->one();
            $servicosarray[] = ['id'=>$servico->id,
                'nome'=>$servico->nome,
                'descricao'=>$servico->descricao,
                'ivaspercentagem'=>$ivaspercentagem->percentagem,
                'preco'=>$servico->preco,
                'imagem'=>$imagem->filename];
        }
        return $servicosarray;

    }



}

