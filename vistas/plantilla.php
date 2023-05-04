
<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php
       
   $item = "id";
   $valor = 1;
   $empresa = ControladorEmpresa::ctrMostrarEmpresa($item, $valor);

   echo '<title>'.$empresa["nombre"].'</title>';

   ?>

  <link rel="icon" href="vistas/img/plantilla/icon.jpg">
  <!-- ======================================== 
            PLUGINS DE CSS
  ========================================-->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">

    <!-- daterange picker -->
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">
   <link rel="stylesheet" href="vistas/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
  <link rel="stylesheet" href="vistas/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="vistas/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> 
  <!-- Theme style <--></-->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">
  <link rel="stylesheet" href="vistas/plugins/morris.js/morris.css">



  
  <!-- ======================================== 
            PLUGINS DE JAVAACRIPT
  ========================================-->

      <!-- jQuery -->
    <script src="vistas/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  
        <!-- DataTables  & Plugins -->
    <script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="vistas/plugins/jszip/jszip.min.js"></script>
    <script src="vistas/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="vistas/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
     <!-- Bootstrap4 Duallistbox -->
    <script src="vistas/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="vistas/plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="vistas/plugins/moment/moment.min.js"></script>
    <!-- date-range-picker -->
    <script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Bootstrap Switch -->
    <script src="vistas/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="vistas/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="vistas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Select2 -->
    <script src="vistas/plugins/select2/js/select2.full.min.js"></script>
    
    <script src="vistas/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="vistas/plugins/toastr/toastr.min.js"></script>
    
     <!-- jQuery Number -->
    <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>
    
    <!-- FLOT CHARTS -->
    <script src="vistas/plugins/morris.js/morris.min.js"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="vistas/plugins/raphael/raphael.min.js"></script>
    <!-- ChartJS -->
    <script src="vistas/plugins/chart.js/Chart.min.js"></script>
     <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="vistas/dist/js/demo.js"></script>

    </head>




<?php
    
   $ite = "id";
   $valo = 1;
   $empress = ControladorEmpresa::ctrMostrarEmpresa($ite, $valo);  

  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
    echo '<body class="hold-transition '.$empress["color"].'-mode sidebar-collapse sidebar-mini">';
     echo '<div class="wrapper">';

    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/cabezera.php";

    /*=============================================
    MENU
    =============================================*/

    include "modulos/menu.php";

    /*=============================================
    CONTENIDO 
    =============================================*/

    if(isset($_GET["ruta"])){

      if($_GET["ruta"] == "home" ||
         $_GET["ruta"] == "usuarios" ||
         $_GET["ruta"] == "categorias" ||
         $_GET["ruta"] == "editar-categoria" ||
         $_GET["ruta"] == "agregar-categorias" ||
         $_GET["ruta"] == "productos" ||
         $_GET["ruta"] == "clientes" ||
         $_GET["ruta"] == "ventas" ||
         $_GET["ruta"] == "crear-venta" ||
         $_GET["ruta"] == "editar-venta" ||
         $_GET["ruta"] == "ver-venta" ||
         $_GET["ruta"] == "reportes" ||
         $_GET["ruta"] == "empresa" ||
         $_GET["ruta"] == "agregar-usuarios" ||
         $_GET["ruta"] == "agregar-cliente" ||
         $_GET["ruta"] == "editar-usuario" ||
         $_GET["ruta"] == "agregar-productos" ||
         $_GET["ruta"] == "reportes" ||
         $_GET["ruta"] == "editar-producto" ||
         $_GET["ruta"] == "editar-cliente" ||
         $_GET["ruta"] == "cotizacion" ||
         $_GET["ruta"] == "crear-cotizacion" ||
         $_GET["ruta"] == "editar-cotizacion" ||
         $_GET["ruta"] == "tickt" ||
         $_GET["ruta"] == "imprimirtickt" ||
         $_GET["ruta"] == "salir"){

        include "modulos/".$_GET["ruta"].".php";

      }else{

        include "modulos/404.php";

      }

    }else{

      include "modulos/home.php";

    }

    /*=============================================
    FOOTER
    =============================================*/

    include "modulos/footer.php";
    echo '</body>';
    echo '</div>';

  }else{
    echo '<body class="hold-transition light-mode sidebar-collapse sidebar-mini login-page">';
    include "modulos/login.php";
    echo '</body>';
  }

  ?>


<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/empresa.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/categoria.js"></script>
<script src="vistas/js/ventas.js"></script>
<script src="vistas/js/reportes.js"></script>
<script src="vistas/js/cotizacion.js"></script>






</html>
