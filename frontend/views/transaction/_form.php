<?php

use common\models\base\Account;
use common\models\Category;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use kartik\number\NumberControl;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var common\models\Transaction $model
 * @var yii\widgets\ActiveForm $form
 */

$accountTypeDropdownItems =  [];
foreach (Yii::$app->user->identity->accounts ?? [] as $account) {
    $accountTypeDropdownItems[$account->id] = $account->accountType->name;
}

$select2Theme = Select2::THEME_MATERIAL;
?>

<div class="transaction-form">

    <?php
    $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
    echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 3,
        'compactGrid' => true,
        'encloseFieldSet' => true,
        'attributes' => [
            'account_id' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => Select2::class,
                'label' => '',
                'options' => [
                    'theme' => $select2Theme,
                    'initValueText' => 'Select Source Account...',
                    'data' => $accountTypeDropdownItems,
                ],

            ],
            'target_id' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => Select2::class,
                'label' => '',
                'options' => [
                    'theme' => $select2Theme,
                    'initValueText' => 'Select Target Account...',
                    'data' => $accountTypeDropdownItems,
                ],

            ],
            'category_id' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => Select2::class,
                'label' => '',
                'options' => [
                    'theme' => $select2Theme,
                    //      'initValueText' => 'Select Category...',
                    'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name'),
                ],
            ],
            'created_at' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => DatePicker::class,
                'label' => '',
            ],
            'value' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => NumberControl::class,
                'label' => '',
            ],
        ]

    ]);
    echo Html::submitButton(
        $model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>