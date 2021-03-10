<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::$app->name;
$this->params['breadcrumbs'][] = 'About';
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card">
        <div class="card-body">
            <div class="card-text">This is a web application template.</div>
            <div class="card-text">Please do not hesitate to contact me if you have any question or improvement idea.</div>
        </div>
    </div>

</div>