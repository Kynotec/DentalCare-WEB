<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use frontend\assets\AppAsset;

/** @var yii\web\View $this */
/** @var common\models\Perfil $model */
$this->title = 'Atualizar Utente:  ' . $model->user->username;

AppAsset::register($this);
\backend\assets\AppAsset::register($this);
$this->title = 'Dental Care';
?>
<div class="container mt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <a href="../" class="btn-left"><i class="fas fa-arrow-left" data-toggle="tooltip" data-placement="left" title="Cancelar"></i></a>
                <div class="text-center">
                    <?= Html::img('@web/img/icon-people.png', ['alt' => 'some', 'class' => 'rounded', 'width' => '200']); ?>
                    <h3 class="text-muted f-w-400" style="margin-top: 20px;"><?= $model->nome ?></h3>
                </div>
                <br>
                <div class="col-md-12 text-center">

                    <?php $form = ActiveForm::begin(['action' => ['update', 'user_id' => $model->user_id], 'method' => 'post']); ?>
                    <div class="card-block text-center">
                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600"><strong>Informação</strong></h6>
                        <br>
                        <div class="row">

                            <div class="col-sm-6">
                                <span class='material-symbols-outlined'>badge</span>
                                <h6 class="text-muted f-w-400"> <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?></h6>
                            </div>
                            <div class="col-sm-6">
                                <span class='material-symbols-outlined'>phone</span>
                                <h6 class="text-muted f-w-400"><?= $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?></h6>
                                <br>
                            </div>
                            <div class="col-sm-6">
                                <span class='material-symbols-outlined'>badge</span>
                                <h6 class="text-muted f-w-400"><?= $form->field($model, 'nif')->textInput(['maxlength' => true]) ?></h6>
                            </div>
                            <div class="col-sm-6">
                                <span class='material-symbols-outlined'>location_on</span>
                                <h6 class="text-muted f-w-400"><?= $form->field($model, 'codigopostal')->textInput(['maxlength' => true]) ?>

                            </div>
                            <div class="col-sm-12">
                                <span class='material-symbols-outlined'>location_on</span>
                                <h6 class="text-muted f-w-400"><?= $form->field($model, 'morada')->textInput(['maxlength' => true]) ?></h6>

                            </div>
                            </div>

                    <div class="form-group">
                        <?= Html::submitButton('Salvar Alterações', ['class' => 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>


