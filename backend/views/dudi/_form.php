<?php

use common\models\Dudi;
use common\models\Pembimbing;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Dudi $model */
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
                        <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
                        <?= $form->field($model, 'alamat')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
                        <?= $form->field($model, 'no_telepon')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
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