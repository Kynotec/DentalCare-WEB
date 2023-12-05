<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Categoria $model */

$this->title = 'Atualizar Categoria: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Categoria', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
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
