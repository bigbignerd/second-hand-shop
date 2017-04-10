<?php

use yii\db\Migration;

class m170410_062221_create_table_user_status extends Migration
{
    public function up()
    {
        $this->createTable("user_status", [
            'id' => $this->primaryKey(),
            'userId' => $this->integer()->notNull()->comment("用户id"),
            'status' => $this->smallInteger()->notNull()->defaultValue(0)->comment("登陆状态0为未登录，1为登陆"),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable("user_status");

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
