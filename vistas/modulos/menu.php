 <!-- Main Sidebar Container -->
 <?php

    $ite = "id";
   $valo = 1;
   $empress = ControladorEmpresa::ctrMostrarEmpresa($ite, $valo);

   if ($empress["color"] == "dark") {

    $color = "blue";

   } else {

    $color = "red";

   }

   echo '<aside class="main-sidebar sidebar-'.$empress["color"].'-'.$color.' elevation-4">';

 ?>
  
    <!-- Brand Logo -->
    <a href="home" class="brand-link">
      <img src="vistas/img/plantilla/icon.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ACERAMA</span>
    </a>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Buscar">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="home" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p>
                  Inicio
                </p>
              </a>
            </li>
            

           <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Personas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <?php 
                 if ($_SESSION["perfil"] == "Administrador") {
            echo '<li class="nav-item">
                  <a href="usuarios" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Usuarios</p>
                  </a>
                </li>';
              }

           echo' <li class="nav-item">
                  <a href="clientes" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Clientes</p>
                  </a>
                </li>
              </ul>
            </li>';

            if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Sub administrador") {

        echo '<li class="nav-item">
              <a href="categorias" class="nav-link">
                <i class="nav-icon fa fa-th"></i> 
                <p>
                 Categorías
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="productos" class="nav-link">
                <i class="nav-icon fab fa-product-hunt"></i>
                <p>
                  Productos
                </p>
              </a>
            </li>';
          }
          ?>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
               <i class="fas fa-shopping-cart"></i> 
                <p>
                  Ventas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="crear-venta" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Crear venta</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="ventas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Administrar ventas</p>
                  </a>
                </li>

                 
            <?php
        if ($_SESSION["perfil"] == "Administrador") {

            echo'<li class="nav-item">
                  <a href="reportes" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reporte de Ventas</p>
                  </a>
                </li>';
                }
                  ?>
              </ul>
              </li>

            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
               <i class="fas fa-shopping-cart"></i> 
                <p>
                  Cotizaciónes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="crear-cotizacion" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Crear cotización</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cotizacion" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Administrar cotización</p>
                  </a>
                </li>
              </ul>
            </li>
      
        <?php
            if ($_SESSION["perfil"] == "Administrador") {
           
           echo '<li class="nav-item">
              <a class="nav-link btnEditarEmpresa" id="1">
                <i class="nav-icon fa fa-home"></i>
                <p>Empresa</p>
              </a>
            </li>';
          }
          ?>
        
        </ul>
      
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>