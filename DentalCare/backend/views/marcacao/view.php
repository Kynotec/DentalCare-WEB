<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Marcacao $model */

$this->title = $model->data .' | '. $model->hora .' | '. $model->profile->nome;
$this->params['breadcrumbs'][] = ['label' => 'Marcações', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="marcacao-view">
    <p>
    <?php
    if ($model->estado == 'Por Realizar') {
        echo Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        echo Html::a(' ');
        echo Html::a('Concluir Consulta', ['concluir', 'id' => $model->id], ['class' => 'btn btn-success']);
        echo Html::a(' ');
        echo Html::a('Desmarcar Consulta', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger']);
    }elseif ($model->estado == 'Realizado' && $model->estado == 'Pago'){
        echo Html::a(' ');
    }?>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'descricao',
            'data',
            'hora',

            'estado',
            [
                'attribute' => 'profile_id',
                'label' => 'Nome do Utente',
                'value' => function ($model) {
                    $perfil = $model->profile->nome;
                    return $perfil;
                }
            ],
            [
                'attribute' => 'profile_id',
                'label' => 'Telemóvel do Utente',
                'value' => function ($model) {
                    $perfil = $model->profile->telefone;
                    return $perfil;
                }
            ],

            [
                'attribute' => 'servico_id',
                'label' => 'Serviço a Realizar',
                'value' => function ($model) {
                    $servico = $model->servico->nome;
                    return $servico;
                }
            ],

        ],
    ]) ?>

</div>
