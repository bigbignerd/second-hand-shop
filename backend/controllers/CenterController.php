<?php

namespace backend\controllers;
use Yii;
use backend\models\Goods;

class CenterController extends \backend\controllers\CommonController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPublishGoods()
    {
    	$model = new Goods();
    	//get classify
        $model = $this->initClassify($model);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('publish', [
                'model' => $model,
            ]);
        }
    }
}
