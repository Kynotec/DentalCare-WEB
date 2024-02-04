<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>

<div class="container">

    <h1 class="text-center" style="margin-top: -60px;"><?= Html::encode($this->title) ?></h1>

    <div class="text-center">
        <?php if (!empty($model->imagens) && isset($model->imagens[0]['filename'])): ?>
            <img class="img" style="max-width: 100%; max-height: 400px;"
                 src="<?= 'http://172.22.21.201/DentalCare-WEB/DentalCare/public/images/products/' . $model->imagens[0]['filename']; ?>"
                 alt="...">
        <?php else: ?>
            <p class="error-message">Imagem não disponível</p>
        <?php endif; ?>
    </div>

    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            [
                'attribute' => 'categoria_id',
                'label' => 'Categoria',
                'value' => function ($model) {
                    $categoria = $model->categoria->descricao;
                    return $categoria;
                }
            ],
            'descricao:ntext',
            [
                'label' => 'Valor Total s\ Iva',
                'value' => Yii::$app->formatter->asDecimal($model->precounitario , 2) . ' €',

            ],
            [
                'label' => 'Valor Total c\ Iva',
                'value' => Yii::$app->formatter->asDecimal($model->precounitario + ($model->precounitario * $model->iva->percentagem/100), 2) . ' €',

            ],

            [
                'attribute' => 'iva_id',
                'label' => 'Taxa Iva',
                'value' => function ($model) {
                    $iva = $model->iva->percentagem . ' %';
                    return $iva;
                }
            ],


        ],
    ]) ?>

    <?= Html::a('Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Adicionar ao carrinho', ['carrinho/adicionar-ao-carrinho', 'produtoId' => $model->id], ['class' => 'btn btn-primary']); ?>
</div>


