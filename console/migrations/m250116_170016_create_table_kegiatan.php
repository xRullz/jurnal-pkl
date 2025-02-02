<?php

use yii\db\Migration;

/**
 * Class m250116_170016_create_table_kegiatan
 */
class m250116_170016_create_table_kegiatan extends Migration
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
    //     echo "m250116_170016_create_table_kegiatan cannot be reverted.\n";

    //     return false;
    // }

    public function up()
    {
        $this->createTable('kegiatan', [
            'id' => $this->primaryKey(),
            'id_siswa' => $this->string()->notNull(),  
            'tanggal' => $this->date()->notNull(),
            'kegiatan' => $this->text()->notNull(),
            'catatan' => $this->text(),
            'bukti_hadir' => $this->string(), 
        ]);

        $this->addForeignKey(
            'fk-kegiatan-siswa',
            'kegiatan',
            'id_siswa',
            'siswa',
            'nis',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk-kegiatan-siswa', 'kegiatan');
        $this->dropTable('kegiatan');
    }
}
