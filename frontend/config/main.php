<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);



$config = [
    'id' => 'app-frontend',
    'name'=>'Sistem Informasi STIKES As-Syifa',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'cookieValidationKey' => 'stikesassyifa'
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity-frontend', 
                'httpOnly' => true,
                'domain'=>$params['cookies_domain']
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            // 'name' => 'advanced-frontend',
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
        'site/request-password-reset',
        // 'admin/*',
        // 'gii/*',
        // 'debug/*',
        // 'ajax/*'
    ]
];

return $config;