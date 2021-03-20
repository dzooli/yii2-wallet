<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;
use kartik\number\NumberControl;

/**
 * @var yii\web\View $this
 * @var common\models\Transaction $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-view">
    <div class="page-header">
        <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    </div>


    <?= DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
        'panel' => [
            //'heading' => $this->title,
            'type' => DetailView::TYPE_PRIMARY,
        ],
        'attributes' => [
            [
                'attribute' => 'id',
                'visible' => false,
            ],
            [
                'group' => true,
                'label' => 'Accounts and category',
                'rowOptions' => [
                    'class' => 'table-primary',
                ],
            ],
            [
                'columns' => [
                    ['attribute' => 'account_id',],
                    ['attribute' => 'category_id'],
                    ['attribute' => 'target_id',],
                ],
            ],
            [
                'group' => true,
                'label' => 'Value',
                'rowOptions' => [
                    'class' => 'table-primary',
                ],
            ],
            [
                'columns' => [

                    [
                        'attribute' => 'value',
                        'type' => DetailView::INPUT_WIDGET,
                        'widgetOptions' => [
                            'class' => NumberControl::class,
                            'displayOptions' => [
                                'class' => 'form-control kv-monospace',
                            ],
                            // 'options' => [
                            //     'type' => 'text',
                            //     'label' => '<label>Saved Value:&nbsp;</label>',
                            //     'class' => 'kv-saved',
                            //     'readonly' => false,
                            //     'tabIndex' => 1000,
                            // ],
                            // 'saveInputContainer' => [
                            //     'class' => 'kv-saved-cont',
                            // ],
                        ],
                    ],
                    [
                        'attribute' => 'currency_id',
                    ],
                ],
            ],
            //'value',
            //'currency_id',
            [
                'group' => true,
                'label' => 'Date and Time',
                'rowOptions' => [
                    'class' => 'table-primary',
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'created_at',
                        'displayOnly' => true,
                        'format' => [
                            'datetime', (isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime']))
                                ? Yii::$app->modules['datecontrol']['displaySettings']['datetime']
                                : 'd-m-Y H:i:s A'
                        ],
                        'type' => DetailView::INPUT_WIDGET,
                        'widgetOptions' => [
                            'class' => DateControl::classname(),
                            'type' => DateControl::FORMAT_DATETIME
                        ]
                    ],
                    [
                        'attribute' => 'updated_at',
                        'displayOnly' => true,
                        'format' => [
                            'datetime', (isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime']))
                                ? Yii::$app->modules['datecontrol']['displaySettings']['datetime']
                                : 'd-m-Y H:i:s A'
                        ],
                        'type' => DetailView::INPUT_WIDGET,
                        'widgetOptions' => [
                            'class' => DateControl::classname(),
                            'type' => DateControl::FORMAT_DATETIME
                        ]
                    ],
                ],
            ],

        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->id],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>