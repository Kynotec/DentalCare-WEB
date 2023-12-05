<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Iva $model */

$this->title = 'Atualizar Iva: ' . $model->descricao;
$this->params['breadcrumbs'][] = ['label' => 'Iva', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->descricao, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="container">
    <br>
    <div class="card">
        <div class="card-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>


        </div>
    </div>
</div>
