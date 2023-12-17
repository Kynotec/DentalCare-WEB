<?php
use common\models\Produto;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
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
                            <?php if ($model->ativo == Produto::STATUS_INACTIVE) {
                                echo Html::a("<span class='material-symbols-outlined' style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>toggle_off</span>", ['ativar', 'id' => $model->id],
                                    [
                                        'class' => 'btn  btn-success pb-0',
                                        'hidden' => !Yii::$app->user->can("deleteProdutos"),
                                        'data' => [
                                            'confirm' => 'Tem a certeza que pretende ativar este Produto?',
                                            'method' => 'post',
                                        ],
                                    ]);
                            } elseif ($model->ativo == Produto::STATUS_ACTIVE) {
                                echo Html::a("<span class='material-symbols-outlined'  style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>toggle_on</span>", ['desativar', 'id' => $model->id],

                                    [
                                        'class' => 'btn  btn-danger pb-0',
                                        'hidden' => !Yii::$app->user->can("deleteProdutos"),
                                        'data' => [
                                            'confirm' => 'Tem a certeza que pretende desativar este Produto?',
                                            'method' => 'post',
                                        ],
                                    ]);
                            }
                            ?>
                        </p>
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                [
                                    'label' => 'Imagem Produto',
                                    'attribute' => 'filename',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        if (!empty($model->imagens) && is_array($model->imagens)) {
                                            if (isset($model->imagens[0]['filename'])) {
                                                return Html::img('http://localhost/DentalCare-WEB/DentalCare/public' . '/images/products/' . $model->imagens[0]['filename'], ['style' => 'height: 150px; display: block; margin: 0 auto;']);
                                            }
                                        }

                                        return 'Available image';
                                    },
                                ],
                                'nome',
                                'descricao',
                                [
                                    'attribute' => 'precounitario',
                                    'value' => function ($model) {
                                        $precounitario = $model->precounitario . "€" ;
                                        return $precounitario;
                                    }
                                ],
                                'stock',
                                [
                                    'attribute' => 'iva_id',
                                    'label' => 'Iva',
                                    'value' => function ($model) {
                                        $iva = $model->iva->percentagem .'%';
                                        return $iva;
                                    }
                                ],
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
                                    'value' => function ($data) {
                                        return $data->getStatusLabel();
                                    }

                                ],
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



