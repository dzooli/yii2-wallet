<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Transactions';

Pjax::begin();
echo GridView::widget([
    'bootstrap' => true,
    'dataProvider' => $trDataProvider,
    'filterModel' => $trSearchModel,
    'responsive' => true,
    'bordered' => false,
    'hover' => false,
    'condensed' => true,
    'floatHeader' => true,
    'pjax' => true,

    'panel' => [
        'heading' => '<h3 class="panel-title"><i class="fas fa-list"></i> ' . Html::encode($this->title) . ' </h3>',
        'type' => 'primary',
        'before' => Html::a('<i class="fas fa-plus"></i> Add', ['/transaction/create'], ['class' => 'btn btn-success']),
        //'after' => Html::a('<i class="fas fa-redo"></i> Reset List', ['/site/index'], ['class' => 'btn btn-info']),
        'showFooter' => false
    ],

    'columns' => [
        [
            'attribute' => 'created_at',
            'format' => [
                'datetime', (isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime']))
                    ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s'
            ]
        ],
        [
            'attribute' => 'category_name',
            'label' => 'Category',
            'value' => 'category.name',
        ],
        'value',
        //            'currency_id', 

        [
            'class' => 'kartik\grid\ActionColumn',
            'visible' => true,
            'template' => '{update} {delete}',
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a(
                        '<span class="fas fa-edit" style="font-size: 2em;"></span>',
                        Yii::$app->urlManager->createUrl(['transaction/view', 'id' => $model->id, 'edit' => 't']),
                        ['title' => Yii::t('yii', 'Edit'),]
                    );
                },
                'delete' => function ($url, $model) {
                    return Html::a(
                        '<span class="fas fa-trash" style="font-size: 2em;"></span>',
                        Yii::$app->urlManager->createUrl(['transaction/delete', 'id' => $model->id]),
                        [
                            'data-method' => 'POST',
                            'data-confirm' => 'Do you really want to delete this item?',
                            'title' => Yii::t('yii', 'Delete')
                        ]
                    );
                },
            ],
        ],
    ],
]);
Pjax::end();
