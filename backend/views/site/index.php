<?php

/** @var yii\web\View $this */

use common\models\Pembimbing;
use common\models\Siswa;

$this->title = 'Kegiatan PKL';
$user = Yii::$app->user->identity;
$siswa = Siswa::find()->where(['user_id' => $user->id])->one();
$pembimbing = Pembimbing::find()->where(['user_id' => $user->id])->one();
?>
<div class="container">
    <div class="page-inner">
        <h1>SMK Negeri 1 Jenangan</h1>
        <h3>Aplikasi Pencatatan Kegiatan PKL</h3>
        <?php if ($user->role == 'admin') : ?>
            <p>Selamat datang <?= $user->username ?></p>
        <?php elseif ($user->role == 'pembimbing') : ?>
            <p>Selamat datang <?= $pembimbing->nama ?></p>
        <?php elseif ($user->role == 'siswa') : ?>
            <p>Selamat datang <?= $siswa->nama ?></p>
        <?php endif; ?>
    </div>
</div>