<?php

use common\models\Diagnostico;
use common\models\Perfil;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\SearchDiagnostico $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = 'Os meus Diagnósticos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <h1><?= Html::encode($this->title) ?></h1>
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
                            //'descricao',
                            [
                                'attribute' => 'profile_id',
                                'label' => 'Nome do Utente',
                                'value' => function ($model) {
                                    $perfil = $model->profile->nome;
                                    return $perfil;
                                }
                            ],
                            [
                                'attribute' => 'data',
                                'label' => 'Data|Hora do Diagnóstico',
                                'value' => function ($model) {
                                    $diagnostico = $model->data . ' | ' . $model->hora;
                                    return $diagnostico;
                                }
                            ],

                            [
                                'attribute' => 'hora',
                                'label' => 'Data|Hora da Consulta',
                                'value' => function ($model) {
                                    $consulta = $model->consulta->data . ' | ' . $model->consulta->hora;
                                    return $consulta;
                                }
                            ],

                            //'consulta_id',

                            [
                                'class' => ActionColumn::className(),
                                'contentOptions' => ['style' => 'width: 1%; white-space: nowrap;'],
                                'template' => '{view}',
                                'buttons' => [
                                    'view' => function($url, $model)
                                    {
                                        if (Yii::$app->user->can('readEstadoClinico')) {

                                            return Html::a('<i class="fas fa-eye"></i>', ['diagnostico/view', 'id' => $model->id], ['class' => 'btn btn-primary']);
                                        }

                                    },

                                ]
                            ]
                        ],
                    ]); ?>

                    <br><br><br><br><br><br><br><br>
                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>
