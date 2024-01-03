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

<main id="main">
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url(img/slide/slide-2.jpg);">
                <div class="container">
                    <h2>Bem-vindo à <span>DentalCare</span></h2>
                </div>
            </div>
            <div class="carousel-item active" style="background-image: url(img/slide/slide-4.jpg);">
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





