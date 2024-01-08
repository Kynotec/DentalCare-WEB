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
$this->title = 'As Minhas Faturas';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="fatura-index">
<h1><?= Html::encode($this->title) ?></h1>
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
                                'template' => '{view}',
                                'buttons' => [
                                    'view' => function($url, $model)
                                    {
                                        if (Yii::$app->user->can('readConsulta')) {
                                            return Html::a('<i class="fas fa-eye"></i>', ['fatura/view', 'id' => $model->id], ['class' => 'btn btn-primary']);
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


