<?php
use common\models\Marcacao;
use common\models\Perfil;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Diagnostico $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="diagnostico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'data')->textInput(['value' => date('Y-m-d'), 'readonly' => true]) ?>

    <?= $form->field($model, 'hora')->textInput(['value' => date('H:i:s'), 'readonly' => true]) ?>

    <?= $form->field($model, 'profile_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(
            \common\models\Perfil::find()
                ->select('profiles.user_id, nome, telefone, morada, nif, codigopostal')
                ->leftJoin('auth_assignment', 'auth_assignment.user_id = profiles.user_id')
                ->leftJoin('user', 'user.id = profiles.user_id')
                ->where(['auth_assignment.item_name' => 'utente', 'user.status' => 10])
                ->asArray()
                ->all(),
            'user_id',
            'nome'
        ),
        ['prompt' => '- Nenhum -']
    )->label('Selecione um Utente:');
    ?>

    <?= $form->field($model, 'consulta_id')->dropDownList(
        ArrayHelper::map(
            Marcacao::find()->all(),
            'id',
            function ($consulta) {
                return $consulta->data . ' ' .  $consulta->hora . ' | ' . $consulta->profile->nome;
            }
        ),
        ['prompt' => '- Nenhum -']
    )->label('Selecione uma Consulta:'); ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
