<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Marcacao $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = 'Atualizar Marcação: ' .  $model->data . ' | ' .$model->hora;
$this->params['breadcrumbs'][] = ['label' => 'As Minhas Marcações', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar Marcação';
?>

<div class="consulta-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hora')->dropDownList($model->hoursOptions, ['prompt' => 'Selecione a hora']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
