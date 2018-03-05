<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 04.03.2018
 * Time: 21:57
 */

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <table class="table table-striped table-bordered">
        <th>id</th>
        <th>Заголовок</th>
        <th>Текст</th>
        <th class="action-column">Дата создания</th>
        <th class="action-column">Управление</th>
        <?php

        foreach ($news as $model): ?>
            <tr>
                <td>
                    <?= Html::encode("{$model->id}")?>
                </td>
                <td>
                    <?= Html::encode("{$model->title}")?>
                </td>
                <td style="width: 50%;">
                    <?= Html::encode("{$model->content}")?>
                </td>
                <td>
                    <?= date('Y-m-d H:i:s', $model->date_create)?>
                </td>

                <td>
                    <a href="<?= Url::to(['news/view', 'id' => $model->id])?>" title="View" aria-label="View" data-pjax="0">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                    <a href="<?= Url::to(['news/update', 'id' => $model->id])?>" title="Update" aria-label="Update" data-pjax="0">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="<?= Url::to(['news/delete', 'id' => $model->id])?>" title="Delete" aria-label="Delete" data-pjax="0" data-confirm="Are you sure you want to delete this item?" data-method="post">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
