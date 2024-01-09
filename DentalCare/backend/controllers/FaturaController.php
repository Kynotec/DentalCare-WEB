<?php

namespace backend\controllers;

use Carbon\Carbon;
use common\models\Empresa;
use common\models\Faturas;
use backend\models\SearchFatura;
use common\models\LinhaFatura;
use common\models\Perfil;
use common\models\Produto;
use common\models\Servico;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use Yii;

/**
 * FaturaController implements the CRUD actions for Faturas model.
 */
class FaturaController extends Controller
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
     * Lists all Faturas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchFatura();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Faturas model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $empresas = Empresa::find()->all();
        $fatura = $this->findModel($id);

        //Vai buscar os produtos que estão associadoas a fatura atual
        $produtoIds = LinhaFatura::find()->where(['fatura_id' => $fatura->id])->select('produto_id')->column();
        //Vai buscar todos os produtos que estão associado ao produto_id
        $produtos = Produto::find()->where(['id' => $produtoIds])->all();

        //Vai buscar os Servicos que estão associadoas a fatura atual
        $servicoIds = LinhaFatura::find()->where(['fatura_id' => $fatura->id])->select('servico_id')->column();
        //Vai buscar todos os Servicos que estão associado ao servico_id
        $servicos = Servico::find()->where(['id' => $servicoIds])->all();



        if (count($empresas) > 0) {
            $empresa = $empresas[0];
        }

        return $this->render('view', [
            'model' => $fatura,
            'empresa' => $empresa,
            'linhafatura' => $fatura->linhaFaturas,
            'produtos' => $produtos,
            'servicos' => $servicos,
        ]);
    }


    /**
     * Creates a new Faturas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $empresas = Empresa::find()->all();

        if (count($empresas) > 0) {
            $empresa = $empresas[0];
            $model = new Faturas();
            $linhafatura = new LinhaFatura();

        //    $model->profile_id = New Perfil();

            if ($this->request->isPost) {

                if ($model->load($this->request->post()) && $linhafatura->load($this->request->post())) {

                    if ($model->validate()) {
                        $model->save();


                        $linhafatura->fatura_id = $model->id;
                        $linhafatura->save();

                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            } else {
                $model->loadDefaultValues();
                $linhafatura->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
                'empresa' => $empresa,
                'linhafatura' => $linhafatura,
            ]);
        } else {
            return $this->redirect(['fatura/index']);
        }
    }

    /**
     * Updates an existing Faturas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $linhafatura = LinhaFatura::findOne(['fatura_id' => $model->id]);

        if ($this->request->isPost) {

            if ($model->load($this->request->post()) && $linhafatura->load($this->request->post())) {

                if ($model->validate()) {
                    $model->save();

                    $linhafatura->fatura_id = $model->id;
                    $linhafatura->save();

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'linhafatura' => $linhafatura,
        ]);
    }
    /**
     * Displays a form to select a client.
     * If a client is selected, creates a new Faturas model associated with that client.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionSelectClient()
    {
        $users = User::find()
            ->leftJoin('auth_assignment', 'auth_assignment.user_id = user.id')
            ->leftJoin('profiles', 'profiles.user_id = user.id')
            ->where(['auth_assignment.item_name' => 'utente'])
            ->asArray()
            ->all();

        $profiles = Perfil::find()->all();

        return $this->render('selectClient', [
            'users' => $users,
            'profiles'=> $profiles,
        ]);

    }


    /**
     * Deletes an existing Faturas model.
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
     * Finds the Faturas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Faturas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Faturas::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
