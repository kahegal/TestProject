<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 04.03.2018
 * Time: 19:51
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\news;
use app\models\Views;
use yii\web\NotFoundHttpException;


class NewsController extends Controller
{


    public function actionIndex()
    {
        /*        $sql = 'SELECT n.id as id, n.title as title, n.content as content, count(v.id) as count_views
                              FROM `news` as n LEFT JOIN views as v ON n.id=v.news_id
                                    WHERE n.deleted=0  GROUP BY n.id ORDER by n.date_create';
                $news = News::findbysql($sql)->all();*/

        $news = News::find()
            ->where(['deleted' => 0])
            ->orderBy('date_create')
            ->all();
        return $this->render('index', [
            'news' => $news,
        ]);

    }

    public function actionCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        $news = News::find()
            ->where(['id' => $id])
            ->one();

        return $this->render('view', [
            'model' => $news,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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