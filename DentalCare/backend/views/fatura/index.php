<?php

use common\models\Faturas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\SearchFatura $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Faturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">

                            <?= Html::a('Criar Faturas', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
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
                                'template' => '{view} {update}',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        if (Yii::$app->user->can('readFatura')) {
                                            return Html::a('<i class="fas fa-eye"></i>', ['fatura/view', 'id' => $model->id], ['class' => 'btn btn-primary']);
                                        }
                                    },
                                    'update' => function ($url, $model) {
                                        $estadosNaoPermitidos = ['Pago'];

                                        if (Yii::$app->user->can('updateFatura') && !in_array($model->estado, $estadosNaoPermitidos)) {
                                            return Html::a('<i class="fas fa-pencil-alt text-white"></i>', ['fatura/update', 'id' => $model->id], ['class' => 'btn btn-warning mr-1']);
                                        }
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
