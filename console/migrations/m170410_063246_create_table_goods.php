<?php

use yii\db\Migration;

class m170410_063246_create_table_goods extends Migration
{
    public function up()
    {
        $this->createTable("goods", [
            'id' => $this->primaryKey(),
            'title' => $this->string(300)->notNull()->comment("商品显示的标题"),
            'name' => $this->string(300)->notNull()->comment("商品名称"),
            'classifyId' => $this->integer()->notNull()->comment("商品分类"),
            'childClassifyId' => $this->integer()->defaultValue(0)->comment("商品子分类"),
            'price' => $this->decimal(10,2)->defaultValue(0.0)->comment("商品价格"),
            'desc' => $this->string(300)->comment("商品描述"),
            'number'=> $this->integer()->defaultValue(1)->comment("商品适量"),
            'images'=> $this->text()->comment("图片链接json"),
            'condition' => $this->smallInteger(2)->defaultValue(0)->comment("1到10成"),
            'publisherId' => $this->integer()->notNull()->comment("商品发布者id"),
            'city' => $this->string()->comment("所在城市"),
            'viewNum' => $this->integer()->defaultValue(0)->comment("浏览量"),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    public function down()
    {
        $this->dropTable("goods");
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
