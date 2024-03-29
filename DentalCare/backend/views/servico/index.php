<?php

use common\models\Servico;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Imagem;

/** @var yii\web\View $this */
/** @var backend\models\SearchServico $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Serviços';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">

                            <?=
                            Html::a('Criar Serviço', ['servico/create'], ['class' => 'btn btn-success',]) ?>
                        </div>
                    </div>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'columns' => [
                            //'id',

                            'referencia',
                            'nome',
                            'descricao',

                            [
                                'label' => 'Imagem Serviço',
                                'attribute' => 'filename',
                                'format' => 'html',
                                'content' => function($model) {
                                    if (!empty($model->imagens) && is_array($model->imagens)) {
                                        // Check if the first element exists and has the "filename" key
                                        if (isset($model->imagens[0]['filename'])) {
                                            return Html::img('http://172.22.21.201/DentalCare-WEB/DentalCare/public' . '/images/services/' . $model->imagens[0]['filename'],['style'=>'height: 100px; display: block; margin: 0 auto;']);
                                        }
                                    }

                                    return 'Error Image'; // Or any default value or message you want to display
                                }
                            ],

                            [
                                'attribute' => 'preco',
                                'value' => function ($model) {
                                    $preco = $model->preco . " € " ;
                                    return $preco;
                                }
                            ],

                            [
                                'attribute' => 'ativo',
                                'format' => 'html',
                                'value' => function($data) {
                                    return $data->getStatusLabel();
                                }
                            ],

                            [
                                'class' => ActionColumn::class,
                                'contentOptions' => ['style' => 'width: 1%; white-space: nowrap;'],
                                'template' => '{view} {update} {delete}',
                                'buttons' => [
                                    'view' => function($url, $model)
                                    {
                                        if (Yii::$app->user->can('readServicos')) {
                                            return Html::a('<i class="fas fa-eye"></i>', ['servico/view', 'id' => $model->id], ['class' => 'btn btn-primary']);
                                        }
                                    },
                                    'update' => function($url, $model)
                                    {
                                        if (Yii::$app->user->can('updateServicos')) {
                                            return Html::a('<i class="fas fa-pencil-alt text-white"></i>', ['servico/update', 'id' => $model->id], ['class' => 'btn btn-warning mr-1']);
                                        }
                                    },
                                    'delete' => function($url, $model)
                                    {
                                        if (Yii::$app->user->can('deleteServicos')) {

                                            if($model->ativo == Servico::STATUS_ACTIVE)
                                            {
                                                return Html::a("<span class='material-symbols-outlined' style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>toggle_off</span>", ['desativar', 'id' => $model->id], [
                                                    'class' => 'btn  btn-danger pb-0',
                                                    'data'=> [
                                                        'confirm' => 'Tem a certeza que quer desativar este Serviço?'
                                                    ]
                                                ]);

                                            }
                                            else
                                            {
                                                return Html::a("<span class='material-symbols-outlined'  style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>toggle_on</span>", ['ativar', 'id' => $model->id], [
                                                    'class' => 'btn  btn-success pb-0',
                                                    'data'=> [
                                                        'confirm' => 'Tem a certeza que quer ativar este Serviço?'
                                                    ]
                                                ]);
                                            }
                                        }

                                    }

                                ],
                            ],
                        ],
                    ]); ?>


                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>
