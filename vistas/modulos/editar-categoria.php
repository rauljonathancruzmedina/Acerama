<?php
  
  if ($_SESSION["perfil"] == "Vendedor") {
    
    echo '<script>

    window.location ="home";

     </script>';

  }

?>
<!-- Main content -->
<div class="content-wrapper">
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Editar Categoría</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item active text-danger">Editar Categoría</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>

    <section class="content">
      <div class="container-fluid">
      
        <div class="card card-outline card-danger">
          <div class="card-header">

            <a href="categorias" class="btn btn-danger float-sm-right" class="nav-link">
              <ion-icon name="add-outline"></ion-icon>
              <h5>
                Volver
              </h5>
            </a>

          </div>



          <!--========================================== 
                          CONTENIDO 
            ==========================================-->
          <?php
          $idCt = $_GET["idCategoria"];

          $item = "id";
            $valor = $idCt;

            $categorias = ControladorCategorias::ctrMostrarCategoria($item, $valor);

         echo '<div class="card-body">
              <form role="form" method="post" >
            <div class="row">
              
              <div class="col-lg-12">


                <!-- ENTRADA PARA NOMBRE -->

                <label>Categoría</label>

                <div class="input-group mb-3">

                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  
                  <input type="text" class="form-control" name="editarNombre" id="editarNombre" value="'.$categorias["nombre"].'" required>
                </div>
                <input type="hidden" name="idCategoria" id="idCategoria" value="'.$categorias["id"].'">
                
              <button type="submit" class="btn btn-success btn-block">Guardar categoría</button>
              
            </div>';
            ?>
                <?php

                  $editarCategoria = new ControladorCategorias();
                  $editarCategoria -> ctrEditarCategoria();

                ?>
            </form>

          </div>

        </div>
        
      </div>
      <!-- /.container-fluid -->
    </section>

</div>   

