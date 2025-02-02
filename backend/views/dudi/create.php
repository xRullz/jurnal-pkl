<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Tambah Dudi';
$this->params['breadcrumbs'][] = ['label' => 'Data Dudi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
