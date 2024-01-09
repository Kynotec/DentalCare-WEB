<?php

namespace frontend\controllers;

use common\models\Empresa;
use common\models\Faturas;
use common\models\LinhaFatura;
use common\models\Produto;
use common\models\Servico;
use frontend\models\SearchFatura;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','view'],
                        'roles' => ['utente'],
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
     * Lists all Faturas models.
     *
     * @return string
     */
    public function actionIndex()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $profileId = Yii::$app->user->id;

        $searchModel = new SearchFatura();

        $dataProvider = $searchModel->search($this->request->queryParams, $profileId);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,

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

        //Vais buscar os produtos que estão associadoas a fatura atual
        $produtoIds = LinhaFatura::find()->where(['fatura_id' => $fatura->id])->select('produto_id')->column();
        //Vai buscar todos os produtos que estão associado ao produto_id
        $produtos = Produto::find()->where(['id' => $produtoIds])->all();

        //Vais buscar os Servicos que estão associadoas a fatura atual
        $servicoIds = LinhaFatura::find()->where(['fatura_id' => $fatura->id])->select('servico_id')->column();
        //Vai buscar todos os Servicos que estão associado ao servico_id
        $servicos = Servico::find()->where(['id' => $servicoIds])->all();


        if (Yii::$app->user->identity->id != $fatura->profile_id) {
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação.');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Faturas::find()->where(['profile_id' => Yii::$app->user->id]),
        ]);


        if (count($empresas) > 0) {
            $empresa = $empresas[0];
        }

        return $this->render('view', [
            'model' => $fatura,
            'empresa' => $empresa,
            'linhafatura' => $fatura->linhaFaturas,
            'produtos' => $produtos,
            'servicos' => $servicos,
            'dataProvider' => $dataProvider,
        ]);
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
