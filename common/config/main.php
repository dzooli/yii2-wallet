<?php

$hostinfo = require 'params.php';
return [
    'language' => 'en-US',
    'sourceLanguage' => 'en-US',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=db;dbname=yii2advanced',
            'username' => 'username',
            'password' => 'password',
            'charset' => 'utf8',
        ],
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
            //'class' => yii\caching\FileCache::class,
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
                    'except' => ['wallet*']
                ],
                [
                    'class' => 'yii\log\DbTarget',
                    'categories' => ['wallet*', 'application*',],
                    'except' => ['application*',],
                    'logTable' => '{{%log_info}}',
                    'levels' => ['info', 'warning', 'error'],
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
        'redis' => [
            'class' => yii\redis\Connection::class,
            'hostname' => 'redis',
            'database' => 0,
            'retries' => 2,
        ],
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
        /*
          'queue' => [
          'class' => \yii\queue\file\Queue::class,
          'as log' => \yii\queue\LogBehavior::class,
          'as queuemanager' => \ignatenkovnikita\queuemanager\behaviors\QueueManagerBehavior::class,
          ],
         */
        /*
          'queue' => [
          'class' => \yii\queue\redis\Queue::class,
          'as log' => \yii\queue\LogBehavior::class,
          'as queuemanager' => \ignatenkovnikita\queuemanager\behaviors\QueueManagerBehavior::class,
          ],
         */
        /*
          'queue' => [
          'class' => \yii\queue\sync\Queue::class,
          'handle' => false, // whether tasks should be executed immediately
          ],

         */
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'modules' => [
        'queuemanager' => [
            'class' => \ignatenkovnikita\queuemanager\QueueManager::class,
        ],
        'gridview' => [
            'class' => \kartik\grid\Module::class,
            'bsVersion' => '4.x',
        ],
        'datecontrol' => [
            'class' => \kartik\datecontrol\Module::class,
            'displaySettings' => [
                'datetime' => 'yy-MM-dd HH:mm',
            ],
            'saveSettings' => [
                'datetime' => 'yyyy-MM-dd HH:mm:ss',
            ],
            'autoWidget' => true,
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => false,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin'],
            'modelMap' => [
                'User' => 'common\models\User',
                'Account' => 'common\models\Account',
            ],
            'controllerMap' => [
                'security' => [
                    'class' => \dektrium\user\controllers\SecurityController::class,
                    'on ' . \dektrium\user\controllers\SecurityController::EVENT_BEFORE_LOGIN => function ($e) {
                        $redirTo = Yii::$app->request->get('redirectTo') ?? '';
                        if ($redirTo !== '') {
                            Yii::$app->session->set('redirectTo', $redirTo);
                        }
                    },
                    'on ' . \dektrium\user\controllers\SecurityController::EVENT_AFTER_LOGIN => function ($e) {
                        if (!Yii::$app->user->identity->hasDefaultAccounts()) {
                            try {
                                Yii::$app->user->identity->createDefaultAccounts();
                            } catch (Exception $ex) {
                                Yii::$app->user->logout();
                                Yii::$app->session->remove('redirectTo');
                                Yii::$app->session->setFlash('error', 'Fatal error! Cannot create default accounts: ' . $ex->getMessage());
                                Yii::$app->response->redirect(['site/index'])->send();
                            }
                        }

                        if (Yii::$app->session->has('redirectTo')) {
                            $redirTo = Yii::$app->session->get('redirectTo') ?? '';
                            Yii::$app->session->remove('redirectTo');
                            Yii::$app->response->redirect([$redirTo])->send();
                        }
                    }
                ],
            ],
        ],
    ],
];
