<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $comment
 * @property integer $userId
 * @property integer $replyId
 * @property integer $goodsId
 * @property integer $created_at
 * @property integer $updated_at
 */
class Comment extends \backend\models\Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment', 'userId', 'goodsId'], 'required'],
            [['userId', 'replyId', 'goodsId', 'created_at', 'updated_at'], 'integer'],
            [['comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment' => 'Comment',
            'userId' => 'User ID',
            'replyId' => 'Reply ID',
            'goodsId' => 'Goods ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
