<?php

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Faturas $model */
/** @var common\models\Empresa $empresa */
/** @var common\models\LinhaFatura $linhafatura */
/** @var common\models\Produto $produto */
/** @var common\models\Servico $servico */

$this->title = 'Fatura' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'As Minhas Faturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
AppAsset::register($this);
?>

<div class="faturas-form">
    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- Main content -->
                <div class="invoice p-3 mb-3" style="background-color: #fffffc; color: #0a0e14">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                <?php
                                echo '<span class="badge bg-success">' . $model->estado . '</span>';
                                ?>
                            </h5>
                            <h4>
                                <b>Fatura Nº</b><?= $model->id ?> <br>
                                <small class="float">Data: <?= $model->data ?> </small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <address><br>
                                <strong><?= $empresa->designacaosocial ?></strong><br>
                                <?= $empresa->morada ?><br>
                                <?= $empresa->localidade . ', ' . $empresa->codigopostal ?><br>
                                Telefone: <?= $empresa->telefone ?><br>
                                Email: <?= $empresa->email ?>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <address><br>
                                <strong>Cliente:</strong><br>
                                <?= $model->profile->nome ?><br>
                                <?= $model->profile->morada . ', ' . $model->profile->codigopostal ?><br>
                                Telefone: <?= $model->profile->telefone ?><br>
                                Email: <?= $model->profile->user->email ?>
                            </address>
                        </div>

                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Referencia</th>
                                    <th>Nome</th>
                                    <th>QTD</th>
                                    <th>Valor Unitário</th>
                                    <th>Valor IVA</th>
                                    <th>Taxa IVA</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($model->linhaFaturas as $linhaFatura): ?>
                                <tr>
                                    <!-- Produtos -->
                                    <?php if ($linhaFatura->produto): ?>
                                        <td><?= $linhaFatura->produto->id ?></td>
                                        <td><?= $linhaFatura->produto->nome ?></td>
                                        <td><?= $linhaFatura->quantidade ?></td>
                                        <td><?= $linhaFatura->valorunitario . ' €' ?></td>
                                        <td><?= $linhaFatura->valoriva . ' €'?></td>
                                        <td><?= $linhaFatura->produto->iva->percentagem . '%' ?></td>
                                        <td><?= $linhaFatura->valortotal . ' €'?></td>

                                        <!-- Serviços -->
                                    <?php elseif ($linhaFatura->servico): ?>
                                        <td><?= $linhaFatura->servico->id ?></td>
                                        <td><?= $linhaFatura->servico->nome ?></td>
                                        <td><?= $linhaFatura->quantidade ?></td>
                                        <td><?= $linhaFatura->valorunitario . ' €' ?></td>
                                        <td><?= $linhaFatura->valoriva . ' €'?></td>
                                        <td><?= $linhaFatura->servico->iva->percentagem . '%' ?></td>
                                        <td><?= $linhaFatura->valortotal . ' €'?></td>

                                    <?php endif; ?>

                                    <?php endforeach; ?>

                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.row -->


                    <div class="row flex-row-reverse">

                        <!-- /.col -->
                        <div class="col-2">

                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Subtotal:</th>
                                        <td><?= $model->subtotal . ' €' ?></td>
                                    </tr>
                                    <tr>
                                        <th>IVA:</th>
                                        <td><?= $model->ivatotal . ' €' ?></td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td><?= $model->valortotal . ' €' ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->

                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>