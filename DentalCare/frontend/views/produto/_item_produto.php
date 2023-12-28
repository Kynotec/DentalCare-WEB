<?php
/** @var \common\models\Produto $model */
?>
<div class="card h-100">
    <!-- Product image-->
    <?php if (!empty($model->imagens) && isset($model->imagens[0]['filename'])): ?>
        <img class="card-img-top"
             src="<?php echo 'http://localhost/DentalCare-WEB/DentalCare/public/images/products/' . $model->imagens[0]['filename']; ?>"
             alt="...">
    <?php else: ?>
        <p>error image</p> <!-- Or any default value or message you want to display -->
    <?php endif; ?>


    <!-- Product details-->
    <div class="card-body p-4">
        <h5 class="card-title">
            <a href="#" class="text-dark"><?php echo \yii\helpers\StringHelper::truncateWords($model->nome, 20) ?></a>
        </h5>
        <h5><?php echo Yii::$app->formatter->asCurrency($model->precounitario, 'EUR') ?></h5>
        <div class="card-text">
            <?php echo $model->getShortDescription() ?>
        </div>
    </div>
    <!-- Product actions-->
    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
        <div class="text-center"><a class="btn btn-outline-dark mt-auto btn-adicionar-carrinho"
                                    href="<?php echo \yii\helpers\Url::to(["/carrinho/add"]) ?>">Adicionar ao
                carrinho</a>
        </div>
    </div>
</div>