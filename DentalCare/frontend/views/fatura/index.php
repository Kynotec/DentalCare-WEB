<?php

use common\models\Faturas;
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\SearchFatura $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
AppAsset::register($this);
$this->title = 'As Minhas Marcações';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="fatura-index">
        <div class="col-md-12">
                <div class="card-body">

                    <br>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            //'id',
                            'data',


                            [
                                'attribute' => 'subtotal',
                                'value' => function ($model) {
                                    $subtotal = $model->subtotal . ' €';
                                    return $subtotal;
                                }
                            ],
                            [
                                'attribute' => 'ivatotal',
                                'value' => function ($model) {
                                    $ivatotal = $model->ivatotal . ' €';
                                    return $ivatotal;
                                }
                            ],
                            [
                                'attribute' => 'valortotal',
                                'value' => function ($model) {
                                    $valortotal = $model->valortotal . ' €';
                                    return $valortotal;
                                }
                            ],

                            'estado',
                            //'profile_id',

                            [
                                'class' => ActionColumn::class,
                                'contentOptions' => ['style' => 'width: 1%; white-space: nowrap;'],
                                'template' => '{view} {update} {pagar}',
                                'buttons' => [
                                    'view' => function($url, $model)
                                    {
                                        if (Yii::$app->user->can('readConsulta')) {
                                            return Html::a('<i class="fas fa-eye"></i>', ['marcacao/view', 'id' => $model->id], ['class' => 'btn btn-primary']);
                                        }
                                    },
                                    'update' => function($url, $model)
                                    {
                                        $estadosNaoPermitidos = ['Realizado','Pago'];

                                        if (Yii::$app->user->can('updateConsulta') && !in_array($model->estado, $estadosNaoPermitidos)) {
                                            return Html::a('<i class="fas fa-pencil-alt text-white"></i>', ['marcacao/update', 'id' => $model->id], ['class' => 'btn btn-warning mr-1']);
                                        }
                                    },
                                    'pagar' => function($url, $model)
                                    {
                                        $estadosNaoPermitidos = ['Realizado'];

                                        if (Yii::$app->user->can('updateConsulta') && in_array($model->estado, $estadosNaoPermitidos)) {
                                            return Html::a('<i></i>Pagar', ['marcacao/pagar', 'id' => $model->id], ['class' => 'btn btn-success']);

                                        }
                                    },
                                ],
                            ],
                        ],
                    ]); ?>

                </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
                <!-- .card-body -->
            </div>
            <!-- .card -->
        </div>
        <!-- .col-md-12 -->
    </div>

    <!-- .row -->


