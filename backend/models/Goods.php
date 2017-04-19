<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property integer $classifyId
 * @property integer $childClassifyId
 * @property string $price
 * @property string $desc
 * @property integer $number
 * @property string $images
 * @property integer $condition
 * @property integer $publisherId
 * @property string $city
 * @property integer $viewNum
 * @property integer $created_at
 * @property integer $updated_at
 */
class Goods extends \backend\models\Base
{
    public $goodsCondition = ['5'=>'五成新','7'=>'七成新','9'=>'九成新','10'=>'十成新'];
    public $mainClassify;
    public $childClassify;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'name', 'classifyId', 'desc', 'number', 'price'], 'required'],
            [['classifyId', 'childClassifyId', 'number', 'condition', 'publisherId', 'viewNum', 'created_at', 'updated_at'], 'integer'],
            [['price'], 'number'],
            [['images'], 'string'],
            [['title', 'name', 'desc'], 'string', 'max' => 300],
            [['city'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'name' => '商品名称',
            'classifyId' => '所属主分类',
            'childClassifyId' => '所属子分类',
            'price' => '价格',
            'desc' => '商品描述',
            'number' => '数量',
            'images' => '上传图片',
            'condition' => '商品成色',
            'publisherId' => '发布者',
            'city' => '所在城市',
            'viewNum' => '浏览量',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        if($this->isNewRecord){
            $this->publisherId = Yii::$app->user->identity->id;
        }
        return true;
    }
    /**
     * 添加商品浏览量
     * @since  2017-04-19T13:53:06+0800
     */
    public function addVisitNum($model)
    {
        $model->viewNum = ($model->viewNum)+1;
        return $model->save();
    }
    /**
     * 获取一个商品的用户评论信息
     * @since  2017-04-19T14:33:21+0800
     * @param  $id 商品id
     */
    public function getComment($id)
    {
        $model = new \backend\models\Comment();
        $map   = ['goodsId' => $id];
        $data  = $model->find()->where($map)
                       ->orderBy("created_at desc")
                       ->asArray()
                       ->all();
        if(!empty($data)){
            $user = new \common\models\User();
            foreach ($data as $k => $v) {
                $userData = $user->findOne($v['userId']);
                $data[$k]['username'] = $userData->username;
            }
        }
        return $data;
    }
}
