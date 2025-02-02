<?php

use yii\db\Migration;

/**
 * Class m250116_165919_create_table_siswa
 */
class m250116_165919_create_table_siswa extends Migration
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
    //     echo "m250116_165919_create_table_siswa cannot be reverted.\n";

    //     return false;
    // }

    public function up()
{
    $this->createTable('siswa', [
        'nis' => $this->string()->notNull()->unique(), 
        'nama' => $this->string()->notNull(),
        'id_pembimbing' => $this->integer()->notNull(),
        'id_dudi' => $this->integer()->notNull(),
    ]);

    $this->addPrimaryKey('pk_siswa', 'siswa', 'nis');

    $this->addForeignKey(
        'fk-siswa-pembimbing',
        'siswa',
        'id_pembimbing',
        'pembimbing',
        'id',
        'CASCADE'
    );

    $this->addForeignKey(
        'fk-siswa-dudi',
        'siswa',
        'id_dudi',
        'dudi',
        'id',
        'CASCADE'
    );
}

    public function down()
    {
        $this->dropForeignKey('fk-siswa-pembimbing', 'siswa');
        $this->dropForeignKey('fk-siswa-dudi', 'siswa');
        $this->dropTable('siswa');
    }
}
