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

    <div class="row">

        <div class="col-lg-7">
            <!-- Form content -->
            <div class="site-login">
                <a class="icon" href="../"><i class="fa-solid fa-arrow-left"></i></a>
                <h1>Bem Vindo de volta à Dental Care</h1>
                <br>
                <p>Acede à tua conta para ter acesso às nossas funcionalidades!</p>
                <h1><?= Html::encode($this->title) ?></h1>
                <br>

                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <label>
                    <span>
                        <?php
                        echo Html::tag('div', Html::a('Criar uma conta', ['site/signup']));
                        ?>
                    </span>
                    <br>
                </label>
                <br>
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <br>
        <div class="col-lg-5">
            <br>
            <br>
            <!-- Image content -->
            <img src="../img/gallery/gallery-6.jpg" alt="..." class="img-fluid rounded-start-circle">
        </div>
    </div>
    <br>
    <br>
    <br>
</div>




