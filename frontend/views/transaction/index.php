<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var frontend\models\TransactionSearch $searchModel
 */

$this->title = 'My Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-index">
    <div class="page-header">
        <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <p>
        <?php // echo Html::a('Create Transaction', ['create'], ['class' => 'btn btn-success']);  
        ?>
    </p>

    <?php
    echo $this->render('_grid', ['trDataProvider' => $trDataProvider, 'trSearchModel' => $trSearchModel]);
    ?>

</div>