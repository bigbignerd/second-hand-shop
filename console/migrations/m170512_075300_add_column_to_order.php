<?php

use yii\db\Migration;

class m170512_075300_add_column_to_order extends Migration
{
    public function up()
    {
        $this->addColumn("order","goodsId",$this->integer()->notNull()->comment("商品id"));
    }

    public function down()
    {
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
