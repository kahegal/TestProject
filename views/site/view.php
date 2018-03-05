<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="jumbotron">
    <h1><?= Html::encode("{$model->title}")?></h1>
</div>
<p><?= Html::encode("{$model->content}")?></p>

<p class="news_views_color">
    Просмотров: <?= count($model->views).' ';?>
    <a href="<?= Url::to(['site/update', 'id' => $model->id])?>" title="Update" aria-label="Update" data-pjax="0">
        <span class="glyphicon glyphicon-pencil"></span>
    </a>
</p>
