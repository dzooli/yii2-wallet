<?php

//use yii\helpers\Html;
use kartik\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Transaction $model
 */

$this->title = 'Create Transaction';
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-create">
    <?= Html::pageHeader(Html::encode($this->title)) ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>