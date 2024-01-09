<?php

use common\models\User;
use hail812\adminlte3\yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchFuncionario */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Funcionários';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Criar Funcionário', ['user/create', 'userType' => 'funcionario'], ['class' => 'btn btn-success', ]) ?>
                        </div>
                    </div>


                    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'columns' => [
                            [
                                'attribute' => 'nome',
                                'label' => 'Nome',
                                'value' => function ($model) {
                                    $nome = $model->nome . " " ;
                                    return $nome;
                                }
                            ],
                            'telefone',
                            'nif',
                            [
                                'attribute' => 'user_id',

                                'label' => 'Estado',
                                'format' => 'html',
                                'value' => function($data) {
                                    return $data->user->getStatusLabel();
                                }

                            ],
                            [
                                'class' => ActionColumn::class,
                                'contentOptions' => ['style' => 'width: 1%; white-space: nowrap;'],
                                'template' => '{view} {update} {delete}',
                                'buttons' => [
                                    'view' => function($url, $model)
                                    {
                                        return Html::a('<i class="fas fa-eye"></i>', ['funcionario/view', 'id' => $model->user_id], ['class' => 'btn btn-primary']);
                                    },
                                    'update' => function($url, $model)
                                    {
                                        if (Yii::$app->user->can('updateUtilizador')) {
                                            return Html::a('<i class="fas fa-pencil-alt text-white"></i>', ['funcionario/update', 'id' => $model->user_id], ['class' => 'btn btn-warning mr-1']);
                                        }
                                    },
                                    'delete' => function($url, $model)
                                    {
                                        if (Yii::$app->user->can('disableUtilizador')) {

                                            if($model->user->status == User::STATUS_ACTIVE)
                                            {
                                                return Html::a("<span class='material-symbols-outlined' style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>toggle_off</span>", ['desativar', 'user_id' => $model->user_id], [
                                                    'class' => 'btn  btn-danger pb-0',
                                                    'data'=> [
                                                        'confirm' => 'Tem a certeza que quer desativar este Funcionario?'
                                                    ]
                                                ]);
                                            }
                                            else
                                            {
                                                return Html::a("<span class='material-symbols-outlined'  style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>toggle_on</span>", ['ativar', 'user_id' => $model->user_id], [
                                                    'class' => 'btn  btn-success pb-0',
                                                    'data'=> [
                                                        'confirm' => 'Tem a certeza que quer ativar este Funcionario?'
                                                    ]
                                                ]);
                                            }
                                        }

                                    }
                                ],
                            ],
                        ],
                    ]); ?>


                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>
