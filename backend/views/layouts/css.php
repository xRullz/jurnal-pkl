<?php
$baseUrl = Yii::$app->request->baseUrl;
?>
<link rel="shortcut icon" href="<?= $baseUrl ?>/template/assets/backend/img/kaiadmin/favicon.ico/images/banksekolah-favicon.ico" type="image/x-icon" />
<script src="<?= $baseUrl?>/template/assets/backend/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["assets/backend/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

<link rel="stylesheet" href="<?= $baseUrl?>/template/assets/backend/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?= $baseUrl?>/template/assets/backend/css/plugins.min.css" />
<link rel="stylesheet" href="<?= $baseUrl?>/template/assets/backend/css/kaiadmin.min.css" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">