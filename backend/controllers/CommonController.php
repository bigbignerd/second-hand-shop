<?php
namespace backend\controllers;

class CommonController extends \yii\web\Controller
{

	/**
	 * 初始化公司模型中的companyMap属性，供列表以及下拉框使用
	 * @author bignerd
	 * @since  2017-03-30T15:54:34+0800
	 * @param   $model
	 * @return [type]
	 */
	protected function initListMap($model)
    {
        $companyModel = new \backend\models\PzCompany();
        $model->companyMap = $companyModel->listIdNameMap($companyModel->listArray());
        return $model;
    }
    protected function initDeptListMap($model)
    {
    	$departModel = new \backend\models\PzDepartment();
    	$model->deptMap = $departModel->listIdNameMap($departModel->listArray());
    	return $model;
    }
    protected function initPosListMap($model)
    {
    	$departModel = new \backend\models\PzPosition();
    	$model->posMap = $departModel->listIdNameMap($departModel->listArray());
    	return $model;
    }
    protected function initDropdownData($model)
    {
        $model = $this->initListMap($model);
        $model = $this->initDeptListMap($model);
        $model = $this->initPosListMap($model);

        return $model;
    }
}
?>