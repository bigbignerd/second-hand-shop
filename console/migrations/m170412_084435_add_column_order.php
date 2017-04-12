<?php

use yii\db\Migration;

class m170412_084435_add_column_order extends Migration
{
    public function up()
    {
        $this->addColumn("order", "address", $this->string()->notNull()->comment("收货地址"));
        $this->addColumn("order", "name", $this->string()->notNull()->comment("收件人姓名"));
        $this->addColumn("order", "phone", $this->string()->notNull()->comment("电话"));
        return true;
    }

    public function down()
    {
        $this->dropColumn("order", "address");
        $this->dropColumn("order", "name");
        $this->dropColumn("order", "phone");

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
