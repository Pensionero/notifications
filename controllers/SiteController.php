<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
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
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionDiscussions()
    {
        return $this->render('discussions');
    }

    public function actionView()
    {
        return $this->render('view');
    }
/*
    public function actionAddAdmin() {
        $model = User::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'admin';
            $user->email = 'admin@mail.ru';
            $user->setPassword('admin');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }
        }
    }
    
    public function actionVa() {
        $model = User::find()->where(['username' => 'вася'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'вася';
            $user->email = 'вася@mail.ru';
            $user->setPassword('вася');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }
        }
    }
    public function actionMi() {
        $model = User::find()->where(['username' => 'миша'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'миша';
            $user->email = 'миша@mail.ru';
            $user->setPassword('миша');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }
        }
    }
    public function actionPe() {
        $model = User::find()->where(['username' => 'петя'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'петя';
            $user->email = 'петя@mail.ru';
            $user->setPassword('петя');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }
        }
    }
    */
}
