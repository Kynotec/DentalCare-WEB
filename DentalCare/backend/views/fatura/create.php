<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Faturas $model */
/** @var common\models\Empresa $empresa */
/** @var common\models\LinhaFatura $linhafatura */

$this->title = 'Create Fatura';
$this->params['breadcrumbs'][] = ['label' => 'Faturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faturas-create">



    <?= $this->render('_form', [
        'model' => $model,
        'empresa' => $empresa,
        'linhafatura'=>$linhafatura,
    ]) ?>


</div>
