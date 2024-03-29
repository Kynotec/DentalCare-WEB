<?php

namespace backend\controllers;

use common\models\Servico;
use common\models\Imagem;
use backend\models\SearchServico;
use common\models\UploadFormServicos;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;
use common\models\UploadForm;

/**
 * ServicoController implements the CRUD actions for Servico model.
 */
class ServicoController extends Controller
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
                        'actions' => ['index', 'create', 'view', 'update', 'ativar', 'desativar'],
                        'roles' => ['administrador', 'funcionario'],
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
     * Lists all Servico models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchServico();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Servico model.
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
     * Creates a new Servico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Servico();
        $imagem = new Imagem();
        $modelUpload = new UploadFormServicos();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $modelUpload->imageFile = UploadedFile::getInstance($modelUpload, 'imageFile');

            if ($modelUpload->imageFile !== null) {
                if ($model->save() && $modelUpload->upload()) {

                    $imagem->filename = $modelUpload->filename;
                    $imagem->produto_id = null;
                    $imagem->servico_id = $model->id;
                    $imagem->diagnostico_id = null;
                    $imagem->save();

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                if (Yii::$app->session->hasFlash('error')) {
                    echo '<div class="alert alert-danger">' . Yii::$app->session->getFlash('error') . '</div>';
                }

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelUpload' => $modelUpload,
        ]);
    }

    /**
     * Updates an existing Servico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */

    public
    function actionUpload()
    {
        $model = new UploadFormServicos();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'filename');
            if ($model->upload()) {
                return;
            }
        }

        return $this->render('create', ['model' => $model]);
    }

    public
    function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelUpload = new UploadFormServicos();
        $imagem = new Imagem();

        if ($this->request->isPost) {

            if ($model->load($this->request->post())) {

                if ($model->save()) {

                    $modelUpload->imageFile = UploadedFile::getInstance($modelUpload, 'imageFile');

                    // Verifica se encontra o ficheiro
                    if ($modelUpload->imageFile) {
                        // tenta dar upload da imagem
                        if ($modelUpload->upload()) {

                            $imagem = Imagem::findOne(['servico_id' => $model->id]);

                            if (!$imagem) {
                                $imagem = new Imagem();
                                $imagem->servico_id = $model->id;
                            }

                            $imagem->filename = $modelUpload->filename;
                            $imagem->produto_id = null;
                            $imagem->diagnostico_id = null;

                            $imagem->save();
                        }
                    }

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
            'modelUpload' => $modelUpload,
        ]);
    }

    /**
     * Deletes an existing Servico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public
    function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public
    function actionDesativar($id)
    {
        $model = $this->findModel($id);
        $modelServico = $model;
        $modelServico->updateAttributes(['ativo' => 9]);
        return $this->redirect(['index']);
    }

    public
    function actionAtivar($id)
    {
        $model = $this->findModel($id);
        $modelServico = $model;
        $modelServico->updateAttributes(['ativo' => 10]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Servico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Servico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id)
    {
        if (($model = Servico::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
