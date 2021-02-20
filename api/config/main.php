<?php

$db = require(__DIR__ . '/../../config/db.php');
$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'RESTFull',
    'basePath' => dirname(__DIR__) . '/..',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => '@app/runtime/logs/api.log',
                ],
            ],
        ],
        'urlManager' => [
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v1/bank'],
                    'extraPatterns' => [

                        'POST test' => 'test',
                        'GET test' => 'test',
                        'OPTIONS test' => 'test',
                    ],
                ],
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'db' => $db,
    ],
    'modules' => [
        'v1' => [
            'class' => 'app\api\modules\v1\Module'
        ],
    ],
    'params' => $params,
];

return $config;