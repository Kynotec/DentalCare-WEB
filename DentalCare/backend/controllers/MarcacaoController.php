<?php

namespace backend\controllers;

use backend\models\SearchUtente;
use common\models\Marcacao;
use backend\models\SearchMarcacao;
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
                        'actions' => ['index','create','view','update','create-time'],
                        'roles' => ['medico','funcionario','admin'],
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

        if ($this->request->isPost && $model->load($this->request->post())) {

            // Salvando na base de dados
            if ($model->save()) {


                // Redirecionando para a segunda vista com o ID da marcação recém-criada
                return $this->redirect(['create-time', 'id' => $model->id]);
            }
            var_dump($model->errors);
            die;
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionCreateTime($id)
    {
        $model = $this->findModel($id);

        var_dump($model->data);
        $marcacao = Marcacao::find()->select('hora')->where(['data'=>$model->data])->all();

        var_dump($marcacao);
        die();
        $horariosIndisponiveis = [];

        if ($this->request->isPost && $model->load($this->request->post())) {
            // Salvando na base de dados
            if ($model->save()) {
                // Redirecionando para a visualização da marcação
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
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
