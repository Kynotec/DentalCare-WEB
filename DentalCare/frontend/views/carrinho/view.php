<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Carrinho $model */

$this->params['breadcrumbs'][] = ['label' => 'Carrinho', 'url' => ['view']];
$this->params['breadcrumbs'][] = $this->title;
$this->title = 'Carrinho';

\yii\web\YiiAsset::register($this);
?>
<div class="container">

    <h1> Carrinho</h1>

    <?php if (!empty($carrinho->linhaCarrinhos)): ?>

        <table class="table text-center">
            <thead>
            <tr>
                <th>Produto</th>
                <th>Imagem</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Total</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($carrinho->linhaCarrinhos as $linhaCarrinho): ?>
                <tr>
                    <td><?= Html::encode($linhaCarrinho->produto->nome) ?></td>
                    <td>
                        <?php if (!empty($linhaCarrinho->produto->imagens) && isset($linhaCarrinho->produto->imagens[0]['filename'])): ?>
                            <?= Html::img(
                                'http://localhost/DentalCare-WEB/DentalCare/public/images/products/' . $linhaCarrinho->produto->imagens[0]['filename'],
                                ['class' => 'img card-img-center', 'alt' => '...',
                                    'width' => 110, // Defina a largura desejada
                                    'height' => 105, // Defina a altura desejada
                            ]

                            ); ?>
                        <?php else: ?>
                            <p>Imagem não disponível</p>
                        <?php endif; ?>
                    </td>


                    <td>
                        <?= Html::beginForm(['carrinho/update-quantidade', 'linhaCarrinhoId' => $linhaCarrinho->id], 'post', ['class' => 'form-inline']) ?>
                        <?= Html::textInput("quantidade[{$linhaCarrinho->id}]", $linhaCarrinho->quantidade, ['class' => 'container', 'style' => 'width: 50px;']) ?>
                        <?= Html::submitButton('<i class="fas fa-sync-alt"></i>', ['class' => 'btn btn-primary btn-sm', 'title' => 'Atualizar']) ?>
                        <?= Html::endForm() ?>
                    </td>
                    <td><?= Yii::$app->formatter->asCurrency($linhaCarrinho->produto->precounitario, 'EUR') ?></td>
                    <td><?= Yii::$app->formatter->asCurrency($linhaCarrinho->calcularTotal(), 'EUR') ?></td>

                    <td>
                        <?= Html::a(
                            '<i class="fas fa-trash-alt"></i> Remover',
                            ['delete', 'linhaCarrinhoId' => $linhaCarrinho->id],
                            [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Tem certeza que deseja remover este item do carrinho?',
                                    'method' => 'post',
                                ],
                            ]
                        ); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <p>Total do Carrinho: <?= Yii::$app->formatter->asCurrency($carrinho->calcularTotalCarrinho(), 'EUR') ?></p>
    <?php else: ?>
        <p>O carrinho está vazio.</p>
    <?php endif; ?>

    <div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
</div>

