<?php

use common\models\Servico;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Servicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servico-index">

    <section id="servicos" class="servicos servicos">


        <div class="section-title">
            <h2>Serviços</h2>
            <p>A Dental Care tem um vasto portefólio de serviços disponiveis na clínica dentária. Esses Serviços
                contribuem de forma positiva na saúde dentária dos nossos pacientes.</p>
            <p><b>Alguns exemplos dos nossos serviços disponiveis da nossa clínica.</b></p>
        </div>
        <!-- Section-->
        <div class="container page-wrapper">
            <div class="page-inner">
                <div class="row">
                    <?php echo \yii\widgets\ListView::widget([
                        'layout' => '{summary}<div class="row">{items}</div>{pager}',
                        'dataProvider' => $dataProvider,
                        'itemView' => '_item_servico',
                        'itemOptions' => [
                            'class' => 'col-lg-3 col-md-6 mb-4 item-produto'
                        ],
                        'pager' => [
                            'class' => \yii\bootstrap4\LinkPager::class
                        ]
                    ]) ?>
                </div>

            </div>
        </div>

    </section>
</div>

