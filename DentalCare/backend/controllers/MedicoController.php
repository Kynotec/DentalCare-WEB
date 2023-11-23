<?php

namespace backend\controllers;

use common\models\Perfil;
use backend\models\SearchMedico;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MedicoController implements the CRUD actions for Perfil model.
 */
class MedicoController extends Controller
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
                        'actions' => ['index'],
                        'roles' => ['readUtilizador'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['createUtilizador'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['readUtilizador'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['updateUtilizador'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['desativar', 'ativar'],
                        'roles' => ['disableUtilizador'],
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
     * Lists all Perfil models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $value = 0;
        $searchModel = new SearchMedico();
        $dataProvider = $searchModel->search($this->request->queryParams, $value);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Perfil model.
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
     * Creates a new Perfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($idUser)
    {
        $model = new Perfil();
        $model->user_id = $idUser;
        $modelUser = $model->user;
        if ($model->load(Yii::$app->request->post())) {

            if (isset($model)){
                $model->save();

                return $this->redirect(['index']);

            }else
            {
                $model->save();
                return $this->redirect(['index']);
            }

        }

        return $this->render('create', [
            'model' => $model,
            'modelUser' => $modelUser,
        ]);
    }

    /**
     * Updates an existing Perfil model.
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
     * Deletes an existing Perfil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDesativar($user_id)
    {
        $model = $this->findModel($user_id);
        $modelUser = $model->user;
        $modelUser->updateAttributes(['status' => 9]);
        return $this->redirect(['index']);
    }

    public function actionAtivar($user_id)
    {
        $model = $this->findModel($user_id);
        $modelUser = $model->user;
        $modelUser->updateAttributes(['status' => 10]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Perfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Perfil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Perfil::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
