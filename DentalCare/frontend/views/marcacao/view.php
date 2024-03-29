<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Marcacao $model */

$this->title = $model->data . ' | ' . $model->hora;
$this->params['breadcrumbs'][] = ['label' => 'As Minhas Marcações', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container">

    <h1 class="text-center" style="margin-top: -60px;"><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if ($model->estado == 'Por Realizar') {
            echo Html::a('Atualizar Marcação', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            echo(' ');
            echo Html::a('Desmarcar Consulta', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger']);
        } ?>
    </p>
    <p>
        <?php
        if ($model->estado == 'Realizado') {
            echo Html::a('Pagar Consulta', ['pagar', 'id' => $model->id], ['class' => 'btn btn-success']);
        } ?>
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
                'attribute' => 'servico_id',
                'label' => 'Nome do Serviço',
                'value' => function ($model) {
                    $servico = $model->servico->nome;
                    return $servico;
                }
            ],
            [
                'attribute' => 'servico_id',
                'label' => 'Descriçao do Serviço',
                'value' => function ($model) {
                    $servico = $model->servico->descricao;
                    return $servico;
                }
            ],
        ],
    ]) ?>
    <br>

</div>
