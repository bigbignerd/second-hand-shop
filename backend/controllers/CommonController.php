<?php
namespace backend\controllers;

class CommonController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        parent::beforeAction($action);
        $this->layout = 'center';

        return true;
    }
    public function initClassify($model)
    {
        $classify = new \backend\models\Classify();
        $model->mainClassify  = $classify->mainClassify();
        $model->childClassify = $classify->childClassify();

        return $model;
    }
}
?>