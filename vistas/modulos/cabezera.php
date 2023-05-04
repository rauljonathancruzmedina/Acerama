
  <!-- Navbar -->
  <?php

    $ite = "id";
   $valo = 1;
   $empress = ControladorEmpresa::ctrMostrarEmpresa($ite, $valo);

   if ($empress["color"] == "dark") {

    $color = "blue";

   } else {

    $color = "red";

   }

   echo '<nav class="main-header navbar navbar-expand navbar-'.$color.'">';

   ?>
  
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="modal" data-target="#Configuracion">
          <i class="fas fa-cogs"></i>
        </a>
      </li>

    </ul>

    

<!--=====================================
  BARRA DE NAVEGACIÓN
  ======================================-->
  <nav class="navbar navbar-static-top" role="navigation">
    
    <!-- Botón de navegación -->

    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          
          <span class="sr-only">Toggle navigation</span>
        
        </a>

    <!-- perfil de usuario -->

    <div class="navbar-custom-menu">
        
      <ul class="nav navbar-nav">
        
        <li class="dropdown user user-menu">
          
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">

            <?php

            if ($_SESSION["foto"] != "") {
              
              echo '<img src="'.$_SESSION["foto"].'" class="user-image img-circle">';

            }else{
              
              echo '<img src="vistas/img/usuarios/uno.jpg" class="user-image img-circle">';

            }

            ?>

            <span class="hidden-xs text-warning"><?php echo $_SESSION["nombre"]; ?></span>

          </a>

          <!-- Dropdown-toggle -->

          <ul class="dropdown-menu">
            
            <li class="user-body">
              
              <div class="pull-right">
                
                <a href="salir" class="btn btn-danger btn-flat text-danger" style="background-color: #E12E1C">Salir</a>

              </div>

            </li>

          </ul>


        </li>

      </ul>

    </div>

  </nav>

</nav>
  
    <!-- ========================================= 
              MODAL CONFIGURACION 
      ========================================= -->
  
    <div class="modal fade" id="Configuracion">

        <div class="modal-dialog">

          <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

            <div class="modal-header" >

              <h4 class="modal-title col-11 text-center">Personalización</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

            <div class="modal-body">

              <label>Elegir color</label>

                    <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fas fa-palette"></i></span>
                    </div>

                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="nuevoColor">
                      
                      <option value="dark">Oscuro</option>
                      <option value="light">Claro</option>
                      
                    </select>

                    <input type="hidden" name="idColor" value="1">

            </div>

            <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-header" >

              <button type="button" class="btn btn-danger fa fa-close " data-dismiss="modal"> Salir</button>

              <button type="submit" class="btn btn-success">Guardar cambios</button>
            
            </div>

            <?php

              $editarColor = new ControladorEmpresa();
              $editarColor -> ctrCambioColor();

            ?> 

          </form>

          </div>
          
        </div>
        
      </div>