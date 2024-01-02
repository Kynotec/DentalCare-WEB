<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Marcacao $model */

$this->title = 'Criar Marcação';
$this->params['breadcrumbs'][] = ['label' => 'Marcações', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marcacao-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
