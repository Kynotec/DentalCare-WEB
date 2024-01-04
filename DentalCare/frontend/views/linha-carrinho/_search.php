<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\SearchLinhaCarrinho $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="linha-carrinho-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'quantidade') ?>

    <?= $form->field($model, 'valorunitario') ?>

    <?= $form->field($model, 'valoriva') ?>

    <?= $form->field($model, 'valortotal') ?>

    <?php // echo $form->field($model, 'carrinho_id') ?>

    <?php // echo $form->field($model, 'produto_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
