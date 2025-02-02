<?php

use yii\db\Migration;

/**
 * Class m250116_165953_create_table_pembimbing
 */
class m250116_165913_create_table_pembimbing extends Migration
{
    /**
     * {@inheritdoc}
     */
    // public function safeUp()
    // {

    // }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function safeDown()
    // {
    //     echo "m250116_165953_create_table_pembimbing cannot be reverted.\n";

    //     return false;
    // }

    public function up()
    {
        $this->createTable('pembimbing', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('pembimbing');
    }
}
