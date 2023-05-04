  
  <div class="content-wrapper">
    
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Administrar ventas</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item active text-danger">Administrar Ventas</li>

            </ol>

          </div>

        </div>

      </div>

    </section>

    <section class="content">
      
     <div class="card card-outline card-danger">
       <div class="card-header">
           <?php 
            date_default_timezone_set('America/Mexico_City');

              $hoyCr = date("Y-m-d");

              $itemUsua ="id";
              $valorUsua = $_SESSION['id'];

              $respuestaUsua = ControladorUsuarios::ctrMostrarUsuarios($itemUsua, $valorUsua);
              
           ?>
          <div class="card-body row">
            
            <div class="col-md-2">
                    <a href="crear-venta" class="btn btn-primary" class="nav-link">
                      <ion-icon name="add-outline"></ion-icon>
                      <h5>
                        Agregar venta
                      </h5>
                    </a>
             </div>
              <div class="col-md-6">
                
              </div> 
             
             <div class="col-md-2">

               <button type="button" class="btn btn-outline-info btn-block " id="corteDelDia" fecha="<?php echo $hoyCr ?>" idUsuario=
                "<?php echo $respuestaUsua["id"] ?>"><i class="fas fa-coins"></i> Corte del dia</button>

              </div>
             <div class="col-md-2">
                <button type="button" class="btn btn-primary float-right pull-right" id="daterang-btn">
                
                <span>
                  <i class="far fa-calendar-alt"></i> Rango de fecha
                </span>
                  <i class="fas fa-caret-down"></i>

                </button>
            </div>



        </div>
          

          <?php 
          date_default_timezone_set('America/Mexico_City');

              $ite = "id";
              $valo = 1;
              $empressa = ControladorEmpresa::ctrMostrarEmpresa($ite, $valo);

              $diner = $empressa["caja"];

              $total = ControladorVentas::ctrMostrarVentas(null, null);

              $varible = 0;

              $hoy = date("Y-m-d");
              
              foreach ($total as $key => $value) {
                  
                  $fec = substr($value["fecha"], 0, -9);

                if ($fec == $hoy) {
                   
                   $varible += $value["total"];

                 } 

              }
              
              
        
           ?>

       </div>
        
        <div class="card-body ">
          <table id="example1" class="table table-bordered table-striped dt-responsive tablaV" width="100%" >
            <thead>

            <tr class="bg-info">
              <th style="width:10px">id</th>
               <th class="text-uppercase">Código factura</th>
               <th class="text-uppercase">Cliente</th>
               <th class="text-uppercase">Vendedor</th>     
               <th class="text-uppercase">Comentarios</th>  
               <th class="text-uppercase">Forma de pago</th>               
               <th class="text-uppercase">Neto</th>               
               <th class="text-uppercase">Total</th>               
               <th class="text-uppercase">Fecha</th>               
              <th class="text-uppercase">Acciones</th>
            </tr>

            </thead>

              <tbody>

                <?php 
                  
                  if (isset($_GET["fechaInicial"])) {
                    
                    $fechaInicial = $_GET["fechaInicial"];
                    $fechaFinal = $_GET["fechaFinal"];
                    
                  } else {
                    
                    $fechfinal = date("Y-m-d");
                    
                    $f= strtotime($fechfinal);

                    $nuevafecha = date("Y-m-d", strtotime("-1 month", $f));


                    $fechaInicial = $nuevafecha;
                    $fechaFinal = $fechfinal;  
                  }

                $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);
              
                foreach ($respuesta as $key => $value) {
          
                echo '<tr>
                  <td>'.($key+1).'</td>
          
                  <td>'.$value["codigo"].'</td>';

                  $itemCliente = "id";
                  $valorCliente = $value["id_cliente"];

                  $respuestaCliente = ControladorClientes::controMostrarClientes($itemCliente, $valorCliente);

                  echo '<td>'.$respuestaCliente["nombre"].'</td>';

                  $itemUsuario = "id";
                  $valorUsuario = $value["id_vendedor"];

                  $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);
          
                  echo '<td>'.$respuestaUsuario["nombre"].'</td>
          
                  <td>'.$value["comentario"].'</td>
          
                  <td>'.$value["metodo_pago"].'</td>
          
                  <td>'.number_format($value["neto"],2).'</td>
          
                  <td>'.number_format($value["total"],2).'</td>
          
                  <td>'.$value["fecha"].'</td>

                  <td> <div class="btn-group">
                  
                  <button class="btn btn-success btnImprimirticketV" idVenta="'.$value[ "id"].'"><i class="fas fa-receipt"></i></button>

                  <button class="btn btn-warning btnImprimirFactura" codigoVenta="'.$value["codigo"].'"><i class="fas fa-file-pdf"></i></button>

                  <button class="btn btn-primary btnEditarVenta" idVenta="'.$value["id"].' "><i class="fas fa-pencil-alt"></i></button>';
                  if ($_SESSION["perfil"] == "Administrador") {
                  
                  echo'<button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fa fa-trash"></i></button>';
                }
                  echo'</div>  
                  </td>
                </tr> 
                ';
                }
                ?>

                
              </tbody>

          </table>           

          <?php

            $eliminarVenta = new ControladorVentas();
            $eliminarVenta -> ctrEliminarVenta();

          ?>

        </div>
        
      </div>
      
    </section>
    
  </div>
  

