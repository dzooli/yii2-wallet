<?php

/* @var $this yii\web\View */

use kartik\tabs\TabsX;

$this->title = 'My Yii Application';

$tabIconSize = '1.5em;';

$tabItems = [
    [
        'label' => '<span style="font-size: ' . $tabIconSize . '"><i class="fas fa-receipt pull-left"></i></span> Expense',
        'content' => 'The expenses tab',
        'active' => true,
    ],
    [
        'label' => '<span style="font-size: ' . $tabIconSize . '"><i class="fas fa-exchange-alt pull-left"></i></span> Transfer',
        'content' => 'The transfer tab',
        'active' => false,
    ],
    [
        'label' => '<span style="font-size: ' . $tabIconSize . '"><i class="fas fa-hand-holding-usd pull-left"></i></span> Income',
        'content' => 'This is the income tab',
        'active' => false,
    ],
];
?>

<div class="site-index">
    <div class="body-content">
        <div class="row mb-2">
            <div class="col-md-12">
                <?= TabsX::widget(
                    [
                        'items' => $tabItems,
                        'align' => TabsX::ALIGN_LEFT,
                        'encodeLabels' => false,
                        'bordered' => true,
                        'height' => TabsX::SIZE_SMALL,
                    ]
                ) ?>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Quick overview widgets</div>
                        <div class="card-text">A placeholder for the charts and expense alerts</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Transactions</div>
                        <div class="card-text">A placeholder for the transaction list</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>