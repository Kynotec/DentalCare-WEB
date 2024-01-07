<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Marcacao $model */

$this->title = 'Atualizar Marcação: ' . $model->data .' | '. $model->hora .' | '. $model->profile->nome;
$this->params['breadcrumbs'][] = ['label' => 'Marcações', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="marcacao-update">

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
