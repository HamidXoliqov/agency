<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'name' => 'agency',
    'timeZone' => 'Asia/Tashkent',
    'language' => 'ru',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
                'denyCallback' => function($rule, $action) {
                    return Yii::$app->response->redirect(['/site/login']);
                },
            ],
        ],
        'structure' => [
            'class' => 'app\modules\structure\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
                'denyCallback' => function($rule, $action) {
                    return Yii::$app->response->redirect(['/site/login']);
                },
            ],
        ],
        'manuals' => [
            'class' => 'app\modules\manuals\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
                'denyCallback' => function($rule, $action) {
                    return Yii::$app->response->redirect(['/site/login']);
                },
            ],
        ],
        'project' => [
            'class' => 'app\modules\project\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
                'denyCallback' => function($rule, $action) {
                    return Yii::$app->response->redirect(['/site/login']);
                },
            ],
        ],
        'warehouse' => [
            'class' => 'app\modules\warehouse\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
                'denyCallback' => function($rule, $action) {
                    return Yii::$app->response->redirect(['/site/login']);
                },
            ],
        ],
        'subsidy' => [
            'class' => 'app\modules\subsidy\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
                'denyCallback' => function($rule, $action) {
                    return Yii::$app->response->redirect(['/site/login']);
                },
            ],
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            ]
    ],
    'components' => [
        'reCaptcha' => [
            'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
            'siteKeyV2' => '6Lfh6gkaAAAAAE1gvIduc66pfaVtMv-_9lHtFXI-',
            'secretV2' => '6Lfh6gkaAAAAAIKihw6bDQZzvC5mrsA-l6Xi5v8B',
            'siteKeyV3' => 'your siteKey v3',
            'secretV3' => 'your secret key v3',
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'auth' =>     [
                    'class' => 'app\components\esi\EsiAuthClient',
                    'clientId' => 'DDC4C58F72833CCC',
                    'clientSecret' => '762A935DEEEEE5FB8A7F55D2468DA0D5B4C598CB3A4FDF43B336C7F6CC2BB96A',
                ]
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app-msg' => 'app-msg.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'dd.MM.yyyy',
            'datetimeFormat' => 'd.m.Y H:i:s',
            'timeFormat' => 'H:i:s',
            'nullDisplay' => '',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'agency',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\admin\models\Users',
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
                [
                    'class' => 'yii\log\FileTarget',
                    'categories' => ['save'],
                    'logFile' =>'@runtime/logs/save.log',
                    'logVars' => []
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'exportInterval' => 1,
                    'categories' => ['yii\db\*'],
                    'logFile' =>'@runtime/logs/db.log',
                    'logVars' => []
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'as before Request' => [
        'class' => 'app\components\SetLanguage',
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;

function vdd($data)
{
    echo "<pre>";
    var_dump($data);
    die();
}

function prd($data)
{
    echo "<pre>";
    print_r($data);
    die();
}