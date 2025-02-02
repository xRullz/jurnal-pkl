<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Pembimbing', 'url' => ['index']];
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
                            <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                            <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
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
                                'nama',
                                ['attribute' => 'user.email', 'format' => 'raw', 'label' => 'Email'],
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>