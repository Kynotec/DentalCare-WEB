<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */
/* @var $model common\models\User */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div>
    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefone')->textInput(['type'=>'number'])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nif')->textInput(['type'=> 'number'])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'morada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigopostal')->textInput(['maxlength' => true])?>

    <br>

    <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
