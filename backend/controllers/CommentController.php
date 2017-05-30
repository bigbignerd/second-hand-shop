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
    /**
     * 供前端页面ajax提交评价信息的方法
     */
    public function actionAdd()
    {
    	if(Yii::$app->request->isPost){
            //获取页面中提交的评论信息
    		$post = Yii::$app->request->post();
    		$post['userId'] = Yii::$app->user->identity->id;
    		$model = new Comment();
    		$model->attributes = $post;
            //保存
    		if($model->save()){
    			$this->ajaxJson(0,'发布成功');
    		}else{
    			$this->ajaxJson(1,'评论失败');
    		}
    	}
    }

}
