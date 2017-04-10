<?php

use yii\db\Migration;

class m170410_073917_create_table_onlineConsultingContent extends Migration
{
    public function up()
    {
        $this->createTable("onlineConsultingContent", [
            'id' => $this->primaryKey(),
            'cid' => $this->integer()->notNull()->comment("会话id"),
            'content' => $this->string()->comment("会话内容"),
            'type' => $this->smallInteger(2)->notNull()->comment("1买家2卖家"),
            'status' => $this->smallInteger(2)->defaultValue(0)->comment("0默认1未读2已读"),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    public function down()
    {
        $this->dropTable("onlineConsultingContent");

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
