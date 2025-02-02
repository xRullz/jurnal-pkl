<?php

use common\models\Dudi;
use common\models\Pembimbing;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"><?= Html::encode($this->title) ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                    <div class="form-group">
                        <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'type' => 'email', 'class' => 'form-control']) ?>
                        <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true, 'class' => 'form-control'])->label('Password') ?>
                        <?= $form->field($model, 'role')->dropDownList(['admin' => 'Admin', 'pembimbing' => 'Pembimbing', 'siswa' => 'Siswa'], ['prompt' => 'Pilih Role']) ?>
                        <?= $form->field($model, 'status')->dropDownList([9 => 'Non Aktif', 10 => 'Aktif'], ['prompt' => 'Pilih Status']) ?>
                    </div>
                    <div class="card-action">
                        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>