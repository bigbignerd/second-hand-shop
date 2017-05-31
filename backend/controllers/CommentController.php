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
    public function actionTest()
    {
        $classObj = new \ReflectionClass('\backend\controllers\CenterController');
        // print $this->getSource($classObj);
        $method = $classObj->getMethod('actionRealName');
        $params = $method->getParameters();
        foreach ($params as $p) {
            print $this->validatePara($p);
        }
    }
    public function t2(\ReflectionClass $class)
    {
        $detail = '';
        $name = $class->getName();
        if($class->isUserDefined()){
            $detail .= "$name is user defined\n";
        }
        if($class->isInternal()){
            $detail .= "$name is built in\n";
        }
        if($class->isInterface()){
            $detail .= "$name is interface\n";
        }
        if($class->isAbstract()){
            $detail .= "$name is abstract\n";
        }
        if($class->isFinal()){
            $detail .= "$name is final\n";
        }
        if($class->isInstantiable()){
            $detail .= "$name is instantiable\n";
        }
        return $detail;
    }
    public function getSource(\ReflectionClass $class)
    {
        $path = $class->getFileName();
        $lines = @file($path);//以数组的方式读取文件（行）
        $from = $class->getStartLine();
        $to   = $class->getEndLine();
        $len  = $to - $from + 1;
        return implode(array_slice($lines, $from - 1, $len));
    }
    public function validatePara(\ReflectionParameter $params)
    {
        $paraName = $params->getName();
        $position = $params->getPosition();
        $detail = "$$paraName has position $position\n";
        if($params->isDefaultValueAvailable()){
            $def = $params->getDefaultValue();
            $detail .= "$$paraName has default value $def\n";
        }
        return $detail;
    }
}
