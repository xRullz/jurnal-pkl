<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>
<div class="container mt-4" style="max-width: 400px; margin: auto; padding: 20px;">
    <div class="card mt-5" style="border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="site-login">
            <div class="card-header" style="text-align: center; background-color: #007bff; color: white; padding: 15px; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                <h1 style="margin: 0; font-size: 24px;"><?= Html::encode($this->title) ?></h1>
                <h4 style="margin: 5px 0; font-weight: normal;">Aplikasi Pencatatan Kegiatan PKL</h4>
            </div>
            <div class="card-body" style="padding: 20px;">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <div class="form-group" style="margin-bottom: 15px;">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'style' => 'width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ced4da;'])->label(false) ?>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <?= $form->field($model, 'password')->passwordInput(['style' => 'width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ced4da;'])->label(false) ?>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <?= $form->field($model, 'rememberMe')->checkbox(['style' => 'margin-right: 5px;'])->label('Remember Me') ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button', 'style' => 'padding: 10px; border-radius: 4px;']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>