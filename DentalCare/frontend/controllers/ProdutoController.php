<?php

namespace frontend\controllers;

use common\models\Carrinho;
use common\models\LinhaCarrinho;
use common\models\Produto;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['GET'],
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
        $dataProvider = new ActiveDataProvider([
            'query' => Produto::find()
                ->andWhere(['ativo' => 10])
                ->andWhere(['>', 'stock', 0]),


            'pagination' => [
                'pageSize' => 15
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],

        ]);


        return $this->render('index', [
            'dataProvider' => $dataProvider,

        ]);
    }


    public function actionAdicionarAoCarrinho($produtoId)
    {

        if (!Yii::$app->user->isGuest) {
            $userId = Yii::$app->user->id;

            // Verifica se o usuário possui um carrinho
            $carrinho = Carrinho::find()->where(['user_id' => $userId])->one();

            if (!$carrinho) {
                // Se o usuário não tiver um carrinho, cria um novo
                $carrinho = new Carrinho();
                $carrinho->user_id = $userId;
                $carrinho->save();
            }

            // Adiciona o produto ao carrinho
            $linhaCarrinho = new LinhaCarrinho();
            $linhaCarrinho->carrinho_id = $carrinho->id;
            $linhaCarrinho->produto_id = $produtoId;
            $linhaCarrinho->save();

            return $this->redirect(['index']); // Redireciona para a página de produtos, por exemplo
        } else {
            // Redireciona para a página de login se o usuário não estiver logado
            return $this->redirect(['/site/login']);
        }
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
