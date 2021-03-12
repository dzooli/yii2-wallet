<?php
$hostinfo = require 'params.php';
return [
    'language' => 'en-US',
    'sourceLanguage' => 'en-US',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '-',
            'defaultTimeZone' => 'Europe/Budapest',
            'locale' => 'en-US',
            'thousandSeparator' => ' ',
            'decimalSeparator' => '.',
            // must enable php intl extension for \NumberFormatter
            'numberFormatterOptions' => [
                \NumberFormatter::MIN_FRACTION_DIGITS => 2,
                \NumberFormatter::MAX_FRACTION_DIGITS => 4,
            ]
        ],
        'cache' => [
            //            'class' => yii\caching\FileCache::class,
            //'class' => yii\caching\DbCache::class,
            //'cacheTable' => '{{%cache}}',
            'class' => \yii\redis\Cache::class,
            'redis' => 'redis',
            //'hostname' => 'redis',
            //'port' => 6379,
            //'database' => 0,
            //]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManagerFrontend' => [
            'class' => \yii\web\UrlManager::class,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'hostInfo' => $hostinfo['frontendHost'],
            'rules' => require __DIR__ . '/../../frontend/config/urls.php',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
                'giiant' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
                'cruds' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@common/messages',
                ],
            ],
        ],
        /*         
        'queue' => [
            'class' => \yii\queue\sync\Queue::class,
            'handle' => false, // whether tasks should be executed immediately
        ],
        */
        /*
        'queue' => [
            'class' => \yii\queue\db\Queue::class,
            'db' => 'db', // DB connection component or its config
            'tableName' => '{{%queue}}', // Table name
            'channel' => 'default', // Queue channel key
            'mutex' => \yii\mutex\MysqlMutex::class, // Mutex used to sync queries
            'as log' => \yii\queue\LogBehavior::class,
            'as qeuemanager' => \ignatenkovnikita\queuemanager\behaviors\QueueManagerBehavior::class
            // Other driver options
        ],
*/

        'queue' => [
            'class' => \yii\queue\redis\Queue::class,
            'as log' => \yii\queue\LogBehavior::class,
            'as queuemanager' => \ignatenkovnikita\queuemanager\behaviors\QueueManagerBehavior::class,
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'redis' => [
            'class' => yii\redis\Connection::class,
            'hostname' => 'redis',
            'database' => 0,
            'retries' => 2,
        ],
    ],
    'modules' => [
        'queuemanager' => [
            'class' => \ignatenkovnikita\queuemanager\QueueManager::class,
        ],
        'gridView' => [
            'class' => \kartik\grid\Module::class,
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => false,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin'],
            'modelMap' => [
                'User' => 'common\models\User',
            ],
        ],
    ],
];
