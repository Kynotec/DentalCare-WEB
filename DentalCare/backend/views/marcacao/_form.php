<?php

use common\models\Perfil;
use common\models\Servico;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\Consulta $model */
/** @var yii\widgets\ActiveForm $form */


$model->hoursOptions = $model->getHoursOptions();
?>

<div class="consulta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd', // Formato da data
        'options' => ['class' => 'form-control'], // Opções do input
    ]) ?>

    <?= $form->field($model, 'hora')->dropDownList($model->hoursOptions, ['prompt' => 'Selecione a hora']) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile_id')->dropDownList(ArrayHelper::map(Perfil::find()->all(), 'id', 'nome'), ['prompt' => '- Nenhum -']); ?>

    <?= $form->field($model, 'servico_id')->dropDownList(ArrayHelper::map(Servico::find()->all(), 'id', 'descricao'), ['prompt' => '- Nenhum -']); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
