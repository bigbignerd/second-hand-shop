<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "classify".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parentId
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $remark
 */
class Classify extends \backend\models\Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classify';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parentId', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['remark'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parentId' => 'Parent ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'remark' => 'Remark',
        ];
    }
}
