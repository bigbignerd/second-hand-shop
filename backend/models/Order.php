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
            [['sellerId', 'buyerId'], 'required'],
            [['sellerId', 'buyerId', 'status', 'created_at', 'updated_at'], 'integer'],
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
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
