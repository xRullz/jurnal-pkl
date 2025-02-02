<?php

use common\models\Siswa;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Kegiatan $model */
/** @var yii\widgets\ActiveForm $form */
$user = Yii::$app->user->identity;
$siswa = Siswa::find()->where(['user_id' => $user->id])->one();
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Hii <?= $siswa->nama ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                    <div class="form-group">
                        <?= $form->field($model, 'siswa_id')->hiddenInput(['value' => $siswa->id])->label(false) ?>
                        <?= $form->field($model, 'tanggal')->textInput(['type' => 'date', 'value' => date('Y-m-d'), 'class' => 'form-control']) ?>
                        <?= $form->field($model, 'kehadiran')->radioList(
                            [
                                'hadir' => 'Hadir',
                                'sakit' => 'Sakit',
                                'izin' => 'Izin',
                            ],
                        ) ?>
                        <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Keterangan (Kosongkan jika hadir)') ?>
                        <?= $form->field($model, 'kegiatan')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
                        <?= $form->field($model, 'catatan')->textarea(['rows' => 2, 'class' => 'form-control']) ?>
                        <?= $form->field($model, 'bukti')->fileInput(['class' => 'form-control']) ?>
                    </div>

                    <div class="card-action">
                        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>