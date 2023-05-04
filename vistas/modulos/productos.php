<?php
  
  if ($_SESSION["perfil"] == "Vendedor") {
    
    echo '<script>

    window.location ="home";

     </script>';

  }

?>


  <div class="content-wrapper">
    
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Productos</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item active text-danger">Productos</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->
    <section class="content">
      
     <div class="card card-outline card-danger">
       <div class="card-header">
          
          <a href="agregar-productos" class="btn btn-primary" class="nav-link">
            <ion-icon name="add-outline"></ion-icon>
            <h5>
              Agregar Productos
            </h5>
          </a>

       </div>
        <!-- /.card-header -->
        <div class="card-body ">
          <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%" >
            <thead>

            <tr class="bg-info">
              <th style="width:10px">id</th>
              <th class="text-uppercase">Descripción</th>
              <th class="text-uppercase">Marca</th>
              <th class="text-uppercase">Código</th>
              <th class="text-uppercase">N/serie</th>
              <th class="text-uppercase">Categoría</th>
              <th class="text-uppercase">Stock</th>
              <th class="text-uppercase">P/C</th>
              <th class="text-uppercase">P/V</th>
              <th class="text-uppercase">Imagen</th>
              <th class="text-uppercase">Acciones</th>
            </tr>

            </thead>

          </table>

          <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

        </div>
        <!-- /.card-body -->
      </div>

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php
     $eliminarProducto = new ControladorProductos();
     $eliminarProducto -> ctrEliminarProducto();
?>