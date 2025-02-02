<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pembimbing".
 *
 * @property int $id
 * @property string $nama
 * @property int|null $user_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Siswa[] $siswas
 */
class Pembimbing extends ActiveRecord
{
    public static function tableName()
    {
        return 'pembimbing';
    }

    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['user_id'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'user_id' => 'User ID',
            'created_at' => 'Tanggal Dibuat',
            'updated_at' => 'Tanggal Diperbarui',   
        ];
    }

    public function getSiswas()
    {
        return $this->hasMany(Siswa::class, ['pembimbing_id' => 'id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public static function getList()
    {
        $arr = Pembimbing::find()->asArray()->all();
        return ArrayHelper::map($arr, 'id', 'nama');
    }
}