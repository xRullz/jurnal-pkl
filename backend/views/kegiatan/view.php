<?php

use common\models\Siswa;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */

$this->title = 'Kegiatan ' . $model->siswa->nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$user = Yii::$app->user->identity;
$siswa = Siswa::find()->where(['user_id' => $user->id])->one();
?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
                        <div class="card-tools">
                            <?php if ($user->role == 'siswa') : ?>
                                <?= Html::a('Lihat Semua', ['index'], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger btn-sm',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            <?php else : ?>
                                <?= Html::a('Lihat Semua', ['index'], ['class' => 'btn btn-success btn-sm']) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                ['attribute' => 'siswa.nama', 'format' => 'raw', 'label' => 'Siswa'],
                                ['attribute' => 'tanggal', 'format' => 'date', 'label' => 'Tanggal'],
                                'kehadiran',
                                [
                                    'attribute' => 'keterangan',
                                    'visible' => $model->kehadiran !== 'hadir',
                                ],
                                'kegiatan',
                                'catatan',
                                [
                                    'attribute' => 'bukti',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        $imagePath = Yii::getAlias('@webroot/' . $model->bukti);
                                        if (file_exists($imagePath)) {
                                            return '<img src="' . Yii::getAlias('@web/' . $model->bukti) . '" width="150" alt="Bukti Hadir">';
                                        } else {
                                            return 'Gambar tidak ditemukan';
                                        }
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