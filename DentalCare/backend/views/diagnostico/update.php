<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Diagnostico $model */

$this->title = 'Atualizar Diagnóstico: ' . $model->profile->nome;
$this->params['breadcrumbs'][] = ['label' => 'Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="diagnostico-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
