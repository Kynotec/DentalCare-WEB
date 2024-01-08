<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Marcacao $model */
/** @var common\models\Servico $servico_id */


$this->title = 'Criar Marcação';
$this->params['breadcrumbs'][] = ['label' => 'Serviços', 'url' => ['/servico/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marcacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'=>$model,
        'servico_id' => $servico_id,


    ]) ?>
    <br><br><br><br>

</div>
