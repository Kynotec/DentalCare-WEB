<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Faturas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="faturas-form">
    <!-- Main content -->
    <section class="content" >
        <div class="container-fluid" >
            <div class="row" >
                <div class="col-12" >

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3" style="background-color: #fffffc; color: #0a0e14">
                        <!-- title row -->
                        <div class="row" >
                            <div class="col-12">
                                <h4>
                                    <b>Fatura Nº</b> <br>
                                    <small class="float">Data:  </small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <address> <br>
                                    <strong><?=$empresa->designacaosocial?></strong><br>
                                    <?=$empresa->morada?><br>
                                    <?=$empresa->localidade. ', ' . $empresa->codigopostal?><br>
                                    Telefone: <?=$empresa->telefone?><br>
                                    Email: <?=$empresa->email?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <address><br>
                                    <strong>Cliente:</strong><br>
                                    <a href="<?= Yii::$app->urlManager->createUrl(['fatura/select-client']) ?>" class="btn btn-primary">Selecionar</a>
                                    <?php

                                    if($model->profile !== null && $model->profile_id->user !== null) {

                                        echo '<strong>Nome:</strong> ' . $model->profile->nome . '<br>';
                                        echo '<strong>Morada:</strong> ' . $model->user->profile->morada . '<br>';
                                        echo '<strong>Contacto:</strong> ' . $model->user->profile->contacto . '<br>';
                                        echo '<strong>Email:</strong> ' . $model->user->email . '<br>';

                                    } else {
                                        echo 'Perfil do utilizador não encontrado.';
                                    }

                                    var_dump($model);
                                    ?>
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
                                        <th>Referência</th>
                                        <th>Descrição</th>
                                        <th>QTD</th>
                                        <th>Valor Unitário</th>
                                        <th>Valor IVA</th>
                                        <th>Taxa IVA</th>
                                        <th>Total</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>

                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row flex-row-reverse">

                            <!-- /.col -->
                            <div class="col-2">

                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <tr>
                                            <th>Subtotal:</th>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <th>IVA:</th>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>0</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="col-sm-4 invoice-col">

                            Fatura Processada por : <b><?= Yii::$app->user->identity->username ?> </b>
                        </div>
                        <br><br>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

