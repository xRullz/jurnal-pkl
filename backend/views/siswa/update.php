<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Siswa $model */

$this->title = 'Update Siswa: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nis, 'url' => ['view', 'no_mobil' => $model->nis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3"><?= Html::encode($this->title) ?></h3>
        </div>
        <?= $this->render('_form', [
            'model' => $model,
            'userModel' => $userModel,
        ]) ?>

    </div>
</div>