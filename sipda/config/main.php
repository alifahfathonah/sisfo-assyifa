<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);


$config = [
    'id' => 'app-sipda',
    'name'=>'SIPDA',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'sipda\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-sipda',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-sipda', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-sipda',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];

$config['as access'] =  [
    'class' => 'mdm\admin\components\AccessControl',
    'allowActions' => [
        // '*',
        'site/login',
        // 'site/request-password-reset',
        // 'admin/*',
        // 'gii/*',
        // 'debug/*',
        // 'ajax/*'
    ]
];

return $config;
