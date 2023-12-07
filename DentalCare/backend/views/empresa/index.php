<?php

use common\models\Empresa;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\SearchEmpresa $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var Empresa $empresa */


$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container mt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="text-center">
                    <?= Html::img('@web/img/dentalcarelogo.png', ['alt'=>'some', 'class'=>'rounded','width'=>'200']);?>
                </div>
                <div class="text-center mt-3">
                    <h3 class="mt-2 mb-0"><?=$empresa->designacaosocial?></h3>
                    <hr>
                    <div class="card-block">
                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Informação</strong></h6>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <span class='material-symbols-outlined'>email</span>
                                <p class="m-b-10 f-w-600">Email</p>
                                <h6 class="text-muted f-w-400"><?=$empresa->email?></h6>
                            </div>
                            <div class="col-sm-6">
                                <span class='material-symbols-outlined'>phone</span>
                                <p class="m-b-10 f-w-600">Telefone</p>
                                <h6 class="text-muted f-w-400"><?=$empresa->telefone?></h6>
                            </div>
                            <div class="col-sm-6">
                                <span class='material-symbols-outlined'>badge</span>
                                <p class="m-b-10 f-w-600">Nif</p>
                                <h6 class="text-muted f-w-400"><?=$empresa->nif?></h6>
                            </div>
                            <div class="col-sm-6">
                                <span class='material-symbols-outlined'>finance_chip</span>
                                <p class="m-b-10 f-w-600">Capital Social</p>
                                <h6 class="text-muted f-w-400"><?=$empresa->capitalsocial .' €'?></h6>
                            </div>
                            <div class="col-sm-12">
                                <span class='material-symbols-outlined'>location_on</span>
                                <p class="m-b-10 f-w-600">Morada</p>
                                <h6 class="text-muted f-w-400"><?=$empresa->morada?>, <?=$empresa->codigopostal?>, <?=$empresa->localidade?></h6>
                            </div>

                        </div>
                        <br>
                        <a href="<?=Url::to(['empresa/update']) ?>" class="btn btn-secondary">Editar Dados</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
