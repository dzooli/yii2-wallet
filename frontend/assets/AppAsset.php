<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use kartik\icons\FontAwesomeAsset;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [];
    public $depends = [
        'yii\web\YiiAsset',
        'kartik\icons\FontAwesomeAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
