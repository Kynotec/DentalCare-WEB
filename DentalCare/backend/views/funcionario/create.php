<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Perfil $model */

$this->title = 'Criar Funcionário';
$this->params['breadcrumbs'][] = ['label' => 'Funcionários', 'url' => ['index']];
?>
<div class="perfil-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
