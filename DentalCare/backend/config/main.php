<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'api' => [
            'class' => 'backend\modules\api\ModuleAPI',
        ],
    ],
    'components' => [

        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
            'csrfParam' => '_csrf-backend',
        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        //////////////////////////////////////CARRINHO//////////////////////////////////////////////////////////
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/carrinho',
                    'pluralize' =>false,

                    'extraPatterns' => [
                        'GET {user_id}' => 'datacarrinho', // 'datacarrinho' é 'actionDatacarrinho'
                        'GET checkoutcarrinho/{user_id}' =>'checkoutcarrinho',
                        'PUT adicionar/{produto_id}/user/{user_id}' =>'adicionar',
                        'GET buscarcarrinho/user/{user_id}' =>'buscarcarrinho',
                        'DELETE removerlinhacarrinho/{carrinhoid}' => 'removerlinhacarrinho',
                    ],
                    'tokens' => [
                        '{user_id}' => '<user_id:\\d+>',
                        '{produto_id}' => '<produto_id:\\d+>',
                        '{carrinhoid}' => '<carrinhoid:\\d+>',
                    ],
                ],
                //////////////////////////////////////CONSULTA//////////////////////////////////////////////////////////
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/consulta',
                    'pluralize' =>false,

                    'extraPatterns' => [
                        'GET {data}/count' => 'count', // 'count' é 'actionCount'
                        'DELETE {consultaid}' => 'delporid', // 'delporid' é 'actionDelporid'
                        'PUT alterardata/{profileid}' => 'alterardata', // 'alterardata' é 'actionAlterardata'

                    ],
                    'tokens' => [
                        '{profileid}' => '<profileid:\\d+>',
                        '{data}' => '<data:[\\w-]+>',
                        '{consultaid}' => '<consultaid:\\w+>', //[a-zA-Z0-9_] 1 ou + vezes (char)
                    ],
                ],
                //////////////////////////////////////DIAGNOSTICO//////////////////////////////////////////////////////////
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/diagnostico',
                    'pluralize' =>false,

                    'extraPatterns' => [
                        'GET datadiagnostico/{profile_id}' => 'datadiagnostico', // 'datadiagnostico' é 'actionDatadiagnostico'
                        'GET consulta/{profile_id}' => 'consultautente', // 'consultautente' é 'actionConsultautente'

                    ],
                    'tokens' => [
                        '{profile_id}' => '<profile_id:\\d+>',
                    ],
                ],
                //////////////////////////////////////PRODUTO//////////////////////////////////////////////////////////
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/produto',
                    'pluralize' =>false,

                    'extraPatterns' => [
                        'PUT alterarpreco/{nome}' => 'alterarpreco', // 'alterarpreco' é 'actionAlterarpreco'
                        'GET {id}' => 'produtoid', // 'produtoid' é 'actionProdutoid'
                        'GET produtosimagem' => 'produtosimagem', // 'produtoimagens' é 'actionProdutoimagens'
                    ],
                    'tokens' => [
                        '{nome}' => '<nome:\\w+>',
                        '{id}' => '<id:\d+>',
                    ],
                ],
                //////////////////////////////////////SERVICO//////////////////////////////////////////////////////////
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/servico',
                    'pluralize' =>false,

                    'extraPatterns' => [
                        'GET {descricao}' => 'servicospeladescricao', // 'servicospeladescricao' é 'actionServicospeladescricao'
                    ],
                    'tokens' => [
                        '{descricao}' => '<descricao:\\w+>',
                    ],
                ],
                //////////////////////////////////////USER//////////////////////////////////////////////////////////
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/user',
                    'pluralize' =>false,

                    'extraPatterns' => [
                        'GET {nome}' => 'utentespelonome', // 'utentespelonome' é 'actionUtentespelonome'

                    ],
                    'tokens' => [
                        '{nome}' => '<nome:\\w+>',
                    ],
                ],
                //////////////////////////////////////FATURA//////////////////////////////////////////////////////////
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/fatura',
                    'pluralize' =>false,

                    'extraPatterns' => [
                        'PUT estado/{profile_id}' => 'alterarestado', // 'alterarestado' é 'actionAlterarestado'

                    ],
                    'tokens' => [
                        '{profile_id}' => '<profile_id:\\w+>',
                    ],
                ],
                //////////////////////////////////////LINHAFATURA//////////////////////////////////////////////////////////
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/linhafatura',
                    'pluralize' =>false,

                    'extraPatterns' => [
                        'GET linha/{fatura_id}' => 'linhafaturadados', // 'linhafatura' é 'actionLinhafatura'

                    ],
                    'tokens' => [
                        '{fatura_id}' => '<fatura_id:\\d+>',
                    ],
                ],
                //////////////////////////////////////IVA//////////////////////////////////////////////////////////
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/iva',
                    'pluralize' =>false,

                    'extraPatterns' => [
                        'PUT emvigor/{id}' => 'alterarestadoiva', // 'alterarestadoiva' é 'actionAlterarestadoiva'

                    ],
                    'tokens' => [
                        '{id}' => '<id:\\w+>',
                    ],
                ],
            ],
        ],

    ],
    'params' => $params,
];
