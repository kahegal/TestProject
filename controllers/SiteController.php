<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\news;
use app\models\Views;
use yii\web\NotFoundHttpException;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
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
        $news = News::find()
            ->where(['deleted' => 0])
            ->orderBy('date_create')
            ->all();



        return $this->render('index', [
            'news' => $news,
        ]);

    }

    public function actionView($id)
    {
        $userIP = Yii::$app->request->userIP;
        $userAgent = Yii::$app->request->userAgent;

        $hash=md5($userAgent.$userIP);

        if (!Views::find()->where(['user_info' => $hash, 'news_id' => $id])->exists())
        {
            $views = new Views();
            $views->news_id=$id;
            $views->user_info=$hash;
            $views->save();
        }

        $news = News::find()
            ->where(['id' => $id])
            ->one();

        return $this->render('view', [
            'model' => $news,
        ]);
    }








    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null)
        {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
