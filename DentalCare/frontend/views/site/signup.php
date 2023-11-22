
<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use frontend\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

AppAsset::register($this);
$this->title = 'Signup';
?>


<div class="container">
    <a class="icon" href="../"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="site-signup">
        <h1>Bem vindo à Dental Care</h1>
        <p>Cria a tua conta para teres acesso a várias funcionalidades da nossa clínica:</p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'nome')->textInput(['autofocus' => true])?>

                <?= $form->field($model, 'telefone')?>

                <?= $form->field($model, 'morada')->textInput(['autofocus' => true])?>

                <?= $form->field($model, 'nif')?>

                <?= $form->field($model, 'codigopostal')?>

                <label>
                                <span>
                                    <?php
                                    echo Html::tag('div',Html::a('Já tenho conta!',['site/login']));
                                    ?>
                                </span>
                </label>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-block btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>