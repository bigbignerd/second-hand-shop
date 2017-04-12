<?php
namespace backend\controllers;
use Yii;

class CommonController extends \yii\web\Controller
{
    public function initClassify($model)
    {
        $classify = new \backend\models\Classify();
        $model->mainClassify  = $classify->mainClassify();
        $model->childClassify = $classify->childClassify();

        return $model;
    }
}
?>