<?php
  
  if ($_SESSION["perfil"] == "Vendedor" || $_SESSION["perfil"] == "Sub administrador" ) {
    
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

            <h1>Usuarios</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item active text-danger">Usuarios</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->
    <section class="content">
      
      <div class="card card-outline card-danger">
        <div class="card-header">
          
          <a href="agregar-usuarios " class="btn btn-primary" class="nav-link">
            <ion-icon name="add-outline"></ion-icon>
            <h5>
              Agregar usuarios
            </h5>
          </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered dt-responsive table-striped tablas" width="100%">
            <thead>

            <tr class="bg-primary">
              <th style="width:10px">id</th>
              <th class="text-uppercase">Nombre</th>
              <th class="text-uppercase">Usuario</th>
              <th class="text-uppercase">Foto</th>
              <th class="text-uppercase">Perfil</th>
              <th class="text-uppercase">Estado</th>
              <th class="text-uppercase">Ultimo login</th>
              <th class="text-uppercase">Acciones</th>
            </tr>

            </thead>

            <tbody>

            
              <?php

                $item = null;
                $valor = null;

                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

               foreach ($usuarios as $key => $value){
                 
                  echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["nombre"].'</td>
                          <td>'.$value["usuario"].'</td>';

                          if($value["foto"] != ""){

                            echo '<td><img src="'.$value["foto"].'" class="img-thumbnail img-circle" width="60px"></td>';

                          }else{

                            echo '<td><img src="vistas/img/usuarios/uno.jpg" class="img-thumbnail img-circle" width="60px"></td>';

                          }

                          echo '<td>'.$value["perfil"].'</td>';

                          if($value["estado"] != 0){

                            echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                          }else{

                            echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                          }             

                          echo '<td>'.$value["ultimo_login"].'</td>
                          
                          <td>

                            <div class="btn-group">

                              <button class="btn btn-primary btnEditarUsuario" idUsuario="'.$value["id"].'"><i class="fas fa-pencil-alt"></i></button>

                              <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-trash"></i></button>

                            </div>  

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

      $borrarUsuarios = new ControladorUsuarios();
      $borrarUsuarios -> contrBorrarUsuario();

  ?>

