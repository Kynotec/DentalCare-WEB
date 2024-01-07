<?php

namespace frontend\controllers;

use backend\models\SearchUtente;
use Carbon\Carbon;
use common\models\Marcacao;
use backend\models\SearchMarcacao;
use common\models\Produto;
use common\models\Servico;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MarcacaoController implements the CRUD actions for Marcacao model.
 */
class MarcacaoController extends Controller
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
                        'actions' => ['index','create','view','update','delete','create-time'],
                        'roles' => ['utente'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Marcacao models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        $profileId = Yii::$app->user->id;

        $dataProvider = new ActiveDataProvider([
            'query' => Marcacao::find()->where(['profile_id' => $profileId]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Marcacao model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Marcacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($servico_id = null)
    {
        $model = new Marcacao();
        $profile_id = Yii::$app->user->id;

        $model->servico_id = $servico_id;
        $model->profile_id = $profile_id;
        $model->estado = 'Por Realizar';


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create-time', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'servico_id' => $servico_id,
        ]);
    }

    public function actionCreateTime($id)
    {
        $model = $this->findModel($id);

        $marcacoes = Marcacao::find()->select('hora')->where(['data'=>$model->data])->all();
        $horariosIndisponiveis = [];
        foreach($marcacoes as $marcacao){
            array_push($horariosIndisponiveis, $marcacao->hora);
        }

        if ($this->request->isPost && $model->load($this->request->post())) {

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        $model->hoursOptions = $model->getHoursOptions($horariosIndisponiveis);

        return $this->render('create-time', [
            'model' => $model,
        ]);
    }
    /*
        public function actionCancelar($id)
        {
            $model = $this->findModel($id);

            if ($model->estado == 'Cancelado') {
                Yii::$app->session->setFlash('warning', 'Esta marcação já está cancelada.');
                return $this->redirect(['index']);
            }
            if ($model->estado == 'Por Realizar') {
                $model->estado = 'Cancelado';

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'A Marcação foi cancelada com sucesso!');
                } else {
                    Yii::$app->session->setFlash('error', 'Erro ao cancelar a marcação!');
                }
            } else {
                Yii::$app->session->setFlash('warning', 'Apenas marcações "Por Realizar" podem ser canceladas.');
            }
            return $this->redirect(['index']);
        }
    */

    /**
     * Updates an existing Marcacao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->estado === 'Realizado') {
            Yii::$app->session->setFlash('warning', 'Não é permitido atualizar uma marcação já realizada.');
            return $this->redirect(['view', 'id' => $model->id]);
        }
        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    /**
     * Deletes an existing Marcacao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Marcacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Marcacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Marcacao::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
