<div class="el-wrapper">
    <div class="box-up">
        <!-- Product image -->
        <?php use yii\bootstrap5\Html;

        if (!empty($model->imagens) && isset($model->imagens[0]['filename'])): ?>
            <img class="img card-img-top"
                 src="<?php echo 'http://localhost/DentalCare-WEB/DentalCare/public/images/products/' . $model->imagens[0]['filename']; ?>"
                 alt="...">
        <?php else: ?>
            <p>error image</p> <!-- Or any default value or message you want to display -->
        <?php endif; ?>

        <div class="img-info">
            <div class="info-inner">
                <!-- Product name -->
                <span class="p-name"><?php echo $model->nome ?></span>

                <!-- Product details -->
                <div class="box-down">
                    <div class="h-bg">
                        <div class="h-bg-inner"></div>
                    </div>

                    <!-- Product price -->
                    <?php
                    $currencyFormatted = Yii::$app->formatter->asCurrency($model->precounitario, 'EUR'); ?>

                    <a class="cart" <?= Html::a('<span class="price">' . str_replace('€', '', $currencyFormatted) . ' €' . '</span> <span class="add-to-cart"><span class="txt">Adicionar ao carrinho</span>',   ['carrinho/adicionar-ao-carrinho', 'produtoId' => $model->id]) ?>
                </div>

                <!-- Product description -->
                <div class="card-text">
                    <?php echo $model->getShortDescription() ?>
                </div>
                <?= Html::a('Ver detalhes', ['view', 'id' => $model->id], ['class' => 'btn btn-info ']) ?>
            </div>
        </div>
    </div>

</div>


<style>

    body {
        background-color: #f7f7f7;
    }


    .page-wrapper .page-inner {
        display: table-cell;
        vertical-align: middle;
    }

    .el-wrapper {
        width: 300px;
        padding: 15px;
        margin: 15px auto;
        background-color: #fff;
    }

    @media (max-width: 991px) {
        .el-wrapper {
            width: 345px;
        }
    }

    @media (max-width: 767px) {
        .el-wrapper {
            width: 290px;
            margin: 30px auto;
        }
    }

    .el-wrapper:hover .h-bg {
        left: 0px;
    }

    .el-wrapper:hover .price {
        left: 20px;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        color: #818181;
    }

    .el-wrapper:hover .add-to-cart {
        left: 65%;
    }

    .el-wrapper:hover .img {
        webkit-filter: blur(7px);
        -o-filter: blur(7px);
        -ms-filter: blur(7px);
        filter: blur(7px);
        filter: progid:DXImageTransform.Microsoft.Blur(pixelradius='7', shadowopacity='0.0');
        opacity: 0.4;
    }

    .el-wrapper:hover .info-inner {
        bottom: 155px;
    }

    .el-wrapper:hover .a-size {
        -webkit-transition-delay: 300ms;
        -o-transition-delay: 300ms;
        transition-delay: 300ms;
        bottom: 50px;
        opacity: 1;
    }

    .el-wrapper .box-down {
        width: 100%;
        height: 70px;
        position: relative;
        overflow: hidden;
    }

    .el-wrapper .box-up {
        width: 100%;
        height: 500px;
        position: relative;
        overflow: hidden;
        text-align: center;
    }

    .el-wrapper .img {
        padding: 20px 0;
        -webkit-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
        -moz-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
        -o-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
        transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
        /* ease-out */
        -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
        -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
        -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
        transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
        /* ease-out */
    }

    .h-bg {
        -webkit-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
        -moz-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
        -o-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
        transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
        /* ease-out */
        -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
        -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
        -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
        transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
        /* ease-out */
        width: 662px;
        height: 100%;
        background-color: #a9b7c7;
        position: absolute;
        left: -659px;
    }

    .h-bg .h-bg-inner {
        width: 60%;
        height: 100%;
        background-color: #464646;
    }

    .info-inner {

        /* ease-out */
        position: absolute;
        width: 100%;
        bottom: 25px;
    }

    .info-inner .p-name,
    .info-inner .p-company {
        display: block;
    }

    .info-inner .p-name {
        font-family: 'PT Sans', sans-serif;
        font-size: 18px;
        color: #252525;
    }

    .info-inner .p-company {
        font-family: 'Lato', sans-serif;
        font-size: 12px;
        text-transform: uppercase;
        color: #8c8c8c;
    }



    .cart {
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        font-family: 'Lato', sans-serif;
        font-weight: 700;
    }

    .cart .price {
        -webkit-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
        -moz-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
        -o-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
        transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
        /* ease-out */
        -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
        -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
        -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
        transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
        /* ease-out */
        -webkit-transition-delay: 100ms;
        -o-transition-delay: 100ms;
        transition-delay: 100ms;
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        font-size: 16px;
        color: #252525;
    }

    .cart .add-to-cart {

        -webkit-transition-delay: 100ms;
        -o-transition-delay: 100ms;
        transition-delay: 100ms;
        display: block;
        position: absolute;
        top: 50%;
        left: 140%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .cart .add-to-cart .txt {
        font-size: 12px;
        color: #fff;
        letter-spacing: 0.045em;
        text-transform: uppercase;
        white-space: nowrap;
    }

</style>

