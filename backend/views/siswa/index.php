<?php

use common\models\Mobil;
use common\models\Siswa;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Siswa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="card-header">
                                <div class="card-title"><?= Html::encode($this->title) ?></div>
                                <div class="card-tools" style="float: right;">
                                    <?= Html::a('<span class="btn-label"><i class="fa fa-plus"></i></span> Data Baru', ['create'], ['class' => 'btn btn-success']) ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <?= GridView::widget([
                                            'dataProvider' => $dataProvider,
                                            'columns' => [
                                                ['class' => 'yii\grid\SerialColumn'],
                                                'nis',
                                                'nama',
                                                'kelas',
                                                ['attribute' => 'pembimbing.nama', 'format' => 'raw', 'label' => 'Pembimbing'],
                                                ['attribute' => 'dudi.nama', 'format' => 'raw', 'label' => 'Dudi'],
                                                [
                                                    'class'     => 'yii\grid\ActionColumn',
                                                    'header'    => 'Action',
                                                    'template'  => '{leadUpdate} {leadDelete} {leadView}',
                                                    'buttons'   => [
                                                        'leadUpdate'    => function ($url, $model) {
                                                            $url = Url::to(['update', 'id' => $model->id]);
                                                            return Html::a('<span class="nav-icon fas fa-edit"></span>', $url, [
                                                                'class' => 'btn btn-info btn-sm'
                                                            ]);
                                                        },
                                                        'leadView'    => function ($url, $model) {
                                                            $url = Url::to(['view', 'id' => $model->id]);
                                                            return Html::a('<span class="nav-icon fas fa-eye"></span>', $url, [
                                                                'class' => 'btn btn-warning btn-sm'
                                                            ]);
                                                        },
                                                        'leadDelete'    => function ($url, $model) {
                                                            $url = Url::to(['delete', 'id' => $model->id]);
                                                            return Html::a('<span class="nav-icon fas fa-trash"></span>', $url, [
                                                                'title'     => 'delete',
                                                                'data-confrim'  => Yii::t('yii', 'Anda Yakin Ingin Menghapus Data Ini?'),
                                                                'data-method'   => 'post',
                                                                'class'         => 'btn btn-danger btn-sm',
                                                            ]);
                                                        }
                                                    ]
                                                ]
                                            ],
                                        ]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>