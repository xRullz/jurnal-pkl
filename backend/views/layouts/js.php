<?php
$baseUrl = Yii::$app->request->baseUrl;
?>

<!--   Core JS Files   -->
<script src="<?= $baseUrl ?>/template/assets/backend/js/core/jquery-3.7.1.min.js"></script>
    <script src="<?= $baseUrl ?>/template/assets/backend/js/core/popper.min.js"></script>
    <script src="<?= $baseUrl ?>/template/assets/backend/js/core/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Datatables -->
    <script src="<?= $baseUrl ?>/template/assets/backend/js/plugin/datatables/datatables.min.js"></script>
    <!-- jQuery Scrollbar -->
    <script src="<?= $baseUrl ?>/template/assets/backend/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Chart JS -->
    <script src="<?= $baseUrl ?>/template/assets/backend/js/plugin/chart.js/chart.min.js"></script>
    <!-- jQuery Sparkline -->
    <script src="<?= $baseUrl ?>/template/assets/backend/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
    <!-- Chart Circle -->
    <script src="<?= $baseUrl ?>/template/assets/backend/js/plugin/chart-circle/circles.min.js"></script>
    <!-- Bootstrap Notify -->
    <script src="<?= $baseUrl ?>/template/assets/backend/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
    <!-- jQuery Vector Maps -->
    <script src="<?= $baseUrl ?>/template/assets/backend/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="<?= $baseUrl ?>/template/assets/backend/js/plugin/jsvectormap/world.js"></script>
    <!-- Sweet Alert -->
    <script src="<?= $baseUrl ?>/template/assets/backend/js/plugin/sweetalert/sweetalert.min.js"></script>
    <!-- Kaiadmin JS -->
    <script src="<?= $baseUrl ?>/template/assets/backend/js/kaiadmin.min.js"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable({});
        });
    </script>
