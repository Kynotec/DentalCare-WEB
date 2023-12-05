<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\helpers\Url;

AppAsset::register($this);
$this->title = 'Dental Care';
?>
<link href="index/img/dentalcareicon.ico" rel="icon">
<link href="index/img/dentalcareicon.ico" rel="apple-touch-icon">


<header id="header">
    <div class="container d-flex align-items-center">


    <nav id="navbar" class="navbar form">
        <ul>

            <div class="container d-flex align-items-center">
                <a href=""> <img src="index/img/dentalcarelogo.png" height="70" width="160"></a>
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
                echo Html::tag('li',Html::a('AREA UTENTE',['/areautente/view','user_id'=>Yii::$app->user->id]));
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
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url(index/img/slide/slide-2.jpg);">
                <div class="container">
                    <h2>Bem-vindo à <span>DentalCare</span></h2>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Serviços</h2>
                <p>A Dental Care tem um vasto portefólio de serviços disponiveis na clínica dentária. Esses serviços contribuem de forma positiva na saúde dentária dos nossos pacientes.</p>
                <p><b>Alguns exemplos dos serviços disponiveis da nossa clínica.</b></p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon"><i class="fa-solid fa-tooth"></i></div>
                    <h4 class="title"><a href="">Branqueamento</a></h4>
                    <p class="description">O branqueamento dentário é um tratamento estético que visa clarear a cor dos dentes, deixando-os mais brancos e brilhantes.</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon"><i class="fa-solid fa-tooth"></i></div>
                    <h4 class="title"><a href="">Ortodontia</a></h4>
                    <p class="description">O objetivo da ortodontia é melhorar a estética e a função dos dentes, proporcionando um sorriso mais harmonioso e uma melhor mastigação.</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon"><i class="fa-solid fa-tooth"></i></div>
                    <h4 class="title"><a href="">Implantes</a></h4>
                    <p class="description">A cirurgia de implantes dentários é um procedimento que substitui as raízes dos dentes com pernos metálicos que se assemelham a parafusos. </p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon"><i class="fa-solid fa-tooth"></i></div>
                    <h4 class="title"><a href="">Destartarização</a></h4>
                    <p class="description">Consiste na remoção do tártaro e cálculos existentes nos dentes. </p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon"><i class="fa-solid fa-tooth"></i></div>
                    <h4 class="title"><a href="">Desvitalização</a></h4>
                    <p class="description">Consiste na remoção dos tecidos internos do dente, como a polpa dentária, que pode estar infectada ou danificada. A desvitalização é realizada para salvar o dente e evitar a extração.</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon"><i class="fa-solid fa-tooth"></i></div>
                    <h4 class="title"><a href="">Periodontia</a></h4>
                    <p class="description">A Periodontia desempenha um papel importante na colocação e manutenção de implantes dentários, que são estruturas de titânio que substituem as raízes dos dentes perdidos.</p>
                </div>
            </div>

        </div>
    </section><!-- End Services Section -->

</main><!-- End #main -->

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



