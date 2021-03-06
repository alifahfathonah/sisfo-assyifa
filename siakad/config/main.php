<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);



$config = [
    'id' => 'app-siakad',
    'name'=>'Sistem Informasi Akademik (SIAKAD)',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'siakad\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-siakad',
            'cookieValidationKey' => 'stikesassyifa'
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity-siakad', 
                'httpOnly' => true,
                'domain'=>$params['cookies_domain']
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            // 'name' => 'advanced-siakad',
            'cookieParams' => [
                'domain'=>$params['cookies_domain'],
                'httpOnly' => true,
            ],
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
        'site/login-by-token',
        // 'admin/*',
        // 'gii/*',
        // 'debug/*',
        // 'ajax/*'
    ]
];

return $config;