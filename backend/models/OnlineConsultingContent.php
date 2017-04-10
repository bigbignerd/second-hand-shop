<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "onlineConsultingContent".
 *
 * @property integer $id
 * @property integer $cid
 * @property string $content
 * @property integer $type
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class OnlineConsultingContent extends \backend\models\Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'onlineConsultingContent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'type'], 'required'],
            [['cid', 'type', 'status', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => 'Cid',
            'content' => 'Content',
            'type' => 'Type',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
