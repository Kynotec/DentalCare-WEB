<?php

use common\models\Categoria;
use common\models\Iva;
use common\models\Produto;
use common\models\Imagem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div>

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'precounitario')->textInput() ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'iva_id')->dropDownList(ArrayHelper::map(Iva::find()->all(), 'id','percentagem','descricao'), ['prompt' => '- Nenhum -']); ?>


    <?= $form->field($model, 'categoria_id')->dropDownList(ArrayHelper::map(Categoria::find()->all(), 'id', 'descricao'), ['prompt' => '- Nenhum -']); ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
