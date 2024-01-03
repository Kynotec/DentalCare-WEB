<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Perfil */
/* @var $modelUser common\models\User */
/* @var $searchModel frontend\models\SearchUtente */

AppAsset::register($this);
\backend\assets\AppAsset::register($this);
$this->title = 'Dental Care';
?>

<div class="container mt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <a href="../" class="btn-left"><i class="fas fa-arrow-left" data-toggle="tooltip" data-placement="left"
                                             title="Cancelar"></i></a>
                <div class="text-center">

                    <?= Html::img('@web/img/icon-people.png', ['alt' => 'some', 'class' => 'rounded', 'width' => '200']); ?>
                    <h3 class="text-muted f-w-400" style="margin-top: 20px;"><?= $model->nome ?></h3>
                </div>
                <br>
                <div class="col-md-12 text-center">

                    <p>
                        <?php
                        echo Html::a('Atualizar Informação', ['update', 'user_id' => $model->user_id], ['class' => 'btn btn-primary'])
                        ?>
                    </p>
                    <br>

                    <div class="card-block text-center">
                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Informação</strong></h6>
                        <br>
                        <div class="row">

                            <div class="col-sm-6">
                                <span class='material-symbols-outlined'>person</span>
                                <p class="m-b-10 f-w-600">Username</p>
                                <h6 class="text-muted f-w-400"><?= $model->user->username ?></h6>
                            </div>
                            <div class="col-sm-6">
                                <span class='material-symbols-outlined'>email</span>
                                <p class="m-b-10 f-w-600">Email</p>
                                <h6 class="text-muted f-w-400"><?= $model->user->email ?></h6>
                                <br>
                            </div>
                            <div class="col-sm-6">
                                <span class='material-symbols-outlined'>badge</span>
                                <p class="m-b-10 f-w-600">Nome</p>
                                <h6 class="text-muted f-w-400"><?= $model->nome ?></h6>
                            </div>
                            <div class="col-sm-6">
                                <span class='material-symbols-outlined'>phone</span>
                                <p class="m-b-10 f-w-600">Telefone</p>
                                <h6 class="text-muted f-w-400"><?= $model->telefone ?></h6>
                                <br>
                            </div>
                            <div class="col-sm-6">
                                <span class='material-symbols-outlined'>badge</span>
                                <p class="m-b-10 f-w-600">Nif</p>
                                <h6 class="text-muted f-w-400"><?= $model->nif ?></h6>
                            </div>

                            <div class="col-sm-6">
                                <span class='material-symbols-outlined'>location_on</span>
                                <p class="m-b-10 f-w-600">Morada</p>
                                <h6 class="text-muted f-w-400"><?= $model->morada ?>, <?= $model->codigopostal ?></h6>
                            </div>

                        </div>
                        <br>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>



