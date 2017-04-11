<?php

use yii\db\Migration;

class m170411_010412_insert_data_to_classify extends Migration
{
    
    public function up()
    {
        //主分类数据
        $data = [
            ['name'=>'电脑','parentId'=>0,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'手机','parentId'=>0,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'相机','parentId'=>0,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'腕表','parentId'=>0,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'游戏','parentId'=>0,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'其他','parentId'=>0,'created_at'=>time(),'updated_at'=>time()],
        ];
        //添加主分类
        foreach ($data as $k => $v) {
            $this->insert('classify', $v);
        }
        return true;
    }

    public function down()
    {
        echo '请手动删除';

        return true;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
