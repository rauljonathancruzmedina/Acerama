  <div class="content-wrapper">
    
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Ver ventas</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item active text-danger">Ver Ventas</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>
    <!--======================
    EL FORMULARIO
    =======================-->
    

    <section class="content">
           
     <div class="card card-outline  card-danger">
      
       <div class="card-header">

        <form role="form" method="post" enctype="multipart/form-data" class="formularioVenta">
        
         <div class="card-body">
                  
          
                
                <?php 

                       $item = "id";
                       $valor = $_GET["idVerVenta"];
                      
                      $venta =ControladorVentas::ctrMostrarVentas($item, $valor);

                      $itemUsuario = "id";
                      $valorUsuario = $venta["id_vendedor"];

                      $vendedor = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                       $itemCliente = "id";
                      $valorCliente = $venta["id_cliente"];

                      $cliente = ControladorClientes::controMostrarClientes($itemCliente, $valorCliente);

                ?>   
               <!--=====================================
                    ROW VENDEDOR Y CODIGO
                    ======================================-->
              <div class="row">
                 
                   <!--=====================================
                    ENTRADA DEL VENDEDOR
                    ======================================-->
                <div class="col-lg-5 col-xs-12">
                      <label>Vendedor</label>
                    <div class="input-group mb-3">
                      
                     <div class="input-group-prepend">
                        
                     <span class="input-group-text"><i class="fa fa-user"></i></span> 
                     </div>
                    
                     <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo  $vendedor["nombre"]; ?>" readonly>
                    <input type="hidden" name="idVendedor" value="<?php echo $vendedor["id"]; ?>"> 
                      
                    </div>

                </div>
                   <!--=====================================
                    ENTRADA DEL CODIGO FACTURA
                    ======================================-->
                <div class="col-lg-2 col-xs-12">
                   <label>Código de la venta</label>
                    <div class="input-group mb-3">
                      
                      <div class="input-group-prepend">
                        
                       <span class="input-group-text"><i class="fa fa-key"></i></span> 
                       </div>
                
                      <input type="text" class="form-control" id="editarVenta" name="editarVenta" value="<?php echo  $venta["codigo"]; ?>" readonly>
                             
                    </div>
                     
                </div>
                <div class="col-lg-4 col-xs-12">
                    <label> </label>
                      <h4 class="text-center">Comentarios de venta</h4>
                  
                </div>

                <div class="col-lg-1 col-xs-12">
                   <br>
                    <a href="ventas" class="btn btn-danger " class="nav-link">
                      <ion-icon name="add-outline"></ion-icon>
                      <h5>
                        Volver
                      </h5>
                    </a>

                </div>
                
              </div>

                    <!--=====================================
                    ROW CLIENTE
                    ======================================-->
              <div class="row">
                <!--=====================================
                    ENTRADA DEL CLIENTE
                    ======================================-->
                <div class="col-lg-7 col-xs-12">

                    <label>Cliente</label>
                  

                        <?php

                          $item = null;
                          $valor = null;

                          $Clientes = ControladorClientes::controMostrarClientes($item, $valor);

                          foreach ($Clientes as $key => $value) {
                          
                          }
                        ?>
                 <input type="text" class="form-control" id="Cliente" name="Cliente" value="<?php echo  $value["nombre"]; ?>" readonly>
                      
                  
                </div>    
                <div class="col-lg-4 col-xs-12">
               
                  <div class="input-group">
                 
                  <textarea class="form-control input-lg" rows="3" cols="120" name="Nuevocomentario" id="Nuevocomentario" readonly><?php echo $venta["comentario"]; ?></textarea>

                </div>

                </div>   
                  
                </div>
              <br>
               <!--=====================================
                    ROW ENTRADA PRODUCTO
                    ======================================-->
                  <!--=====================================
                    ENTRADA PARA AGREGAR PRODUCTO
                    ======================================-->
                  <div class="from-group row nuevoProducto">

                    <?php

                    $listaProductos = json_decode($venta["productos"], true);


                    foreach ($listaProductos as $key => $value) {

                      $item = "id";
                      $valor = $value["id"];
                      $orden = "id";
                      
                      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

                      $stockAntiguo = $respuesta["stock"] + $value["cantidad"]; 

                    echo' <div class="row" style="padding:5px 15px">

                    <div class="col-lg-6 col-xs-12" >
                         
                        <div class="input-group mb-3">
                         
                          <div class="input-group">
                          
                            <span class="input-group-addon"><button type="button" class="btn btn-danger btn-info quitarProducto" idProducto="'.$value["id"].'"><i class="fas fa-trash-alt"></i></button></span>

                            <input type="text" class="form-control nuevaDescripcionProducto" idProducto="'.$value["id"].'" name="agregarProducto" value="'.$value["descripcion"].'" readonly required>
                        
                          </div>
                        
                        </div>
                      
                    </div> 
                      
                    <div class="col-lg-2 col-xs-12 precioCol" >
                      
                        <div class="input-group mb-3">
                      
                            <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>    
                        
                            <input type="text" class="form-control nuevoPrecioProducto" name="nuevoPrecioProducto" value="'.$value["precio"].'" readonly required>
                        
                            <input type="hidden" class="form-control nuevoPrecioMayoreo" name="nuevoPrecioMayoreo" value="'.$respuesta["precio_ventaa"].'" readonly required>             

                        </div>
                        
                    </div>
     
                    <div class="col-lg-1 col-xs-12 cantidadProducto">
                        
                        <div class="input-group mb-3">
                        
                            <input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="'.$value["cantidad"].'" stock="'.$stockAntiguo.'" nuevoStock="'.$value["stock"].'" apartirDe="'.$respuesta["precio_ventaaa"].'" readonly required>
                                   
                        </div>
                      
                    </div> 

                    
                    <div class="col-lg-2 col-xs-12" >
                      
                        <div class="input-group mb-3">
                      
                          <div class="input-group-prepend">
                      
                            <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                      
                          </div>     
                      
                            <input type="text" class="form-control nuevoPrecioProductoT"  name="nuevoPrecioProductoT" value="'.$value["total"].'" readonly required>
                      
                        </div>
                        
                    </div>

                  </div>';
                }
              ?>

                  </div>

                <input type="hidden" id="listaProductos" name="listaProductos">

              <!--=====================================
                  ENTRADA INPUESTO Y TOTAL
              ======================================-->
              <div class="row">
                
                <div class="col-lg-8 col-xs-12">
                
                </div>


                <div class="col-lg-4 col-xs-8 col-xs-pull-2">
                  
                  <table class="table table-condensed">
                    
                    <thead>
                      
                      <tr>
                        
                        <th>Descuento</th>
                        <th>Total</th>

                      </tr>

                    </thead>

                    <tbody>
                      
                      <tr>
                      
                      <td style="width:50%">

                        <div class="input-group">

                        <input type="number" class="form-control input-lg" min="0" id="nuevoDescuentoVenta" name="nuevoDescuentoVenta" placeholder="0" readonly>

                        <input type="hidden" name="nuevoPrecioDescuento" id="nuevoPrecioDescuento" value="<?php echo  $venta["impuestos"]; ?>" required>
                        <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" value=" <?php echo  $venta["neto"]; ?>" readonly>

                        <span class="input-group-text"><i class="fa fa-percent"></i></span>
                          
                        </div>
                       
                      </td>

                      <td style="width:50%">

                        <div class="input-group">

                        <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>

                        <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="<?php echo  $venta["neto"]; ?>" value="<?php echo  $venta["total"]; ?>"  readonly>
                        
                        <input type="hidden" name="totalVenta" value="<?php echo  $venta["total"]; ?>" id="totalVenta" readonly>
                         
                        </div>
                       
                      </td>

                    </tr>

                    </tbody>

                  </table>

                </div>

              </div>
     
        </div>     

        
        </form>

       </div>

     </div>
    
    </section>
    <!-- /.content -->
  </div>
<!--=============================================
     MODAL AGREGAR PRODUCTOS     =
==============================================-->

   <div class="modal fade" id="modalAgregarProducto">

        <div class="modal-dialog modal-xl">
    
          <div class="modal-content ">
    
            <div class="modal-header bg-danger">
    
              <h4 class="modal-title">Tabla productos  <i class="
              nav-icon fab fa-product-hunt"></i> </h4>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
            </div>

            <div class="modal-body">
              <div class="card-body">
              <table class="table table-bordered table-striped dt-responsive tablaPVenta"  width="100%">
                
                <thead>
                  
                  <tr class="bg-primary">
                    <th style="width: 10px">#</th>
                    <th>Descripción</th>
                    <th>Código</th>
                    <th>N/serie</th>
                    <th>Cantidad</th>
                    <th>U.M.</th>
                    <th>P/venta</th>
                    <th>P/mayoreo</th>
                    <th>Img</th>
                    <th>Acciones</th>
                  </tr>

                </thead>
               
              </table>  
              </div>
              
            
            </div>
            
            <div class="modal-footer justify-content-between">
            
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            
            </div>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->