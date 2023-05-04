<?php
  
  if ($_SESSION["perfil"] == "Vendedor" || $_SESSION["perfil"] == "Sub administrador" ) {
    
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

            <h1>Agregar Usuarios</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item"><a href="usuarios">Usuarios</a></li>

              <li class="breadcrumb-item active text-danger">Agregar usuarios</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>

    <section class="content">
      <div class="container-fluid">
      
        <div class="card card-outline card-danger">
          <div class="card-header">

            <a href="usuarios" class="btn btn-danger float-sm-right" class="nav-link">
              <ion-icon name="add-outline"></ion-icon>
              <h5>
                Volver
              </h5>
            </a>

          </div>



          <!--========================================== 
                          CONTENIDO 
            ==========================================-->
          <div class="card-body">
              <form role="form" method="post" enctype="multipart/form-data">
            <div class="row">
              
              <div class="col-md-7">


                <!-- ENTRADA PARA NOMBRE -->

                <label>Nombre / usuario</label>

                <div class="input-group mb-3">

                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  
                  <input type="text" class="form-control" name="nuevoNombre" placeholder="Ingresar nombre" required>
                </div>


                <!-- ENTRADA PARA USUARIO -->

                <label>Usuario</label>

                <div class="input-group mb-3">
                  
                    <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>

                  <input type="text" class="form-control" name="nuevoUsuario" id="nuevoUsuario" placeholder="Ingresar usuario" required>
                </div>


                <!-- ENTRADA PARA CONTRASEÑA -->

                <label>Contraseña</label>

                <div class="input-group mb-3">
                  
                    <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>

                  <input type="password" class="form-control" name="nuevoPassword" placeholder="Ingresar contraseña" required>
                </div>

                <!-- ENTRADA PARA PERFIL -->

                <label>Perfil</label>

                <div class="input-group mb-3">

                    <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>

                    <select class="form-control select2 select2-danger input-lg" data-dropdown-css-class="select2-danger" name="nuevoPerfil">
                      
                      <option value="Administrador">Administrador</option>
                      <option value="Sub administrador">Sub administrador</option>
                      <option value="Vendedor">Vendedor</option>
                      
                    </select>

                </div>
                
                
              </div>


              <!--========================================== 
                              FOTO
            ==========================================-->


              <div class="col-md-5">

                <!-- ENTRADA PARA FOTO -->

                <label>Foto de perfil</label>

                  <div class="panel" style="padding-left: 200px;">SUBIR FOTO</div> 

                  <div class="form-group">
                    <img src="vistas/img/usuarios/uno.jpg" class="img-fuld img-responsive previsualizar" style="max-width:100%;width:400px;height:250px;">
                    <div class="input-group" >
                      <div class="custom-file">
                        <input type="file" class="nuevaFoto" name="nuevaFoto">
                        <label class="custom" for="exampleInputFile"></label>
                      </div>
                    </div>
                  </div>
 
                
              </div>

              <button type="submit" class="btn btn-success btn-block">Guardar usuario</button>
              
            </div>

                <?php

                  $crearUsuario = new ControladorUsuarios();
                  $crearUsuario -> contrCrearUsuario();

                ?>
            </form>

          </div>

        </div>
        
      </div>
      <!-- /.container-fluid -->
    </section>

</div>   

