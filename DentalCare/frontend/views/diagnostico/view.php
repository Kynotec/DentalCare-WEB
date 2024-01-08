<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Diagnostico $model */

$this->title = 'Diagnóstico: '. $model->profile->nome;
$this->params['breadcrumbs'][] = ['label' => 'Os meus Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <h1><?= Html::encode($this->title) ?></h1>
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
                            //'id',

                            [
                                'attribute' => 'profile_id',
                                'label' => 'Nome do Utente',
                                'value' => function ($model) {
                                    $perfil = $model->profile->nome;
                                    return $perfil;
                                }
                            ],
                            [
                                'attribute' => 'data',
                                'label' => 'Data|Hora do Diagnóstico',
                                'value' => function ($model) {
                                    $diagnostico = $model->data . ' | ' . $model->hora;
                                    return $diagnostico;
                                }
                            ],
                            [
                                'attribute' => 'data',
                                'label' => 'Data|Hora da Consulta',
                                'value' => function ($model) {
                                    $consulta = $model->consulta->data . ' | ' . $model->consulta->hora;
                                    return $consulta;
                                }
                            ],

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
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!--.card-->
</div>