<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dental Care</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block"><?= Yii::$app->user->identity->username ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [

                    /** Marcações **/
                    [
                        'label' => 'Marcações',
                        'icon' => 'calendar',
                        'visible' => Yii::$app->user->can("createConsulta"),
                        'items' => [
                            ['label' => 'Consultar Marcações', 'icon' => 'eye', 'url' => ['/marcacoes'], ],
                            ['label' => 'Criar Marcações', 'icon' => 'plus', 'url' => ['../web/user/create?userType=utente'],
                            ],
                        ],
                    ],

                    /** Diagnósticos **/
                    [
                        'label' => 'Diagnósticos',
                        'icon' => 'notes-medical',
                        'visible' => Yii::$app->user->can("addEstadoClinico"),
                        'items' => [
                            ['label' => 'Consultar Diagnósticos', 'icon' => 'eye', 'url' => [''], ],
                            ['label' => 'Criar Diagnósticos', 'icon' => 'plus', 'url' => [''],
                            ],
                        ],
                    ],


                    /** Utente **/
                    [
                        'label' => 'Utentes',
                        'icon' => 'user',
                        'visible' => Yii::$app->user->can("createUtilizador"),
                        'items' => [
                            ['label' => 'Consultar Utentes', 'icon' => 'eye', 'url' => ['/utente'], ],
                            ['label' => 'Criar Utentes', 'icon' => 'plus', 'url' => ['../web/user/create?userType=utente'],
                            ],
                        ],
                    ],

                    /** Administradores **/
                    [
                        'label' => 'Administradores',
                        'icon' => 'user',
                        'visible' => Yii::$app->user->can("createAdministrador"),
                        'items' => [
                            ['label' => 'Consultar Administradores', 'icon' => 'eye', 'url' => ['/administrador']],
                            ['label' => 'Criar Administradores', 'icon' => 'plus', 'url' => ['../web/user/create?userType=administrador']],
                        ],
                    ],

                    /** Funcionarios **/
                    [
                        'label' => 'Funcionarios',
                        'icon' => 'user',
                        'visible' => Yii::$app->user->can("createFuncionario"),
                        'items' => [
                            ['label' => 'Consultar Funcionarios', 'icon' => 'eye', 'url' => ['/funcionario']],
                            ['label' => 'Criar Funcionarios', 'icon' => 'plus', 'url' => ['../user/create?userType=funcionario']],
                        ],
                    ],

                    /** Médicos **/
                    [
                        'label' => 'Médicos',
                        'icon' => 'user',
                        'visible' => Yii::$app->user->can("createMedico"),
                        'items' => [
                            ['label' => 'Consultar Médicos', 'icon' => 'eye', 'url' => ['/medico']],
                            ['label' => 'Criar Médicos', 'icon' => 'plus', 'url' => ['../web/user/create?userType=medico']],
                        ],
                    ],

                    /** Produtos **/
                    [
                        'label' => 'Produtos',
                        'icon' => 'boxes',
                        'visible' => Yii::$app->user->can("createProdutos"),
                        'items' => [
                            ['label' => 'Consultar Produtos', 'icon' => 'eye', 'url' => ['']],
                            ['label' => 'Criar Produtos', 'icon' => 'plus', 'url' => ['']],
                        ],
                    ],

                    /** Serviços **/
                    [
                        'label' => 'Serviços',
                        'icon' => 'dolly',
                        'visible' => Yii::$app->user->can("createServicos"),
                        'items' => [
                            ['label' => 'Consultar Serviços', 'icon' => 'eye', 'url' => ['']],
                            ['label' => 'Criar Serviços', 'icon' => 'plus', 'url' => ['']],
                        ],
                    ],

                    /** Ivas **/
                    [
                        'label' => 'Ivas',
                        'icon' => 'tag',
                        'visible' => Yii::$app->user->can("createIva"),
                        'items' => [
                            ['label' => 'Consultar Produtos', 'icon' => 'eye', 'url' => ['']],
                            ['label' => 'Criar Produtos', 'icon' => 'plus', 'url' => ['']],
                        ],
                    ],

                    /** Faturas **/
                    [
                        'label' => 'Faturas',
                        'icon' => 'copy',
                        'visible' => Yii::$app->user->can("createFaturas"),
                        'items' => [
                            ['label' => 'Consultar Faturas', 'icon' => 'eye', 'url' => ['']],
                            ['label' => 'Criar Fatura', 'icon' => 'plus', 'url' => ['']],
                        ],
                    ],


                    /** Empresa **/
                    [
                        'label' => 'Empresa',
                        'icon' => 'building',
                        'visible' => Yii::$app->user->can("addEmpresa"),
                        'items' => [
                            ['label' => 'Consultar Empresa', 'icon' => 'eye', 'url' => ['']],
                            ['label' => 'Criar Empresa', 'icon' => 'plus', 'url' => ['']],
                        ],
                    ],








                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>