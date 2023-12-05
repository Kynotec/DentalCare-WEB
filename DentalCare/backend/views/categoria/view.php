<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Categoria $model */

$this->title = $model->descricao;
$this->params['breadcrumbs'][] = ['label' => 'Categoria', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a("<span class='material-symbols-outlined' style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>edit</span>", ['update', 'id' => $model->id], [
                            'class' => 'btn ',
                            'hidden' => !Yii::$app->user->can("funcionario")]) ?>

                    </p>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'descricao',
                        ],
                    ]) ?>

                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>


