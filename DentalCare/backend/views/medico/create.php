<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Perfil $model */

$this->title = 'Criar Médico';
$this->params['breadcrumbs'][] = ['label' => 'Médico', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
