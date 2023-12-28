<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
        <?= Html::csrfMetaTags() ?>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

    <link href="index/img/dentalcareicon.ico" rel="icon">
    <link href="index/img/dentalcareicon.ico" rel="apple-touch-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody()?>

<header id="header">
    <div class="container d-flex align-items-center">


        <nav id="navbar" class="navbar form">
            <ul>

                <div class="container d-flex align-items-center">
                    <img src="../web/img/dentalcarelogo.png" height="70" width="160"></a>


                    <nav id="navbar" class="navbar form">
                        <ul>
                            <?php
                            if (Yii::$app->user->isGuest) {
                                echo Html::tag('div ',Html::a('Home',['/'],['class' => ['btn header-btn']]));
                                echo Html::tag('div',Html::a('PRODUTOS',['/produto']));
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
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
        </ul>
        <form class="d-flex" action="/carrinho/index">
            <button class="btn btn-outline-dark" type="submit">
                <i class="bi-cart-fill me-1"></i>Carrinho
                <span class="badge bg-dark text-white ms-1 rounded-pill" id="carrinho-quantidade"><?php echo 'variavel' ?></span>
            </button>
        </form>
</header>


<main role="main">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
</main>


<footer id="footer" >


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
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();