<?php

namespace backend\controllers;

use common\models\Produto;
use common\models\Imagem;
use backend\models\SearchProduto;
use common\models\UploadForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class ProdutoController extends Controller
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
     * Lists all Produto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchProduto();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produto model.
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
     * Creates a new Produto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    /**
     * @param bool $trim
     * @return string
     */


    public function actionCreate()
    {
        $model = new Produto();

        $imagem = new Imagem();

        $modelUpload = new UploadForm();


        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $modelUpload->imageFile = UploadedFile::getInstance($modelUpload, 'imageFile');

                if ($modelUpload->upload()) {
                    // file is uploaded successfully
                    $imagem->filename = $modelUpload->filename;
                    $imagem->produto_id = $model->id;
                    $imagem->servico_id = null;
                    $imagem->diagnostico_id = null;
                    $imagem->save();

                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelUpload' => $modelUpload,
        ]);
    }


    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'filename');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing Produto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelUpload = new UploadForm(); // Instantiate UploadForm
        $imagem = new Imagem(); // Instantiate Imagem

        if ($this->request->isPost) {
            // Load Produto model data from the POST request
            if ($model->load($this->request->post())) {
                // Save the Produto model
                if ($model->save()) {
                    // Get the uploaded file instance
                    $modelUpload->imageFile = UploadedFile::getInstance($modelUpload, 'imageFile');

                    // Check if there is an uploaded file
                    if ($modelUpload->imageFile) {
                        // Attempt to upload the file
                        if ($modelUpload->upload()) {
                            // File is uploaded successfully

                            // Update or create Imagem record
                            $imagem = Imagem::findOne(['produto_id' => $model->id]);

                            if (!$imagem) {
                                $imagem = new Imagem();
                                $imagem->produto_id = $model->id;
                            }

                            // Update Imagem model with new filename
                            $imagem->filename = $modelUpload->filename;
                            $imagem->servico_id = null;
                            $imagem->diagnostico_id = null;

                            // Save the Imagem model
                            $imagem->save();
                        }
                    }

                    // Redirect to the view page
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            // If it's not a POST request, load default values
            $model->loadDefaultValues();
        }

        // Render the update view
        return $this->render('update', [
            'model' => $model,
            'modelUpload' => $modelUpload,
        ]);
    }

    /**
     * Deletes an existing Produto model.
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


    public function actionDesativar($id)
    {
        $model = $this->findModel($id);
        $modelProduto = $model;
        $modelProduto->updateAttributes(['ativo' => 9]);
        return $this->redirect(['index']);
    }

    public function actionAtivar($id)
    {
        $model = $this->findModel($id);
        $modelProduto = $model;
        $modelProduto->updateAttributes(['ativo' => 10]);
        return $this->redirect(['index']);
    }


    /**
     * Finds the Produto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Produto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produto::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
