<?php

use common\models\Perfil;
use common\models\Servico;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Marcacao $model */
/** @var yii\widgets\ActiveForm $form */

$model->hoursOptions = $model->getHoursOptions();
?>

<div class="consulta-form">

    <?php $form = ActiveForm::begin(['action' => ['create']]); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd', // Formato da data
        'options' => ['class' => 'form-control'], // Opções do input
    ]) ?>

    <?= $form->field($model, 'estado')->dropDownList(
        [
            'Realizado' => 'Realizado',
            'Por Realizar' => 'Por Realizar',
            'Cancelado' => 'Cancelado',
        ],
        ['prompt' => '- Nenhum -']
    )->label('Selecione um Estado:'); ?>


    <?= $form->field($model, 'profile_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(
            \common\models\Perfil::find()
                ->select('profiles.user_id, nome, telefone, morada, nif, codigopostal')
                ->leftJoin('auth_assignment', 'auth_assignment.user_id = profiles.user_id')
                ->where(['auth_assignment.item_name' => 'utente'])
                ->asArray()
                ->all(),
            'user_id',
            'nome'
        ),
        ['prompt' => '- Nenhum -']
    )->label('Selecione um Utente:');
    ?>

    <?= $form->field($model, 'servico_id')->dropDownList(ArrayHelper::map(Servico::find()->all(), 'id', 'descricao'), ['prompt' => '- Nenhum -']); ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar e Continuar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
