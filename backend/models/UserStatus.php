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
    /**
     * 修改用户在线离线状态
     * @since  2017-04-19T15:45:08+0800
     * @param  boolean $login 状态 1 为修改登录状态 0 为修改退出状态
     * @param  $userId 当前登录用户id
     */
    public function changeStatus($login=true, $userId)
    {
        if($login){
            $targetStatus = 1;
        }else{
            $targetStatus = 0;
        }
        
        $map = ['userId' => $userId];
        $data = $this->find()->where($map)->one();

        if(empty($data)){
            $this->userId = $userId;
            $this->status = $targetStatus;
            return $this->save();
        }else{
            $data->status = $targetStatus;
            return $data->save();
        }
    }
}
