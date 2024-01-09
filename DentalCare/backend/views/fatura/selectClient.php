<?php

use yii\bootstrap5\Html;
use yii\grid\GridView;


$profilesArray = [];
foreach ($profiles as $perfil) {
    $profilesArray[] = $perfil->toArray();
}

$mergedData = [];
foreach ($users as $user) {
    $userId = $user['id'];
    $profile = array_filter($profilesArray, function ($profile) use ($userId) {
        return $profile['user_id'] == $userId;
    });

    if (!empty($profile)) {
        $mergedData[] = array_merge($user, reset($profile));
    } else {

        $mergedData[] = $user;
    }
}

?>
<div class="select-client">

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $mergedData]),
        'columns' => [
            'username',
            'email',
            'nif',
            [
                'label' => 'Morada Completa',
                'value' => function ($model) {
                    return isset($model['morada']) ? $model['morada'] . ', ' : '';
                },
            ],
            [
                'label' => 'Código Postal',
                'value' => function ($model) {
                    return isset($model['codigopostal']) ? $model['codigopostal'] : '';
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{select}',
                'buttons' => [

                    'select' => function ($url, $model, $key) {
                        return Html::a('Selecionar', ['fatura/create', 'profile_id' => $model['id']], ['class' => 'btn btn-primary']);
                    },

                ],
            ],
        ],
    ]); ?>

</div>
