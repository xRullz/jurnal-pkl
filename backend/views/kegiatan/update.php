<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Pembimbing $model */

$this->title = 'Update Kegiatan: ' . $model->siswa->nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3"><?= Html::encode($this->title) ?></h3>
        </div>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>