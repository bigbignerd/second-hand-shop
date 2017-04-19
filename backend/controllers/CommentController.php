<?php

namespace backend\controllers;
use Yii;
use backend\models\Comment;

class CommentController extends \backend\controllers\CommonController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionAdd()
    {
    	if(Yii::$app->request->isPost){
    		$post = Yii::$app->request->post();
    		$post['userId'] = Yii::$app->user->identity->id;
    		$model = new Comment();
    		$model->attributes = $post;
    		if($model->save()){
    			$this->ajaxJson(0,'发布成功');
    		}else{
    			$this->ajaxJson(1,'评论失败');
    		}
    	}
    }

}
