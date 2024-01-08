<?php

namespace backend\controllers;

use backend\models\SearchUtente;
use common\models\Marcacao;
use backend\models\SearchMarcacao;
use Exception;
use Yii;
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
                        'actions' => ['index','create','view','update','create-time','concluir','delete'],
                        'roles' => ['medico','funcionario','admin'],
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
        $searchModel = new SearchMarcacao();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
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
    public function actionCreate()
    {
        $model = new Marcacao();

        $model->estado = 'Por Realizar';

        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->save()) {
                return $this->redirect(['create-time', 'id' => $model->id]);
            }

        }

        return $this->render('create', [
            'model' => $model,
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

        // Obtendo as opções de hora
        $model->hoursOptions = $model->getHoursOptions($horariosIndisponiveis);

        return $this->render('create-time', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing Marcacao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID da Marcação
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);



        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {

                return $this->redirect(['create-time', 'id' => $model->id]);
            }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionConcluir($id)
    {
        $model = $this->findModel($id);

        if ($model->estado == 'Por Realizar') {
            $model->estado = 'Realizado';

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'A Marcação foi concluida com sucesso!');
            } else {
                Yii::$app->session->setFlash('error', 'Erro ao concluir a marcação!');
            }

            return $this->redirect(['index']);
        }
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
