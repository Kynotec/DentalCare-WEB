<?php

use common\models\Iva;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Iva $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'percentagem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emvigor')->radioList([Iva::STATUS_ACTIVE => 'Ativo', Iva::STATUS_INACTIVE => 'Desativo'], ['required' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
