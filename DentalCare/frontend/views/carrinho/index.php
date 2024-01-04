<?php

/* @var $this yii\web\View */
/* @var $carrinho common\models\Carrinho */

use yii\helpers\Html;

$this->title = 'Carrinho';
$this->params['breadcrumbs'][] = $this->title;
?>


<h1><?= Html::encode($this->title) ?></h1>

<?php if (!empty($carrinho->linhaCarrinhos)): ?>

    <table class="table">
        <thead>
        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço Unitário</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($carrinho->linhaCarrinhos as $linhaCarrinho): ?>
            <tr>

                <td><?= Html::encode($linhaCarrinho->produto->nome) ?></td>
                <td><?= Html::encode($linhaCarrinho->quantidade) ?></td>
                <td><?= Yii::$app->formatter->asCurrency($linhaCarrinho->produto->precounitario, 'EUR') ?></td>
                <td><?php/* Yii::$app->formatter->asCurrency($linhaCarrinho->calcularTotal(), 'EUR') */?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <p>Total do Carrinho: <?php/* Yii::$app->formatter->asCurrency($carrinho->calcularTotalCarrinho(), 'EUR')*/ ?></p>
<?php else: ?>
    <p>O carrinho está vazio.</p>
<?php endif; ?>
