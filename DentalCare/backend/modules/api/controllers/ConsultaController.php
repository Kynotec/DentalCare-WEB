<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use Yii;
use yii\rest\ActiveController;
class ConsultaController extends ActiveController
{
    public $modelClass = 'common\models\Marcacao';


    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    //Serve para filtrar atraves do token os diagnósticos do perfil autenticado
    public function actionGetMarcacaoPerfil()
    {
        $model = new $this->modelClass;

        $marcacoes = $model::find()
            ->select([
                'consultas.id',
                'consultas.descricao',
                'consultas.data',
                'consultas.hora',
                'consultas.estado',
                'consultas.profile_id',
                'consultas.servico_id',
                '(SELECT nome FROM servicos WHERE id = consultas.servico_id) AS nomeservico'
            ])
            ->where(['consultas.profile_id' => Yii::$app->params['id']])
            ->asArray()
            ->all();

        return $marcacoes;
    }

    public function actionAtualizarconsulta()
    {
        $request=\Yii::$app->request->post();
        $climodel = new $this->modelClass;

        $ret = $climodel::findOne(Yii::$app->params['id']);

        if($ret) {
            $ret->nome = $request['nome'];
            $ret->descricao = $request['descricao'];
            $ret->data = $request['data'];
            $ret->hora = $request['hora'];
            $ret->estado = $request['estado'];
            $ret->profile_id = $request['profile_id'];
            $ret->servico_id = $request['servico_id'];
            $ret->save();
            return ["success" => true];

        }

        else {

            return ["success" => false];
        }
    }

    public function actionCount($data)
    {
        $consultamodel = new $this->modelClass;
        $consulta = $consultamodel::find()
            ->where(['data' => $data])
            ->all();
        return ['count' => count($consulta)];
    }


    public function actionDelporid($consultaid)
    {
        $consultamodel = new $this->modelClass;
        $consulta = $consultamodel::deleteAll(['id' => $consultaid]);
        return $consulta;
    }

    public function actionAlterardata($profileid)
    {
        $nova_data=\Yii::$app->request->post('data');
        $consultamodel = new $this->modelClass;
        $consulta = $consultamodel::findOne(['profile_id' => $profileid]);
        if($consulta) {
            $consulta->data = $nova_data;
            $consulta->save();
            return $this->asJson(
                $consulta
            );
        }
        else {
            throw new \yii\web\NotFoundHttpException("O Id do Utente nao existe!");
        }
    }

}
