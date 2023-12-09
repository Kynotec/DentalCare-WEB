<?php

use common\models\Produto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\SearchProduto $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Produtos';
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
                                Html::a('Criar Produto', ['produto/create'], ['class' => 'btn btn-success',]) ?>
                            </div>
                        </div>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            // 'filterModel' => $searchModel,
                            'columns' => [

                                //'id',
                                'filename',
                                'nome',
                                'descricao',
                                'precounitario',
                                //'stock',
                                //'iva_id',
                                [
                                    'attribute' => 'categoria_id',
                                    'label' => 'Categoria',
                                    'value' => function ($model) {
                                        $categoria = $model->categoria->descricao;
                                        return $categoria;
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
                                            if (Yii::$app->user->can('readProdutos')) {
                                                return Html::a('<i class="fas fa-eye"></i>', ['produto/view', 'id' => $model->id], ['class' => 'btn btn-primary']);
                                            }
                                        },
                                        'update' => function($url, $model)
                                        {
                                            if (Yii::$app->user->can('updateProdutos')) {
                                                return Html::a('<i class="fas fa-pencil-alt text-white"></i>', ['produto/update', 'id' => $model->id], ['class' => 'btn btn-warning mr-1']);
                                            }
                                        },
                                        'delete' => function($url, $model)
                                        {
                                            if (Yii::$app->user->can('deleteProdutos')) {

                                                if($model->ativo == Produto::STATUS_ACTIVE)
                                                {
                                                    return Html::a("<span class='material-symbols-outlined' style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>toggle_off</span>", ['desativar', 'id' => $model->id], [
                                                        'class' => 'btn  btn-danger pb-0',
                                                        'data'=> [
                                                            'confirm' => 'Tem a certeza que quer desativar este Produto?'
                                                        ]
                                                    ]);

                                                }
                                                else
                                                {
                                                    return Html::a("<span class='material-symbols-outlined'  style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>toggle_on</span>", ['ativar', 'id' => $model->id], [
                                                        'class' => 'btn  btn-success pb-0',
                                                        'data'=> [
                                                            'confirm' => 'Tem a certeza que quer ativar este Produto?'
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
