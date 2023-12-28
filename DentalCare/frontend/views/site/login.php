<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var \common\models\LoginForm $model */

use frontend\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

AppAsset::register($this);
$this->title = 'Login';
?>

<div class="container">
    <div class="site-login"><br>
        <h1>Bem Vindo de volta à Dental Care</h1>
        <p>Acede à tua conta para ter acesso às nossas funcionalidades!</p>

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>


                <label>
                                <span>
                                    <?php
                                    echo Html::tag('div', Html::a('Criar uma conta', ['site/signup']));
                                    ?>
                                </span>
                </label>


                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>

