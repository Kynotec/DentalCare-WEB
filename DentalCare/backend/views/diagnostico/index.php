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


$this->title = 'Diagnósticos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnostico-index">


    <p>
        <?= Html::a('Criar Diagnóstico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
                                    'template' => '{view} {update}',
                                    'buttons' => [
                                        'view' => function($url, $model)
                                        {
                                            if (Yii::$app->user->can('readEstadoClinico')) {
                                                return Html::a('<i class="fas fa-eye"></i>', ['diagnostico/view', 'id' => $model->id], ['class' => 'btn btn-primary']);
                                            }
                                        },
                                        'update' => function($url, $model)
                                        {
                                            if (Yii::$app->user->can('updateEstadoClinico')) {
                                                return Html::a('<i class="fas fa-pencil-alt text-white"></i>', ['diagnostico/update', 'id' => $model->id], ['class' => 'btn btn-warning mr-1']);
                                            }
                                        },
                                    ]
            ]
        ],
    ]); ?>


</div>
