<?php 
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "dudi".
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $no_telpon
 *
 * @property Siswa[] $siswas
 */
class Dudi extends ActiveRecord
{
    public static function tableName()
    {
        return 'dudi';
    }

    public function rules()
    {
        return [
            [['nama', 'alamat', 'no_telpon'], 'required'],
            [['nama', 'alamat'], 'string', 'max' => 255],
            [['no_telpon'], 'string', 'max' => 15],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'no_telpon' => 'No Telpon',   
        ];
    }


    public function getSiswas()
    {
        return $this->hasMany(Siswa::class, ['dudi_id' => 'id']);
    }

    public static function getList()
    {
        $arr = Dudi::find()->asArray()->all();
        return ArrayHelper::map($arr, 'id', 'nama');
    }
}
?>