<?php

namespace frontend\models;

use Yii;
use yii\base\BaseObject;

class DownloadJob extends BaseObject implements \yii\queue\JobInterface
{
    public function execute($queue)
    {
        Yii::info('Job is running', 'wallet');
    }
}
