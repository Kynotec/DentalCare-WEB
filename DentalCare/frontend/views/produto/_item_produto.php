
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
                    $currencyFormatted = Yii::$app->formatter->asCurrency($model->precounitario + ($model->precounitario * $model->iva->percentagem/100), 'EUR'); ?>

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
