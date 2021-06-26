<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'queue'],
    //'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
        ],
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            //'migrationPath' => null,
            'migrationNamespaces' => [
                'console\migrations',
                'yii\queue\db\migrations',
            ],
        ],
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            //            'dsn' => 'pgsql:host=db;dbname=yii2advanced',
            'dsn' => 'mysql:host=db;dbname=yii2advanced',
            'username' => 'username',
            'password' => 'password',
            'charset' => 'utf8',
        ],

        'queue' => [
            'class' => \yii\queue\file\Queue::class,
            'as log' => \yii\queue\LogBehavior::class,
            'as queuemanager' => \ignatenkovnikita\queuemanager\behaviors\QueueManagerBehavior::class,
        ],
    ],
    'params' => $params,
];
