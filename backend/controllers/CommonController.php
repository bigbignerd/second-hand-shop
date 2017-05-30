<?php
namespace backend\controllers;
use Yii;
/**
 * 公共的控制器类
 */
class CommonController extends \yii\web\Controller
{
    /**
     * 初始化系统中的所有分类，分类信息添加到对应的模型信息
     */
    public function initClassify($model)
    {
        $classify = new \backend\models\Classify();
        $model->mainClassify  = $classify->mainClassify();
        $model->childClassify = $classify->childClassify();

        return $model;
    }
    /**
     * 格式化返回给前端的信息，以json的形式返回
     */
    public function ajaxJson($errno="0",$errmsg="",$data=[])
    {
    	$json = [
    		'errno' => $errno,
    		'errmsg'=> $errmsg,
    		'data' => $data
    	];
    	echo json_encode($json);
    	exit;
    }
}
?>