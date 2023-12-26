<?php

use common\models\Consulta;
use common\models\Perfil;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Diagnostico $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="diagnostico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'data')->textInput(['value' => date('Y-m-d'), 'readonly' => true]) ?>

    <?= $form->field($model, 'hora')->textInput(['value' => date('H:i:s'), 'readonly' => true]) ?>

    <?= $form->field($model, 'profile_id')->dropDownList(ArrayHelper::map(Perfil::find()->all(), 'id', 'nome'),['prompt' => '- Nenhum -']); ?>

    <?= $form->field($model, 'consulta_id')->dropDownList(
        ArrayHelper::map(
            Consulta::find()->all(),
            'id',
            function ($consulta) {
                return $consulta->data . ' ' .  $consulta->hora . ' | ' . $consulta->profile->nome;
            }
        ),
        ['prompt' => '- Nenhum -']
    )->label('Selecione uma Consulta:'); ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
