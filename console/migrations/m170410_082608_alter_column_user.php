<?php

use yii\db\Migration;

class m170410_082608_alter_column_user extends Migration
{
    public function up()
    {
        $this->alterColumn("user", "phone", $this->string()->defaultValue("")->comment("手机号"));
        $this->alterColumn("user", "name", $this->string()->defaultValue("")->comment("姓名"));
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
