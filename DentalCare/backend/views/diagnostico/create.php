<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Diagnostico $model */

$this->title = 'Criar Diagnóstico';
$this->params['breadcrumbs'][] = ['label' => 'Diagnósticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnostico-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
