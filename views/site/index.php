<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Новости</h1>
    </div>

    <div class="body-content">
        <div class="row home_case" style="">
            <?php

            foreach ($news as $content): ?>
                <div class="col-lg-4">
                    <h2><?= Html::encode("{$content->title}")?></h2>
                    <p><?= Html::encode("{$content->content}")?></p>
                    <p>
                        <a class="btn btn-default" href="<?=Url::to(['site/view', 'id' => $content->id])?>">Читать статью »</a>
                        <span class="news_views">Просмотров: <?= count($content->views);?></span>
                    </p>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>
