<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Diagnostico $model */

$this->title = 'Diagnóstico: '. $model->profile->nome;
$this->params['breadcrumbs'][] = ['label' => 'Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="diagnostico-view">
    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',

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
                'attribute' => 'data',
                'label' => 'Data|Hora da Consulta',
                'value' => function ($model) {
                    $consulta = $model->consulta->data . ' | ' . $model->consulta->hora;
                    return $consulta;
                }
            ],

            'descricao',
        ],
    ]) ?>

</div>
