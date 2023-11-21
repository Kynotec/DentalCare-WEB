<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="perfil-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php

        echo $form->field($model, 'nome')->textInput(['maxlength' => true]);
        echo $form->field($model, 'telefone')->input(['number']);
        echo $form->field($model, 'nif')->textInput(['type' => 'number']);






        echo $form->field($model, 'morada')->textInput(['maxlength' => true]);

        echo $form->field($model, 'codigopostal')->textInput(['maxlength' => true])->textInput(['type' => 'number']);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
