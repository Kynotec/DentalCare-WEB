<?php

use common\models\Perfil;
use common\models\Servico;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Marcacao $model */
/** @var yii\widgets\ActiveForm $form */
?>


<div class="consulta-form">
    <br>

    <?php $form = ActiveForm::begin(['action' => ['create']]); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd', // Formato da data
        'options' => ['class' => 'form-control'], // Opções do input
    ]) ?>

    <?= $form->field($model, 'estado')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'profile_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'servico_id')->hiddenInput()->label(false) ?>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Guardar e Selecionar Hora', ['class' => 'btn btn-success']) ?>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br>

    <?php ActiveForm::end(); ?>

</div>
