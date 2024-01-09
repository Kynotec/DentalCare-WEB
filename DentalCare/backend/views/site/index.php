<?php

use common\models\Produto;
use common\models\Servico;
use common\models\User;

$this->title = 'Dashboard';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">


    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Utilizadores',
                'number' => User::find()->count(),
                'icon' => 'fas fa-user',
                'theme' => 'primary'
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Produtos Disponiveis',
                'number' => Produto::find()->count(),
                 'theme' => 'success',
                'icon' => 'fas fa-box',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Serviços',
                'number' => Servico::find()->count(),
                'theme' => 'gradient-warning',
                'icon' => 'fas fa-tag',
            ]) ?>
        </div>
    </div>
</div>




