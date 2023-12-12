<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;

/** @var yii\web\View $this */
/** @var common\models\Perfil $model */
$this->title = 'Atualizar Utente:  ' . $model->user->username;

AppAsset::register($this);
$this->title = 'Dental Care';
?>

<link href="../index/img/dentalcareicon.ico" rel="icon">
<link href="../index/img/dentalcareicon.ico" rel="apple-touch-icon">


<header id="header">
    <div class="container d-flex align-items-center">


        <nav id="navbar" class="navbar form">
            <ul>

                <div class="container d-flex align-items-center">
                    <a href=""> <img src="../index/img/dentalcarelogo.png" height="70" width="160"></a>
                    <nav id="navbar" class="navbar form">
                        <ul>
                            <?php
                            if (Yii::$app->user->isGuest) {
                                echo Html::tag('div ',Html::a('Home',['/'],['class' => ['btn header-btn']]));
                                echo Html::tag('div ',Html::a('Login',['/site/login'],['class' => ['btn header-btn']]));
                                echo Html::tag('div ',Html::a('Registe-se',['/site/signup'],['class' => ['btn header-btn']]));

                            }
                            ?>
                        </ul>
                    </nav>
                </div>

                <?php
                if (!Yii::$app->user->isGuest)
                {
                    echo Html::tag('li',Html::a('AREA UTENTE',['/utente/view','user_id'=>Yii::$app->user->id]));
                    echo Html::tag('li',Html::a('MARCAÇÕES',['/marcacoes/view','user_id'=>Yii::$app->user->id]));
                    echo Html::tag('li',Html::a('CONSULTA',['/consulta/view','user_id'=>Yii::$app->user->id]));
                    echo Html::tag('li',Html::a('PRODUTOS',['/site/produtos']));
                    echo Html::tag('li',Html::a('SERVIÇOS',['/servicos/view','user_id'=>Yii::$app->user->id]));
                    echo Html::tag('li',Html::a('',['']));
                    {
                        echo Html::beginForm(['site/logout'], 'get')
                            . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')',
                                ['class' => 'nav-link scrollto']
                            )
                            . Html::endForm();
                    }
                }
                ?>
            </ul>
        </nav>
    </div>





</header>

<main id="main">
<div class="container">
    <?php  echo Html::tag('class= fas fa-arrow-left ',Html::a('Voltar',['/utente/view','user_id'=>Yii::$app->user->id]));?>
    <br>
    <div class="card">
        <div class="card-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>


        </div>
    </div>
</div>
</main>

<footer id="footer">

    <div class="container">

        <div class="copyright">
            &copy; Copyright <strong><span>Medicio</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by Alexandre, Diogo, Luis
        </div>
    </div>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</footer>