<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "siswa".
 *
 * @property int $id
 * @property string $nis
 * @property string|null $nama
 * @property int|null $pembimbing_id
 * @property int|null $user_id
 * @property int|null $dudi_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Pembimbing $pembimbing
 * @property Dudi $dudi
 * @property Kegiatan[] $kegiatans
 */
class Siswa extends ActiveRecord
{
    public static function tableName()
    {
        return 'siswa';
    }

    public function rules()
    {
        return [
            [['nis'], 'required'],
            [['pembimbing_id', 'user_id', 'dudi_id'], 'integer'],
            [['nis'], 'string', 'max' => 20],
            [['nama', 'kelas'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nis' => 'NIS',
            'nama' => 'Nama Siswa',
            'kelas' => 'Kelas',
            'user_id' => 'User ID',
            'pembimbing_id' => 'Pembimbing',
            'dudi_id' => 'Dudi',
            'created_at' => 'Tanggal Dibuat',
            'updated_at' => 'Tanggal Diperbarui',
        ];
    }

    public function getPembimbing()
    {
        return $this->hasOne(Pembimbing::class, ['id' => 'pembimbing_id']);
    }

    public function getDudi()
    {
        return $this->hasOne(Dudi::class, ['id' => 'dudi_id']);
    }

    public function getKegiatans()
    {
        return $this->hasMany(Kegiatan::class, ['siswa_id' => 'id']);
    }

    public static function getList()
    {
        $arr = Siswa::find()->asArray()->all();
        return ArrayHelper::map($arr, 'id', 'nama');
    }
}
