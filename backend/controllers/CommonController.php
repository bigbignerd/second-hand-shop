<?php
namespace backend\controllers;
use Yii;

class CommonController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        parent::beforeAction($action);
        $this->layout = 'center';
        if(!Yii::$app->user->identity->id){
            return $this->redirect(['site/login']);
        }else{
            return true;
        }
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