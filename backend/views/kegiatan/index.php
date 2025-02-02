<?php

use common\models\Mobil;
use common\models\Siswa;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Kegiatan';
$this->params['breadcrumbs'][] = $this->title;
$user = Yii::$app->user->identity;
?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Data Kegiatan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php if ($user->role == 'siswa') : ?>
                            <div class="card-title"><?= Html::encode($this->title) ?></div>
                            <div class="card-tools" style="float: right;">
                                <?= Html::a('<span class="btn-label"><i class="fa fa-plus"></i></span> Data Baru', ['create'], ['class' => 'btn btn-success']) ?>
                            </div>
                        <?php else : ?>
                            <div class="card-title"><?= Html::encode($this->title) ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
                                        ['attribute' => 'siswa.nama', 'format' => 'raw', 'label' => 'Siswa'],
                                        ['attribute' => 'siswa.kelas', 'format' => 'raw', 'label' => 'Kelas'],
                                        'tanggal',
                                        'kehadiran',
                                        [
                                            'header' => 'Bukti',
                                            'attribute' => 'bukti',
                                            'format' => 'html',
                                            'value' => function ($model) {
                                                return '<img src="' . Yii::getAlias('@web/' . $model->bukti) . '" width="150" alt="Bukti Hadir">';
                                            },
                                        ],
                                        [
                                            'class'     => 'yii\grid\ActionColumn',
                                            'header'    => 'Action',
                                            'template'  => '{leadUpdate} {leadDelete} {leadView}',
                                            'buttons' => [
                                                'leadView' => function ($url, $model) {
                                                    $url = Url::to(['view', 'id' => $model->id]);
                                                    return Html::a('<span class="nav-icon fas fa-eye"></span>', $url, [
                                                        'class' => 'btn btn-warning btn-sm'
                                                    ]);
                                                },
                                                'leadUpdate' => function ($url, $model) {
                                                    // Cek apakah pengguna adalah siswa
                                                    if (Yii::$app->user->identity->role === 'siswa') {
                                                        $url = Url::to(['update', 'id' => $model->id]);
                                                        return Html::a('<span class="nav-icon fas fa-edit"></span>', $url, [
                                                            'class' => 'btn btn-info btn-sm'
                                                        ]);
                                                    }
                                                    return '';
                                                },
                                                'leadDelete' => function ($url, $model) {
                                                    // Cek apakah pengguna adalah siswa
                                                    if (Yii::$app->user->identity->role === 'siswa') {
                                                        $url = Url::to(['delete', 'id' => $model->id]);
                                                        return Html::a('<span class="nav-icon fas fa-trash"></span>', $url, [
                                                            'title'     => 'delete',
                                                            'data-confirm' => Yii::t('yii', 'Anda Yakin Ingin Menghapus Data Ini?'),
                                                            'data-method' => 'post',
                                                            'class'      => 'btn btn-danger btn-sm',
                                                        ]);
                                                    }
                                                    return '';
                                                }
                                            ]
                                        ]
                                    ],
                                ]); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
