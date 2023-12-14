<?php
use common\models\Produto;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */

$this->title = $model->descricao;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <?= Html::a("<span class='material-symbols-outlined' style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>edit</span>", ['update', 'id' => $model->id], [
                                'class' => 'btn ',
                                'hidden' => !Yii::$app->user->can("funcionario")]) ?>
                            <?php if ($model->ativo == Produto::STATUS_INACTIVE) {
                                echo Html::a("<span class='material-symbols-outlined' style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>toggle_off</span>", ['ativar', 'id' => $model->id],
                                    [
                                        'class' => 'btn  btn-success pb-0',
                                        'hidden' => !Yii::$app->user->can("deleteProdutos"),
                                        'data' => [
                                            'confirm' => 'Tem a certeza que pretende ativar este Produto?',
                                            'method' => 'post',
                                        ],
                                    ]);
                            } elseif ($model->ativo == Produto::STATUS_ACTIVE) {
                                echo Html::a("<span class='material-symbols-outlined'  style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>toggle_on</span>", ['desativar', 'id' => $model->id],

                                    [
                                        'class' => 'btn  btn-danger pb-0',
                                        'hidden' => !Yii::$app->user->can("deleteProdutos"),
                                        'data' => [
                                            'confirm' => 'Tem a certeza que pretende desativar este Produto?',
                                            'method' => 'post',
                                        ],
                                    ]);
                            }
                            ?>
                        </p>
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'id',
                                'nome',
                                'descricao',
                                'precounitario',
                                'stock',
                                'iva_id',
                                'categoria_id',
                                [
                                    'attribute' => 'ativo',
                                    'format' => 'html',
                                    'value' => function ($data) {
                                        return $data->getStatusLabel();
                                    }

                                ],
                            ],
                        ]) ?>

                    </div>
                    <!--.col-md-12-->
                </div>
                <!--.row-->
            </div>
            <!--.card-body-->
        </div>
        <!--.card-->
    </div>



