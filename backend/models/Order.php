<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $sellerId
 * @property integer $buyerId
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Order extends \backend\models\Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sellerId', 'buyerId','phone','address','name','goodsId'], 'required'],
            [['phone','address','name'],'string'],
            [['sellerId', 'buyerId', 'status', 'created_at', 'updated_at','goodsId'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sellerId' => 'Seller ID',
            'buyerId' => 'Buyer ID',
            'status' => '订单状态',
            'created_at' => '交易时间',
            'updated_at' => 'Updated At',
            'address' => '收货地址',
            'phone' => '手机号',
            'name' => '收货人姓名',
            'goodsImage' => '商品图片',
            'goodsName' => '商品名',
            'price' => '价格',
        ];
    }
    /**
     * 修改订单状态
     * @param  $id 订单ID
     * @param  $status 当前状态
     */
    public function changeStatus($id,$status)
    {
        $map = [
            '0' => '1',
            '1' => '2',
        ];
        return $this->updateAll(['status'=>$map[$status]],['id'=>$id]);
    }
}
