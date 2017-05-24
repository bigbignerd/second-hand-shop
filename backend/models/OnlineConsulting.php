<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "onlineConsulting".
 *
 * @property integer $id
 * @property integer $sellerId
 * @property integer $buyerId
 * @property integer $goodsId
 * @property integer $created_at
 * @property integer $updated_at
 */
class OnlineConsulting extends \backend\models\Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'onlineConsulting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sellerId', 'buyerId', 'goodsId'], 'required'],
            [['sellerId', 'buyerId', 'goodsId', 'created_at', 'updated_at'], 'integer'],
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
            'goodsId' => 'Goods ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public static function getModel($map)
    {
        $model = self::find()->where($map)->one();
        if($model !== NULL){
            return $model;
        }else{
            return new self;
        }
    }
    public function addContent($id,$content,$type)
    {
        $model = new \backend\models\OnlineConsultingContent();
        $model->cid = $id;
        $model->status = 0;
        $model->type = $type;
        $model->content = $content;
        return $model->save();
    }

    public function createConversion($data)
    {
        $this->attributes = $data;
        if($this->save()){
            $this->addContent($this->id, $data['message'],$data['type']);
            return true;
        }else{
            return false;
        }
    }
}
