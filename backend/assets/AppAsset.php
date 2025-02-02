<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'template/assets/css/bootstrap.min.css',
        'template/assets/css/plugins.min.css',
        'template/assets/css/kaiadmin.min.css',
        'template/assets/css/fonts.min.css',
        // 'css/site.css',
    ];
    public $js = [
        'template/assets/js/plugin/webfont/webfont.min.js',
        'template/assets/js/core/jquery-3.7.1.min.js',
        'template/assets/js/core/popper.min.js',
        'template/assets/js/core/bootstrap.min.js',
        'template/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js',
        'template/assets/js/plugin/chart.js/chart.min.js',
        'template/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js',
        'template/assets/js/plugin/chart-circle/circles.min.js',
        'template/assets/js/plugin/datatables/datatables.min.js',
        'template/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js',
        'template/assets/js/plugin/jsvectormap/jsvectormap.min.js',
        'template/assets/js/plugin/jsvectormap/world.js',
        'template/assets/js/plugin/sweetalert/sweetalert.min.js',
        'template/assets/js/kaiadmin.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap5\BootstrapAsset',
    ];
}
