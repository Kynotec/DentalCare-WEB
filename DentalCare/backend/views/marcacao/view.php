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
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
                    $servico = $model->servico->descricao;
                    return $servico;
                }
            ],
            //'profile_id',
            //'servico_id',
        ],
    ]) ?>

</div>
