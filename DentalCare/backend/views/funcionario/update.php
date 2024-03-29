<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Perfil $model */
$this->title = 'Atualizar Funcionário:  ' . $model->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Funcionários', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->username, 'url' => ['view', 'id' => $model->id]];
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