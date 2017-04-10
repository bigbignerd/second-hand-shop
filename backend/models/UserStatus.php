<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_status".
 *
 * @property integer $id
 * @property integer $userId
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class UserStatus extends \backend\models\Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId'], 'required'],
            [['userId', 'status', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
