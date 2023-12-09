<?php

use common\models\Categoria;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\SearchCategoria $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">

                            <?=
                            Html::a('Criar Categoria', ['categoria/create'], ['class' => 'btn btn-success',]) ?>
                        </div>
                    </div>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'columns' => [

                            'descricao',


                            [
                                'class' => ActionColumn::class,
                                'contentOptions' => ['style' => 'width: 1%; white-space: nowrap;'],
                                'template' => '{view} {update} {delete}',
                                'buttons' => [
                                    'view' => function($url, $model)
                                    {
                                        if (Yii::$app->user->can('readCategorias')) {
                                            return Html::a('<i class="fas fa-eye"></i>', ['categoria/view', 'id' => $model->id], ['class' => 'btn btn-primary']);
                                        }
                                    },
                                    'update' => function($url, $model)
                                    {
                                        if (Yii::$app->user->can('updateCategorias')) {
                                            return Html::a('<i class="fas fa-pencil-alt text-white"></i>', ['categoria/update', 'id' => $model->id], ['class' => 'btn btn-warning mr-1']);
                                        }
                                    },

                                    'delete' => function($url, $model)
                                    {
                                        return Html::a('<i class="fas fa-trash-alt"></i>', ['categoria/delete', 'id' => $model->id], [
                                            'class' => 'btn btn-danger',
                                            'data'=> [
                                                'confirm' => 'Tem a certeza que pretende eliminar esta categoria?',
                                                'method'=> 'POST'
                                            ]
                                        ]);
                                    },



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
