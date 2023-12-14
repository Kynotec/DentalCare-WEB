<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Servico $model */

$this->title = $model->descricao;
$this->params['breadcrumbs'][] = ['label' => 'Servicos', 'url' => ['index']];
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
                        <?php if ($model->ativo == \common\models\Servico::STATUS_INACTIVE) {
                            echo Html::a("<span class='material-symbols-outlined' style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>toggle_off</span>", ['ativar', 'id' => $model->id],
                                [
                                    'class' => 'btn  btn-success pb-0',
                                    'hidden' => !Yii::$app->user->can("deleteServicos"),
                                    'data' => [
                                        'confirm' => 'Tem a certeza que pretende ativar este Serviço?',
                                        'method' => 'post',
                                    ],
                                ]);
                        } elseif ($model->ativo == \common\models\Servico::STATUS_ACTIVE) {
                            echo Html::a("<span class='material-symbols-outlined'  style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>toggle_on</span>", ['desativar', 'id' => $model->id],

                                [
                                    'class' => 'btn  btn-danger pb-0',
                                    'hidden' => !Yii::$app->user->can("deleteServicos"),
                                    'data' => [
                                        'confirm' => 'Tem a certeza que pretende desativar este Serviço?',
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
                            'referencia',
                            'descricao',
                            'preco',
                            //'iva_id',
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