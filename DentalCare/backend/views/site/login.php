<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/** @var \common\models\Login $model */
?>
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Inicie sessão para continuar</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>

        <?= $form->field($model,'username', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form->field($model, 'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-5">
                <?= Html::submitButton('Iniciar Sessão', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <!-- /.login-card-body -->
</div>