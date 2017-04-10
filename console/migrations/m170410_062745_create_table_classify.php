<?php

use yii\db\Migration;

class m170410_062745_create_table_classify extends Migration
{
    public function up()
    {
        $this->createTable("classify", [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment("分类名称"),
            'parentId' => $this->integer()->defaultValue(0)->comment("父级分类Id"),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'remark' => $this->string(300)->defaultValue(""),
        ]);
    }

    public function down()
    {
        $this->dropTable("classify");

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
