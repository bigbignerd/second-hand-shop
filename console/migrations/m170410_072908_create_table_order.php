<?php

use yii\db\Migration;

class m170410_072908_create_table_order extends Migration
{
    public function up()
    {
        $this->createTable("order", [
            'id' => $this->primaryKey(),
            'sellerId' => $this->integer()->notNull()->comment("卖家Id"),
            'buyerId' => $this->integer()->notNull()->comment("买家ID"),
            'status' => $this->smallInteger(2)->defaultValue(0)->comment("0，未成，1成交"),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    public function down()
    {
        $this->dropTable("order");

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
