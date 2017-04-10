<?php

use yii\db\Migration;

class m170410_070635_create_table_comment extends Migration
{
    public function up()
    {
        $this->createTable("comment", [
            'id' => $this->primaryKey(),
            'comment' => $this->string()->notNull()->comment("评论内容"),
            'userId' => $this->integer()->notNull()->comment("评论论人id"),
            'replyId' => $this->integer()->defaultValue(0)->comment("被回复人id"),
            'goodsId' => $this->integer()->notNull()->comment("商品id"),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    public function down()
    {
        $this->dropTable("comment");

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
