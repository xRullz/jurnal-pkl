<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */

$this->title = 'Detail User: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Data User', 'url' => ['index']];
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
                                'username',
                                'email',
                                'role',
                                [
                                    'attribute' => 'status',
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        if ($model->status == 10) {
                                            return Html::tag('span', 'Aktif', ['class' => 'badge badge-success']);
                                        } elseif ($model->status == 9) {
                                            return Html::tag('span', 'Tidak Aktif', ['class' => 'badge badge-danger']);
                                        }
                                        return 'Status Tidak Dikenal';
                                    },
                                ],
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>