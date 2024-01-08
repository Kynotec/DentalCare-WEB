<?php

use common\models\Marcacao;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\SearchMarcacao $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Marcações';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">

                            <?= Html::a('Criar Marcação', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            'id',
                            //'descricao',
                            [
                                'attribute' => 'profile_id',
                                'label' => 'Nome do Utente',
                                'value' => function ($model) {
                                    $perfil = $model->profile->nome;
                                    return $perfil;
                                }
                            ],
                            'data',
                            'hora',
                            'estado',
                            //'servico_id',

                            [
                                'class' => ActionColumn::class,
                                'contentOptions' => ['style' => 'width: 1%; white-space: nowrap;'],
                                'template' => '{view} {update}',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        if (Yii::$app->user->can('readConsulta')) {
                                            return Html::a('<i class="fas fa-eye"></i>', ['marcacao/view', 'id' => $model->id], ['class' => 'btn btn-primary']);
                                        }
                                    },
                                    'update' => function ($url, $model) {
                                        $estadosNaoPermitidos = ['Realizado', 'Pago'];

                                        if (Yii::$app->user->can('updateConsulta') && !in_array($model->estado, $estadosNaoPermitidos)) {
                                            return Html::a('<i class="fas fa-pencil-alt text-white"></i>', ['marcacao/update', 'id' => $model->id], ['class' => 'btn btn-warning mr-1']);
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
