<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],

    'defaultRoute' => 'main/index',     // контроллер/метод - по умолчанию

    'components' => [

        'urlManager' => [
            'showScriptName' => false,          //
            'enablePrettyUrl' => true,          //
            'enableStrictParsing' => true,      //
            'rules' => [
                ['pattern' => '/', 'route' => 'main/index'],                                    // домашняя страница

                // ['pattern' => 'article/<post:\d+>', 'route' => 'article/view'],                 // получить ID из URL
              //  ['pattern' => 'article/<post:\d+>', 'route' => 'article/view2'],
['pattern' => 'article/<post:\d+>', 'route' => 'article/view2'],

                ['pattern' => '<controller>', 'route' => '<controller>/index'],                 // если 1 параметр в URL то это имя контроллера
                ['pattern' => '<controller>/<action>', 'route' => '<controller>/<action>'],     // стандартно: http://localhost/article/index: /article/index
            ]
        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'u1m1QVEUFn1vVqzjKsLXN9ACR8apBndd',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
