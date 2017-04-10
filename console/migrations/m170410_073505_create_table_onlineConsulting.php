<?php

use yii\db\Migration;

class m170410_073505_create_table_onlineConsulting extends Migration
{
    public function up()
    {
        $this->createTable("onlineConsulting", [
            'id' => $this->primaryKey(),
            'sellerId' => $this->integer()->notNull()->comment("卖家ID"),
            'buyerId' => $this->integer()->notNull()->comment("买家id"),
            'goodsId' => $this->integer()->notNull()->comment("商品id"),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    public function down()
    {
        $this->dropTable("onlineConsulting");

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
