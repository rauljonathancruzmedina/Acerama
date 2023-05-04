  <div class="content-wrapper">
    
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Editar Cotización</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item active text-danger">Editar Cotización</li>

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

        <form role="form" method="post" enctype="multipart/form-data" class="formularioCotiz">
        
         <div class="card-body">
             <?php 

              $item = "id";
              $valor = $_GET["idECotiza"];

              $cotizaE = ControladorCotiz::ctrMostrarCotiz($item, $valor);

              $itemUsuario = "id";
              $valorUsuario = $cotizaE["remitente"];

              $vendedor = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

              $itemCliente = "id";
              $valorCliente = $cotizaE["cliente"];

              $ClientesE = ControladorClientes::controMostrarClientes($itemCliente, $valorCliente);

             ?>      
               <!--=====================================
                    ROW VENDEDOR Y CODIGO
                    ======================================-->
              <div class="row">
                 
                   <!--=====================================
                    ENTRADA DEL VENDEDOR
                    ======================================-->
                <div class="col-lg-5 col-xs-12">
                      <label>Remitente</label>
                    <div class="input-group mb-3">
                      
                     <div class="input-group-prepend">
                        
                     <span class="input-group-text"><i class="fa fa-user"></i></span> 
                     </div>
                    
                     <input type="text" class="form-control" id="EditarC" name="EditarC" value="<?php echo $_SESSION["nombre"]; ?>" readonly>
                   
                     <input type="hidden" name="idEditarC" value="<?php echo $_SESSION["id"]; ?>"> 
                     
                      
                    </div>

                </div>
                   <!--=====================================
                    ENTRADA DEL CODIGO FACTURA
                    ======================================-->
                <div class="col-lg-2 col-xs-12">
                   <label>código</label>
                    <div class="input-group mb-3">
                      
                      <div class="input-group-prepend">
                        
                       <span class="input-group-text"><i class="fa fa-key"></i></span> 
                       </div>


                        <input type="text" class="form-control" name="CodCot" value="<?php echo $cotizaE["codigo"] ?>" readonly>           
                      
                    </div>
                     
                </div>

                <!--=====================================
                    FECHA DE COTIZACION
                    ======================================-->
                <div class="col-lg-2 col-xs-12">
                   <label>Fecha</label>
                    <div class="input-group mb-3">
                      
                      <div class="input-group-prepend">
                        
                       <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span> 
                       </div>
                       
                       <input type="text" class="form-control"  id="nuevaFechaD" name="nuevaFechaD" <?php echo 'value="'.date('d/m/Y').'"'; ?> readonly>
                      
                    </div>
                     
                </div>

                 <!--=====================================
                  BOTÓN PARA AGREGAR PRODUCTO            
                  ======================================-->
                <div class="col-lg-3 col-xs-6">
                  <br>

                 <div class="input-group mb-3">    

                    <div class="input-group">

                     <button  type="button" class="btn btn-danger btn-block " data-toggle="modal" data-target="#modalAgregarProductoC">Agregar Producto</button>
              
                    </div>
                 
                  </div>
                
                </div>
                
              </div>

                    <!--=====================================
                    ROW CLIENTE
                    ======================================-->
              <div class="row">
                <!--=====================================
                    ENTRADA DEL CLIENTE
                    ======================================-->
                <div class="col-lg-5 col-xs-12">
                    <label>Seleccione cliente</label>
                   <div class="input-group mb-3">
                      
                      <div class="input-group-prepend">
              
                       <span class="input-group-text"><i class="fa fa-users"></i></span> 
                      </div>

                       <select class="form-control select2 select2-danger input-lg" data-dropdown-css-class="select2-danger" id="selecEditClienteC" name="selecEditClienteC" required>

                         <?php 

                          $itemCot = "id";
                          $valorCot = $cotizaE["cliente"];

                          $clientesCot = ControladorClientes::controMostrarClientes($itemCot, $valorCot);

                        ?>

                        <option value="<?php echo $clientesCot["id"] ?>"><?php echo $clientesCot["nombre"] ?></option>

                        <?php

                          $item = null;
                          $valor = null;

                          $Clientes = ControladorClientes::controMostrarClientes($item, $valor);

                            foreach ($Clientes as $key => $value) {

                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                            
                            }

                        ?>

                      </select>
                 

                   </div>   
                  
                </div>
              
                <div class="col-lg-2 col-xs-12">
                  <br>
                  <span class="input-group-addon"><a href="agregar-cliente" class="btn btn-danger btn-block" class="nav-link">Agregar Cliente</a></span>
                

                </div>

              </div>
                  <!--=====================================
                    ROW ENTRADA PRODUCTO
                    ======================================-->
                  <!--=====================================
                    ENTRADA PARA AGREGAR PRODUCTO
                    ======================================-->
                  <div class="from-group row nuevoProductoC">

                        <?php  

                      $listaProductosEC = json_decode($cotizaE["productos"], true);
                        
                      foreach ($listaProductosEC as $key => $value) {

                        $item = "id";
                        $valor = $value["id"];
                        $orden = "null";

                        $respuestaCOT = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

                        $descripcionC = $respuestaCOT["descripcion"];
    
                        $precioC = $respuestaCOT["precio_venta"];
                      
                        $stockC = $respuestaCOT["stock"];
                      
                        $precioMC = $respuestaCOT["precio_ventaa"];

                        $apartirDC = $respuestaCOT["precio_ventaaa"];

                        $AntiguoStock = $respuestaCOT["stock"] + $value["cantidad"];

                        echo '
                        <div class="row" style="padding:5px 15px">

                           <div class="col-lg-6 col-xs-12" >
                               
                              <div class="input-group mb-3">
                                
                              <div class="input-group">
                                
                                <span class="input-group-addon"><button type="button" class="btn btn-danger btn-info quitarProductoC" idProducto="idProducto"><i class="fas fa-trash-alt"></i></button></span>

                                <input type="text" class="form-control nuevaDescripcionProductoC" idProducto="'.$respuestaCOT["id"].'" name="agregarProductoC" value="'.$descripcionC.'" readonly required>
                              
                                 </div>
                              
                              </div>
                            
                            </div> 
                            
                           <div class="col-lg-2 col-xs-12 precioCCol" >
                            
                              <div class="input-group mb-3">
                            
                              <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>    
                              
                              <input type="text" class="form-control nuevoPrecioProductoC" name="nuevoPrecioProductoC" value="'.$value["precio"].'" precioMeC ="'.$precioC.'" required>
                              
                              <input type="hidden" class="form-control nuevoPrecioMayoreoC" name="nuevoPrecioMayoreoC" value="'.$precioMC.'"  required>             

                              </div>
                              
                            </div>
                             <div class="col-lg-1 col-xs-12 cantidadProductoC">
                              
                              <div class="input-group mb-3">
                              
                              <input type="number" class="form-control nuevaCantidadProductoC" name="nuevaCantidadProductoC" min="0.25" step="any" value="'.$value["cantidad"].'" stockC="'.$stockC.'" nuevoStock="'.$stockC.'" apartirDe="'.$apartirDC.'" required>
                                      
                            </div>
                            
                            </div> 
                             <div class="col-lg-2 col-xs-12" >
                            
                              <div class="input-group mb-3">
                            
                              <div class="input-group-prepend">
                            
                              <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>
                            
                              </div>     
                            
                              <input type="text" class="form-control total"  name="total" value="'.$value["total"].'" readonly required>
                            
                              </div>
                              
                            </div>

                            </div>';

                  }  

                ?>


                  </div>

                <input type="hidden" id="listaProductC" name="listaProductC">

              <!--=====================================
                  ENTRADA INPUESTO Y TOTAL
              ======================================-->
              <div class="row">
                
                <div class="col-lg-8 col-xs-12">

                 <h4 class="text-center">Comentarios de cotización</h4>
                 
                  <div class="input-group">
                 
                  <textarea class="form-control input-lg" rows="3" cols="120" name="EditComenC" id="EditComenC" placeholder="Comentarios"><?php echo $cotizaE["comentarios"]; ?></textarea>

                </div>
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

                        <input type="number" class="form-control input-lg" min="0.25" step="any" id="nuevoDescuentoCo" name="nuevoDescuentoCo" value="<?php echo $cotizaE["descuento"]; ?>">

                        <input type="hidden" name="nuevoPrecioDescuentC" id="nuevoPrecioDescuentC" value="<?php echo $cotizaE["descuento"]; ?>" required>
                        <input type="hidden" name="nuevoPrecioNetC" id="nuevoPrecioNetC" value="<?php echo $cotizaE["neto"]; ?>" required>

                        <span class="input-group-text"><i class="fa fa-percent"></i></span>
                          
                        </div>
                       
                      </td>

                      <td style="width:50%">

                        <div class="input-group">

                        <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>

                        <input type="text" class="form-control input-lg" id="nuevoTotalCo" name="nuevoTotalCo" total="<?php echo $ventaE["total"] ?>" value="<?php echo $cotizaE["total"]; ?>" required>
                        <input type="hidden" name="totalC" id="totalC" value="<?php echo $cotizaE["total"]; ?>">
                         
                        </div>
                       
                      </td>

                    </tr>

                    </tbody>

                  </table>

                </div>

              </div>
      
        </div>     
          <button type="submit" class="btn btn-danger">Guardar cotización</button>
  
        
        </form>

        <?php
          
          $crearCotiz = new ControladorCotiz();

          $crearCotiz -> ctrEditCotizacion();
         
        ?>

       </div>

     </div>
    
    </section>
    <!-- /.content -->
  </div>
<!--=============================================
     MODAL AGREGAR PRODUCTOS     =
==============================================-->

   <div class="modal fade" id="modalAgregarProductoC">

        <div class="modal-dialog modal-xl">
    
          <div class="modal-content ">
    
            <div class="modal-header bg-danger">
    
              <h4 class="modal-title">Tabla productos  <i class="
              nav-icon fab fa-product-hunt"></i> </h4>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
            </div>

            <div class="modal-body">
              <div class="card-body">
              <table class="table table-bordered table-striped dt-responsive tablaPCotiza"  width="100%">
                
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
            
              <button type="button" class="btn btn-danger ml-auto" data-dismiss="modal">Cerrar</button>
            
            </div>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->