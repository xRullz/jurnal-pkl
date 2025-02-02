<?php

use yii\db\Migration;

/**
 * Class m250116_170007_create_table_dudi
 */
class m250116_165910_create_table_dudi extends Migration
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
    //     echo "m250116_170007_create_table_dudi cannot be reverted.\n";

    //     return false;
    // }

    public function up()
    {
        $this->createTable('dudi', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
            'alamat' => $this->string(),
            'no_telp' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('dudi');
    }
}
