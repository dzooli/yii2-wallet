<?php

/* @var $this yii\web\View */
/* @var $trDataProvider Transaction data provider */
/* @var $trSearchModel TransactionSearch search model for the transactions */
/* @var $trTitle string Title of the transaction list */

use kartik\tabs\TabsX;
use kartik\helpers\Html;

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;

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

$secondaryHeader = Html::bsLabel('As your daily routine', 'warning', [
    'class' => 'text-nowrap',
    'style' => 'font-weight: lighter; font-size: small;',
]);
$mainHeader = Html::pageHeader('Daily Cash-flow', $secondaryHeader);
?>

<div class="site-index">
    <div class="body-content">
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card border-primary">
                    <div class="card-body" style="padding: 0;">
                        <div class="card-header text-white bg-primary">
                            <?= $mainHeader ?>
                        </div>
                        <?= TabsX::widget(
                            [
                                'items' => $tabItems,
                                'encodeLabels' => false,
                                'bordered' => true,
                                'height' => TabsX::SIZE_SMALL,
                            ]
                        ) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="card border-primary">
                <div class="card-body" style="padding:0;">
                    <div class="card-header text-white bg-primary">
                        <h3 class="panel-title">Quick overview widgets</h3>
                    </div>
                    <div class="card-title" style="padding: 4px 8px 4px 8px;">A placeholder for the charts and expense alerts</div>
                    <div class="card-subtitle" style="padding: 4px 8px 4px 8px;">The subtitle of the overview card</div>
                    <div class="card-text" style="padding: 4px 8px 4px 8px;">Lorem ipsum dolor sit amet kgdfsgkjshdfghksd gkjdfgkdsjf dsfgkjhdfo fgoiudfgioymn glkdlfjg isdig dfgm, dfgm,ndfgopsdfo ,mycxnv</div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $this->render('/transaction/_grid', ['trDataProvider' => $trDataProvider, 'trSearchModel' => $trSearchModel]) ?>
        </div>
    </div>

</div>
</div>