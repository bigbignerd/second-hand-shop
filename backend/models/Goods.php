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
            [['title', 'name', 'classifyId', 'publisherId'], 'required'],
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
            'title' => 'Title',
            'name' => 'Name',
            'classifyId' => 'Classify ID',
            'childClassifyId' => 'Child Classify ID',
            'price' => 'Price',
            'desc' => 'Desc',
            'number' => 'Number',
            'images' => 'Images',
            'condition' => 'Condition',
            'publisherId' => 'Publisher ID',
            'city' => 'City',
            'viewNum' => 'View Num',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
