<?php

use backend\assets\AppAsset;
use common\models\Pembimbing;
use common\models\Siswa;
use yii\bootstrap5\Html;

AppAsset::register($this);
$this->registerJs(<<<JS
    WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
            families: [
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ["assets/css/fonts.min.css"]
        },
        active: function () {
            sessionStorage.fonts = true;
        }
    });
JS, \yii\web\View::POS_END);
$user = Yii::$app->user->identity;
$siswa = Siswa::find()->where(['user_id' => $user->id])->one();
$pembimbing = Pembimbing::find()->where(['user_id' => $user->id])->one();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>

<body>
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header mt-4 mb-4" data-background-color="dark">
                    <a href="<?= Yii::$app->homeUrl ?>" class="logo">
                        <img src="<?= Yii::getAlias('@web') ?>/img/logo.png" alt="navbar brand" class="mt-4 mb-4" width="80px" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item <?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>">
                            <a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <?php if ($user->role == 'admin') : ?>
                            <li class="nav-item <?= Yii::$app->controller->id == 'user' ? 'active' : '' ?>">
                                <a href="<?= Yii::$app->urlManager->createUrl(['user/index']) ?>">
                                    <i class="fas fa-users"></i>
                                    <p>Data User</p>
                                </a>
                            </li>
                            <li class="nav-item <?= Yii::$app->controller->id == 'siswa' ? 'active' : '' ?>">
                                <a href="<?= Yii::$app->urlManager->createUrl(['siswa/index']) ?>">
                                    <i class="fas fa-user-graduate"></i>
                                    <p>Data Siswa</p>
                                </a>
                            </li>
                            <li class="nav-item <?= Yii::$app->controller->id == 'pembimbing' ? 'active' : '' ?>">
                                <a href="<?= Yii::$app->urlManager->createUrl(['pembimbing/index']) ?>">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    <p>Data Pembimbing</p>
                                </a>
                            </li>
                            <li class="nav-item <?= Yii::$app->controller->id == 'dudi' ? 'active' : '' ?>">
                                <a href="<?= Yii::$app->urlManager->createUrl(['dudi/index']) ?>">
                                    <i class="fas fa-building"></i>
                                    <p>Data Dudi</p>
                                </a>
                            </li>
                            <li class="nav-item <?= Yii::$app->controller->id == 'kegiatan' ? 'active' : '' ?>">
                                <a href="<?= Yii::$app->urlManager->createUrl(['kegiatan/index']) ?>">
                                    <i class="fas fa-calendar-alt"></i>
                                    <p>Kegiatan</p>
                                </a>
                            </li>
                        <?php elseif ($user->role == 'pembimbing') : ?>
                            <li class="nav-item <?= Yii::$app->controller->id == 'siswa' ? 'active' : '' ?>">
                                <a href="<?= Yii::$app->urlManager->createUrl(['siswa/index']) ?>">
                                    <i class="fas fa-user-graduate"></i>
                                    <p>Data Siswa</p>
                                </a>
                            </li>
                            <li class="nav-item <?= Yii::$app->controller->id == 'dudi' ? 'active' : '' ?>">
                                <a href="<?= Yii::$app->urlManager->createUrl(['dudi/index']) ?>">
                                    <i class="fas fa-building"></i>
                                    <p>Data Dudi</p>
                                </a>
                            </li>
                            <li class="nav-item <?= Yii::$app->controller->id == 'kegiatan' ? 'active' : '' ?>">
                                <a href="<?= Yii::$app->urlManager->createUrl(['kegiatan/index']) ?>">
                                    <i class="fas fa-calendar-alt"></i>
                                    <p>Kegiatan</p>
                                </a>
                            </li>
                        <?php elseif ($user->role == 'siswa') : ?>
                            <li class="nav-item <?= Yii::$app->controller->id == 'kegiatan' ? 'active' : '' ?>">
                                <a href="<?= Yii::$app->urlManager->createUrl(['kegiatan/index']) ?>">
                                    <i class="fas fa-calendar-alt"></i>
                                    <p>Kegiatan</p>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="<?= Yii::getAlias('@web') ?>/img/profile.jpg" alt="navbar brand"
                                class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <?php if ($user->role == 'pembimbing') { ?>
                                    <strong>Logout</strong> (<?= $pembimbing->nama ?>)
                                <?php } elseif ($user->role == 'siswa') { ?>
                                    <strong>Logout</strong> (<?= $siswa->nama ?>)
                                <?php } else { ?>
                                    <strong>Logout</strong> (<?= $user->username ?>)
                                <?php } ?>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex']) ?>
                                <?= Html::submitButton(
                                    '<i class="fas fa-sign-out-alt"></i>',
                                    ['class' => 'dropdown-item text-decoration-none', 'style' => 'border: none; background: none;']
                                ) ?>
                                <?= Html::endForm(); ?>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
            <?= $content ?>
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between">
                        <nav class="pull-left">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="https://pkncoal.com/">
                                        Kegiatan PKL
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
        <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
