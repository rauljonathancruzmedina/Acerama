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

            <h1>Categorías</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item active text-danger">Categorías</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->
    <section class="content">
      
      <div class="card card-outline card-danger">
        <div class="card-header">
          
          <a href="agregar-categorias" class="btn btn-primary" class="nav-link">
            <ion-icon name="add-outline"></ion-icon>
            <h5>
              Agregar Categorías
            </h5>
          </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped tablas">
            <thead>

            <tr class="bg-info">
              <th style="width:10px">id</th>
              <th class="text-uppercase">Categoria</th>
              <th class="text-uppercase">Acciones</th>
            </tr>

            </thead>

            <tbody>

            
              <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategoria($item, $valor);

               foreach ($categorias as $key => $value){
                 
                  echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["nombre"].'</td>';            

                          echo '
                          <td>

                            <div class="btn-group">

                              <button class="btn btn-primary btnEditarCategoria" idCategoria="'.$value["id"].'"><i class="fas fa-pencil-alt"></i></button>';
                              if ($_SESSION["perfil"] == "Administrador") {
                            
                            echo  '<button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-trash"></i></button>';
                            }

                            echo '</div>  

                          </td>

                        </tr>';
                }


        ?> 

                              
            </tbody>

          </table>

        </div>
        <!-- /.card-body -->
      </div>

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php
     $borrarCategoria = new ControladorCategorias();
     $borrarCategoria -> ctrBorrarCategoria();
?>