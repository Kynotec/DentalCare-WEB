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

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'minDate' => new \yii\web\JsExpression('new Date()'),
            'beforeShowDay' => new \yii\web\JsExpression('
            function(date) {
                var day = date.getDay();
                return [(day != 0 && day != 6)];
            }
        '),
        ],
        'dateFormat' => 'yyyy-MM-dd', // Formato da data
        'options' => ['class' => 'form-control'], // Opções do input
    ]) ?>

    <?= $form->field($model, 'estado')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'profile_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(
            \common\models\Perfil::find()
                ->select('user.id, nome, telefone, morada, nif, codigopostal')
                ->leftJoin('auth_assignment', 'auth_assignment.user_id = profiles.user_id')
                ->leftJoin('user', 'user.id = profiles.user_id')
                ->where(['auth_assignment.item_name' => 'utente', 'user.status' => 10])
                ->asArray()
                ->all(),
            'id',
            'nome'
        ),
        ['prompt' => '- Nenhum -']
    )->label('Selecione um Utente:');
    ?>



    <?= $form->field($model, 'servico_id')->dropDownList(ArrayHelper::map(Servico::find()
        ->where(['ativo' => 10])
        ->all(), 'id', 'nome'), ['prompt' => '- Nenhum -']);
    ?>
    <div class="form-group">
        <?= Html::submitButton('Guardar e Continuar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
