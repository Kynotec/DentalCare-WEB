<?php

use common\models\Perfil;
use common\models\Servico;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Marcacao $model */
/** @var yii\widgets\ActiveForm $form */
?>


<div class="consulta-form">
    <br>



<div class="card">

    <div class="card-body">


        <p>
            <a href="./" class="btn-left"><i class="fas fa-arrow-left" data-toggle="tooltip" data-placement="left" title="Cancelar"></i></a>
        </p>
        <div class="row">
            <div class="col-md-12">


    <?= $form->field($model, 'servico_id')->hiddenInput()->label(false) ?>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Guardar e Selecionar Hora', ['class' => 'btn btn-success']) ?>
    </div>
    <br>
    <br>
    <br>
    <?php ActiveForm::end(); ?>


                <?php $form = ActiveForm::begin(['action' => ['create']]); ?>

                <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'data')->widget(\yii\jui\DatePicker::class, [
                    'dateFormat' => 'yyyy-MM-dd', // Formato da data
                    'options' => ['class' => 'form-control'], // Opções do input
                ]) ?>

                <?= $form->field($model, 'estado')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'profile_id')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'servico_id')->hiddenInput()->label(false) ?>

                <div class="form-group">
                    <?= Html::submitButton('Guardar e Selecionar Hora', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>

            <!--.col-md-12-->
        </div>

        <!--.row-->
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <!--.card-body-->

</div>
