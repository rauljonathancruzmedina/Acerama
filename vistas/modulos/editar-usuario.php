<?php
  
  if ($_SESSION["perfil"] == "Vendedor" || $_SESSION["perfil"] == "Sub administrador") {
    
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

            <h1>Editar Usuarios</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item"><a href="usuarios">Usuarios</a></li>

              <li class="breadcrumb-item active text-danger">Editar usuarios</li>

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

            <?php

      		$idUs = $_GET["idUsuario"];

      		$item = "id";
            $valor = $idUs;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);


         echo ' <div class="card-body">
              <form role="form" method="post" enctype="multipart/form-data">
            <div class="row">
              
              <div class="col-md-7">


                <!-- ENTRADA PARA NOMBRE -->

                <label>Nombre</label>

                <div class="input-group mb-3">

                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>

                  <input type="hidden" class="form-control" value="'.$usuarios["id"].'" name="editarId" id="editarId" required>

                  <input type="text" class="form-control" value="'.$usuarios["nombre"].'" name="editarNombre" id="editarNombre" required>
                </div>


                <!-- ENTRADA PARA USUARIO -->

                <label>Usuario</label>

                <div class="input-group mb-3">
                  
                    <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>

                  <input type="text" class="form-control" value="'.$usuarios["usuario"].'" id="editarUsuario" name="editarUsuario" readonly>
                </div>


                <!-- ENTRADA PARA CONTRASEÑA -->

                <label>Contraseña</label>

                <div class="input-group mb-3">
                  
                    <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>

                  <input type="password" class="form-control" placeholder="Escriba la nueva contraseña" name="editarPassword" id="editarPassword" >

                  <input type="hidden" class="form-control" placeholder="Escriba la nueva contraseña" name="passwordActual" id="passwordActual" value="'.$usuarios["password"].'" >

                </div>

                <!-- ENTRADA PARA PERFIL -->

                <label>Perfil</label>

                <div class="input-group mb-3">

                    <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>

                    <select class="form-control select2 select2-danger input-lg" data-dropdown-css-class="select2-danger" name="editarPerfil" id="editarPerfil">
                      
                      <option value="'.$usuarios["perfil"].'">'.$usuarios["perfil"].'</option>
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

                  <div class="form-group">';

                  if ($usuarios["foto"] != "") {

                  	echo '<img src="'.$usuarios["foto"].'" class="img-fuld img-responsive previsualizar" style="max-width:100%;width:400px;height:250px;">';
                  	
                  }else{

                  	echo '<img src="vistas/img/usuarios/uno.jpg" class="img-fuld img-responsive previsualizar" style="max-width:100%;width:400px;height:250px;">';

                  }

                  echo '<input type="hidden" name="fotoActual" id="fotoActual" value="'.$usuarios["foto"].'">';
                    
                   echo ' <div class="input-group" >
                      <div class="custom-file">
                        <input type="file" class="nuevaFoto" name="editarFoto">
                        <label class="custom" for="exampleInputFile"></label>
                      </div>
                    </div>
                  </div>
 
                
              </div>

              <button type="submit" class="btn btn-success btn-block">Modificar usuario</button>
              
            </div>';

          ?>


                <?php

                	$editUsuario = new ControladorUsuarios();
                	$editUsuario -> contrEditarUsuario();

                ?>
            </form>

          </div>

        </div>
        
      </div>
      <!-- /.container-fluid -->
    </section>

</div>   

