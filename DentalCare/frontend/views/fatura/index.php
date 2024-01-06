<?php

use common\models\Faturas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\SearchFatura $searchModel */
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
                            <p>
                                <a href="../" class="btn-left"><i class="fas fa-arrow-left" data-toggle="tooltip" data-placement="left" title="Cancelar"></i></a>
                            </p>
                        </div>
                    </div>


                    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [

                            //'id',
                            'data',
                            'valortotal',
                            'ivatotal',
                            'subtotal',
                            //'estado',
                            //'profile_id',

                            [
                                'class' => ActionColumn::className(),
                                'contentOptions' => ['style' => 'width: 1%; white-space: nowrap;'],
                                'template' => '{view}',
                                'buttons' => [
                                    'view' => function($url, $model)
                                    {

                                        return Html::a('<i class="fas fa-eye"></i>', ['fatura/view', 'id' => $model->id], ['class' => 'btn btn-primary']);


                                    },

                                ]
                            ]
                        ],
                    ]); ?>


                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!--.row-->
</div>
