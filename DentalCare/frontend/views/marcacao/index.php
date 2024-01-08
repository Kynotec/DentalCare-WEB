<?php

use common\models\Marcacao;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\SearchMarcacao $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'As Minhas Marcações';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marcacao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'descricao',
            'data',
            'hora',
            //'profile_id',
            [
                'attribute' => 'servico_id',
                'label' => 'Serviço',
                'value' => function ($model) {
                    $servico = $model->servico->descricao;
                    return $servico;
                }
            ],
            'estado',
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
<br><br><br><br>

</div>
