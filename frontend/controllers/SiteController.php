<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\TransactionSearch;
use yii\filters\AccessControl;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'contact', 'about',],
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['index',],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['contact', 'about',],
                        'roles' => ['?']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index',],
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    return $this->redirect(['user/login', 'redirectTo' => $action->controller->id . '/index']);
                }
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $transactionSearchModel = new TransactionSearch;
        $transactionDataProvider = $transactionSearchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
                    'trSearchModel' => $transactionSearchModel,
                    'trDataProvider' => $transactionDataProvider
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash(
                    'success',
                    'Thank you for contacting us. We will respond to you as soon as possible.'
                );
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
