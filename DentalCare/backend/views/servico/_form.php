<?php

use common\models\Iva;
use common\models\Imagem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Servico $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="servico-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'referencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelUpload, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'preco')->textInput() ?>

    <?= $form->field($model, 'iva_id')->dropDownList(ArrayHelper::map(Iva::find()->all(), 'id','percentagem','descricao'), ['prompt' => '- Nenhum -']); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
