<?php 
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "kegiatan".
 *
 * @property int $id
 * @property int $siswa_id
 * @property string|null $kehadiran
 * @property string|null $keterangan
 * @property string|null $bukti
 * @property string|null $catatan
 * @property string|null $updated_at
 *
 * @property Siswa $siswa
 */
class Kegiatan extends ActiveRecord
{
    public static function tableName()
    {
        return 'kegiatan';
    }

    public function rules()
    {
        return [
            [['siswa_id'], 'required'],
            [['siswa_id', ], 'integer'],
            [['kehadiran', 'kegiatan', 'keterangan', 'bukti', 'catatan'], 'string', 'max' => 255],
            [['updated_at', 'tanggal'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'siswa_id' => 'Siswa',
            'tanggal' => 'Tanggal',
            'kehadiran' => 'Kehadiran',
            'keterangan' => 'Keterangan',
            'bukti' => 'Bukti',
            'catatan' => 'Catatan',
            'updated_at' => 'Tanggal Diperbarui',
        ];
    }

    public function getSiswa()
    {
        return $this->hasOne(Siswa::class, ['id' => 'siswa_id']);
    }
}
?>