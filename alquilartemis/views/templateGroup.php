<?php
/* capturar las rutas de la url */

$routesArray = explode("/", $_SERVER['REQUEST_URI']);
$routesArray = array_filter($routesArray);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Fixed Sidebar</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="views/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="views/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="views/assets/plugins/adminlte/css/adminlte.min.css?v=3.2.0">
    <link rel="stylesheet" href="views/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="views/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="views/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- jQuery -->
    <script src="views/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="views/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="views/assets/plugins/adminlte/js/adminlte.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="views/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="views/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="views/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="views/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="views/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="views/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="views/assets/plugins/jszip/jszip.min.js"></script>
    <script src="views/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="views/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="views/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="views/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="views/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <?php include "views/modules/navbar.php"; ?>
        <?php include "views/modules/sidebar.php"; ?>

        <div class="content-wrapper">
            <?php
            /* echo "<pre>";
            print_r($routesArray);
            echo "<pre>";
 */


            if (!empty($routesArray[3])) {
                if (
                    $routesArray[3] == "clientes" ||
                    $routesArray[3] == "empleados" ||
                    $routesArray[3] == "entrada" ||
                    $routesArray[3] == "entradaDetalle" ||
                    $routesArray[3] == "inventario" ||
                    $routesArray[3] == "productos" ||
                    $routesArray[3] == "salida" ||
                    $routesArray[3] == "salidaDetalle"
                ) {
                    include "views/pages/" . $routesArray[3] . "/" . $routesArray[3] . ".php";
                }
            } else {
                include "views/pages/home/home.php";
            }

            ?>


            <!-- <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Fixed Layout</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Layout</a></li>
                            <li class="breadcrumb-item active">Fixed Layout</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section> -->
        </div>
        <?php include "views/modules/footer.php"; ?>
    </div>

</body>

</html>