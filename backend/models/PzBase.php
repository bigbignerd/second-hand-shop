<?php
namespace backend\models;
use yii\helpers\ArrayHelper;

class PzBase extends \yii\db\ActiveRecord
{
	/** @var 部门与职位公用的一个属性：公司列表数组 */
    public $companyMap = [];
	/** @var 部门列表数组 */
    public $deptMap    = [];
	/** @var 职位列表数组 */
    public $posMap     = [];
    
	public function beforeSave($insert)
	{
		parent::beforeSave($insert);
		if($this->isNewRecord){
			$this->setCreateInfo($insert);
		}
		$this->setUpdateInfo();
		return true;
	}
	/**
	 * 数据库所有的create_at字段 新数据自动添加当前时间
	 * @author bignerd
	 * @since  2017-03-30T13:51:02+0800
	 */
	public function setCreateInfo()
	{
		if($this->hasAttribute('created_at') && !$this->created_at){
			$this->created_at = time();
		}
		return true;
	}
	/**
	 * 数据库中所有updated_at字段在更新数据时更新
	 * @author bignerd
	 * @since  2017-03-30T13:51:35+0800
	 */
	public function setUpdateInfo()
	{
		if($this->hasAttribute('updated_at')){
			$this->updated_at = time();
		}
		return true;
	}
	/**
	 * 已数组的形式返回列表信息
	 * @author bignerd
	 * @since  2017-03-30T14:21:32+0800
	 * @param  string $field 要查询字段，默认全部
	 * @param  array $map 查询条件
	 * @return [type]
	 */
	public function listArray($field = "*", $map = [])
	{
		$data = $this->find()->select($field)
					 ->where($map)
					 ->asArray()
					 ->all();
		return $data;
	}
	/**
	 * 从数组中生成指定key value的 map
	 * @author bignerd
	 * @since  2017-03-30T14:26:20+0800
	 * @param  [array] $data
	 * @param  string $key
	 * @param  string $value
	 * @return array
	 */
	public function listIdNameMap($data, $key='id', $value='name')
	{
		$map = $default = [];
		if(!empty($data)){
			$map = ArrayHelper::map($data, $key, $value);
		}
		if($map){
			$default = ['0' => '通用'];
			foreach ($map as $k => $v) {
				if(!array_key_exists($k, $default)){
					$default[$k] = $v;
				}
			}
		}

		return $default;
	}
}
?>