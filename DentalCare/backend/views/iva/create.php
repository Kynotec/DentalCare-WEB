<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Iva $model */

$this->title = 'Criar Iva';
$this->params['breadcrumbs'][] = ['label' => 'Iva', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?=$this->render('_form', [
                        'model' => $model
                    ]) ?>
                </div>
            </div>
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>