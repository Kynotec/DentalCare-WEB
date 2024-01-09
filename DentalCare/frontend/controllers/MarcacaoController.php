<?php

namespace frontend\controllers;

use backend\models\SearchUtente;
use Carbon\Carbon;
use common\models\Faturas;
use common\models\LinhaFatura;
use common\models\Marcacao;
use backend\models\SearchMarcacao;
use common\models\Produto;
use common\models\Servico;
use Exception;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
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
                        'actions' => ['index', 'create', 'view', 'update', 'delete', 'create-time', 'pagar'],
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
        $model = $this->findModel($id);

        if (Yii::$app->user->identity->id != $model->profile_id) {
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação.');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Marcacao::find()->where(['profile_id' => Yii::$app->user->id]),
        ]);

        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
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

        $marcacoes = Marcacao::find()->select('hora')->where(['data' => $model->data])->all();
        $horariosIndisponiveis = [];
        foreach ($marcacoes as $marcacao) {
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

    public function actionPagar($id)
    {
        try {
            $marcacao = Marcacao::findOne($id);

            if (!$marcacao) {
                throw new Exception('Consulta não encontrada.');
            }
            $servico = $marcacao->servico;
            $marcacao->estado = 'Pago';
            $marcacao->save();
            // Permite criar uma fatura
            $fatura = new Faturas();
            $fatura->profile_id = Yii::$app->user->id;
            $fatura->data = Carbon::now();
            $fatura->valortotal = $servico->preco + ($servico->preco * $servico->iva->percentagem / 100);
            $fatura->ivatotal = $servico->preco * ($servico->iva->percentagem / 100);
            $fatura->subtotal = $servico->preco;
            $fatura->estado = 'Pago';
            $fatura->save();

            $linhaFatura = new LinhaFatura();
            $linhaFatura->fatura_id = $fatura->id;
            $linhaFatura->servico_id = $servico->id;
            $linhaFatura->quantidade = 1;
            $linhaFatura->valorunitario = $servico->preco;
            $linhaFatura->valoriva = $servico->preco * ($servico->iva->percentagem / 100);
            $linhaFatura->valortotal = $linhaFatura->valorunitario + $linhaFatura->valoriva;
            $linhaFatura->save();

            Yii::$app->session->setFlash('success', 'Pagamento realizado com sucesso!');
        } catch (Exception $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        return $this->redirect(['marcacao/']);
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
