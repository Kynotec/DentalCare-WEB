<?php

use common\models\LinhaFatura;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\SearchLinhaFatura $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Linha Faturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linha-fatura-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Linha Fatura', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'quantidade',
            'valorunitario',
            'valoriva',
            'valortotal',
            //'fatura_id',
            //'produto_id',
            //'servico_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, LinhaFatura $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
