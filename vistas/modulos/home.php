<?php 

$fecha = ControladorEmpresa::ctrMostrarEmpresa("id", 1);
date_default_timezone_set('America/Mexico_City');
$hoy = date("Y-m-d");

$ruso = $fecha["fecha"];

?>

<div class="content-wrapper">

<section class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <h1>Inicio</h1>

      </div>

      <div class="col-sm-6">

        <ol class="breadcrumb float-sm-right">

          <li class="breadcrumb-item"><a href="home">Inicio</a></li>

          <li class="breadcrumb-item active">Vista Inicio</li>

        </ol>

      </div>

    </div>

  </div><!-- /.container-fluid -->

</section>

<section class="content">
  
  <div class="row">
  
  <?php

  if ($_SESSION["perfil"] == "Administrador") {
    
    include "inicio/cajas-superiores.php";

  }
  
  ?>

  </div>

  <div class="row">
    
    <div class="col-lg-12">
      
    <?php
    if ($_SESSION["perfil"] == "Administrador") {
   
    include "reportes/grafico-ventas.php";
    
    }
    ?>

    </div>
    
    <div class="col-lg-6">
      <?php

      include "reportes/productos-mas-vendidos.php";

      ?>

    </div>


    <div class="col-lg-6">
      <?php
      
      include "inicio/productos-recientes.php";

      ?>

    </div>

    <?php if ($ruso != $hoy):?>
        
       <script>
         
          $( document ).ready(function() {
              $('#Fecha').modal('toggle')
          });

       </script>

    <?php endif ?>

  </div>

</section>

</div>


<!-- ========================================= 
            MODAL CONFIGURACION 
    ========================================= -->

  <div class="modal fade" id="Fecha">

      <div class="modal-dialog">

        <div class="modal-content">

          <form role="form" method="post" enctype="multipart/form-data">

          <div class="modal-header" >

            <h4 class="modal-title col-11 text-center">Caja</h4>
            
          </div>

          <div class="modal-body">

            <label>Dinero en caja</label>

              <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                </div>
                
                <input type="number" class="form-control" name="DineroCaja" placeholder="Dinero en caja" required min="0.0" step="any">

              </div>

              <input type="hidden" name="idCaja" value="1">
              <input type="hidden" name="FechaCaja" value="<?php echo($hoy);  ?>">
              
          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-header" >

            <button type="submit" class="btn btn-success">Guardar cambios</button>
          
          </div>

          <?php

            $editarDinero = new ControladorEmpresa();
            $editarDinero -> ctrDineroCaja();

          ?> 

        </form>

        </div>
        
      </div>
      
    </div>
