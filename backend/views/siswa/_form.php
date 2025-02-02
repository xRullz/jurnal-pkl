<?php

use common\models\Dudi;
use common\models\Pembimbing;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Siswa $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"><?= Html::encode($this->title) ?></div>
            </div>
            <div class="card-body">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="mb-2 ps-3">
                                    <h5>Informasi Akun</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <?= $form->field($userModel, 'username')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
                                    <?= $form->field($userModel, 'password_hash')->passwordInput(['maxlength' => true, 'class' => 'form-control']) ?>
                                    <?= $form->field($userModel, 'email')->textInput(['maxlength' => true, 'type' => 'email', 'class' => 'form-control']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="mb-2 ps-3">
                                    <h5>Informasi Siswa</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <?= $form->field($model, 'nis')->textInput(['maxlength' => true]) ?>
                                    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
                                    <?= $form->field($model, 'kelas')->dropDownList(
                                        [
                                            'XII RPL A' => 'XII RPL A',
                                            'XII RPL B' => 'XII RPL B',
                                            'XII RPL C' => 'XII RPL C',
                                        ],
                                        ['prompt' => 'Pilih Kelas', 'class' => 'form-control']
                                    ) ?>
                                    <?= $form->field($model, 'pembimbing_id')->dropDownList(Pembimbing::getList(), ['prompt' => 'Pilih Pembimbing']) ?>
                                    <?= $form->field($model, 'dudi_id')->dropDownList(Dudi::getList(), ['prompt' => 'Pilih Tempat Dudi']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success float-end']) ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>