<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Mobil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
                        <div class="card-tools">
                            <?= Html::a('Lihat Semua', ['index'], ['class' => 'btn btn-success btn-sm']) ?>
                            <?= Html::a('Edit', ['update', 'nis' => $model->nis], ['class' => 'btn btn-primary btn-sm']) ?>
                            <?= Html::a('Hapus', ['delete', 'nis' => $model->nis], [
                                'class' => 'btn btn-danger btn-sm',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'nis',
                                'nama',
                                ['attribute' => 'pembimbing.nama', 'format' => 'raw', 'label' => 'Pembimbing'],
                                ['attribute' => 'dudi.nama', 'format' => 'raw', 'label' => 'Dudi'],
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>