<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Faturas $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<div class="container-fluid">

    <div class="card">

        <div class="card-body">
            <p>
                <a href="./" class="btn-left"><i class="fas fa-arrow-left" data-toggle="tooltip" data-placement="left" title="Cancelar"></i></a>
            </p>
            <div class="row">
                <div class="col-md-12">

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [
                                'attribute' => 'profile_id',
                                'label' => 'Nome do Utente',
                                'value' => function ($model) {
                                    $perfil = $model->profile->nome;
                                    return $perfil;
                                }
                            ],
                            'data',
                            'valortotal',
                            'ivatotal',
                            'subtotal',
                            'estado',

                        ],
                    ]) ?>

                </div>

                <!--.col-md-12-->
            </div>

            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <br><br><br><br><br><br><br><br><br><br><br>
    <!--.card-->
</div>