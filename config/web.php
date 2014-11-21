<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'controllerMap' => [
                'security' => '@simpleClass\SecurityController',
//                'profile' => '@simpleClass\ProfileController',
            ],
            'enableConfirmation' => false,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu', // avaliable value 'left-menu', 'right-menu' and 'top-menu'
//            'layout' => 'right-menu', // avaliable value 'left-menu', 'right-menu' and 'top-menu'
//            'layout' => 'top-menu', // avaliable value 'left-menu', 'right-menu' and 'top-menu'
            'controllerMap' => [
                 'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'dektrium\user\models\User',
                    'idField' => 'id'
                ]
            ],
            'menus' => [
                'assignment' => [
                    'label' => 'Grand Access' // change label
                ],
//                'route' => null, // disable menu
                'route' => [
                    'label' => 'Route' // change label
                ]
            ],
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '1upyWl1e2z6H3sCnwgv2zqDNkRE5OVqg',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['admin','editor','client','agent','user'], // here define your roles
            //'authFile' => '/commands/data/rbac.php' //the default path for rbac.php | OLD CONFIGURATION
            'itemFile' => '/commands/data/data/items.php', //Default path to items.php | NEW CONFIGURATIONS
            'assignmentFile' => '/commands/data/assignments.php', //Default path to assignments.php | NEW CONFIGURATIONS
	    'ruleFile' => '/commands/data/rules.php', //Default path to rules.php | NEW CONFIGURATIONS
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
        ],
        'wtsecure' => [
            'class' =>  '@simpleClass\WtSecurity',
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
        'session' => [
            'class' => 'yii\web\DbSession',
            // 'db' => 'mydb',  // the application component ID of the DB connection. Defaults to 'db'.
            // 'sessionTable' => 'my_session', // session table name. Defaults to 'session'.
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '/views/user'
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
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
