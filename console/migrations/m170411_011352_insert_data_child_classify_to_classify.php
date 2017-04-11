<?php

use yii\db\Migration;

class m170411_011352_insert_data_child_classify_to_classify extends Migration
{
    public function up()
    {
        $data = [
            ['name'=>'显卡','parentId'=>1,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'CPU','parentId'=>1,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'内存','parentId'=>1,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'电脑整机','parentId'=>1,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'显示器','parentId'=>1,'created_at'=>time(),'updated_at'=>time()],
            //手机子分类
            ['name'=>'外壳','parentId'=>2,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'电池','parentId'=>2,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'手机整机','parentId'=>2,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'贴膜','parentId'=>2,'created_at'=>time(),'updated_at'=>time()],
            //相机子分类
            ['name'=>'镜头','parentId'=>3,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'三脚架','parentId'=>3,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'减光镜','parentId'=>3,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'相机整机','parentId'=>3,'created_at'=>time(),'updated_at'=>time()],
            //腕表子分类
            ['name'=>'机械表','parentId'=>4,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'电子表','parentId'=>4,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'iWatch','parentId'=>4,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'moto360','parentId'=>4,'created_at'=>time(),'updated_at'=>time()],
            //游戏子分类
            ['name'=>'ps4','parentId'=>5,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'xbox360','parentId'=>5,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'wii','parentId'=>5,'created_at'=>time(),'updated_at'=>time()],
            //其他子分类
            ['name'=>'平板','parentId'=>6,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'手环','parentId'=>6,'created_at'=>time(),'updated_at'=>time()],
            ['name'=>'耳机','parentId'=>6,'created_at'=>time(),'updated_at'=>time()],
        ];
        foreach ($data as $k => $v) {
            $this->insert("classify", $v);
        }
        return true;
    }

    public function down()
    {
        echo "请手动删除\n";

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
