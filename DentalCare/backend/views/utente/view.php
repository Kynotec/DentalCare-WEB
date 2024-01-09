<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model common\models\Perfil  */
/* @var $modelUser common\models\User  */
/* @var $searchModel backend\models\SearchUtente */


$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Utentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a("<span class='material-symbols-outlined' style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>edit</span>", ['update', 'id' => $model->user_id], [
                            'class' => 'btn ',
                            'hidden' =>  !Yii::$app->user->can("funcionario")]) ?>
                        <?php if ($model->user->status == User::STATUS_INACTIVE){
                            echo  Html::a("<span class='material-symbols-outlined' style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>toggle_off</span>", ['ativar', 'user_id' => $model->user_id],
                                [
                                'class' => 'btn  btn-success pb-0',
                                'hidden' =>  !Yii::$app->user->can("disableUtilizador"),
                                'data' => [
                                    'confirm' => 'Tem a certeza que pretende ativar este Utente?',
                                    'method' => 'post',
                                ],
                            ]);
                        } elseif($model->user->status == User::STATUS_ACTIVE)
                        {
                            echo Html::a("<span class='material-symbols-outlined'  style='font-variation-settings: \"FILL\" 1, \"wght\" 400, \"GRAD\" 200, \"opsz\" 20; padding-bottom: 0;'>toggle_on</span>", ['desativar', 'user_id' => $model->user_id],

                            [
                                'class' => 'btn  btn-danger pb-0',
                                'hidden' =>  !Yii::$app->user->can("disableUtilizador"),
                                'data' => [
                                    'confirm' => 'Tem a certeza que pretende desativar este Utente?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                        ?>
                    </p>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [ 'label' => 'Username',
                                'value' => function ($data) {
                                    return $data->user->username;
                                }
                            ],
                            [ 'label' => 'E-mail',
                                'value' => function ($data) {
                                    return $data->user->email;
                                }
                            ],
                            'nome',
                            'telefone',
                            'nif',
                            'morada',
                            [ 'label' => 'Código-Postal',
                                'value' => function ($data) {
                                    return $data->codigopostal;
                                }
                            ],
                            [ 'label' => 'Status',
                                'format' =>'html',
                                'value' => function ($data) {
                                    return $data->user->getStatusLabel();
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