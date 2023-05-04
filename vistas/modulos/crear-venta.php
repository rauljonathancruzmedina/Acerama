  <div class="content-wrapper">
    
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Crear ventas</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item active text-danger">Crear Ventas</li>

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
                   
               <!--=====================================
                    ROW VENDEDOR Y CODIGO
                    ======================================-->
              <div class="row">
                 
                   <!--=====================================
                    ENTRADA DEL VENDEDOR
                    ======================================-->
                <div class="col-lg-6 col-xs-12">
                      <label>Vendedor</label>
                    <div class="input-group mb-3">
                      
                     <div class="input-group-prepend">
                        
                     <span class="input-group-text"><i class="fa fa-user"></i></span> 
                     </div>
                    
                     <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>
                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>"> 
                      
                    </div>

                </div>
                   <!--=====================================
                    ENTRADA DEL CODIGO FACTURA
                    ======================================-->
                <div class="col-lg-3 col-xs-12">
                   <label>Código de la venta</label>
                      <div class="input-group mb-3">
                      
                      <div class="input-group-prepend">
                        
                       <span class="input-group-text"><i class="fa fa-key"></i></span> 
                       </div>
                       <?php 

                       $item = null;
                       $valor = null;

                       $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                       if (!$ventas) {

                         echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="1001" readonly>';
                       
                       } else {
                         
                        foreach ($ventas as $key => $value) {
                          # code...
                        }

                        $codigo = $value["codigo"] +1;

                           echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';
                       }
                       ?>
                      
                    </div>
                     
                </div>
                 <!--=====================================
                  BOTÓN PARA AGREGAR PRODUCTO            
                  ======================================-->
                <div class="col-lg-3 col-xs-6">
                  <br>

                 <div class="input-group mb-3">    

                    <div class="input-group">

                     <button  type="button" class="btn btn-danger btn-block " data-toggle="modal" data-target="#modalAgregarProducto">Agregar Producto</button>
              
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
                <div class="col-lg-9 col-xs-12">
                    <label>Seleccione cliente</label>
                   <div class="input-group mb-3">
                      
                      <div class="input-group-prepend">
              
                       <span class="input-group-text"><i class="fa fa-users"></i></span> 
                      </div>
                       <select class="form-control select2 select2-danger input-lg" data-dropdown-css-class="select2-danger" id="seleccionarCliente" name="seleccionarCliente" required>
                         
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
              
                <div class="col-lg-3 col-xs-12">
                  <br>
                  <span class="input-group-addon"><a href="agregar-cliente" class="btn btn-danger btn-block" class="nav-link">Agregar Cliente</a></span>
                <div class="input-group mb-3">
                                 

                 </div>

                </div>

              </div>
               <!--=====================================
                    ROW ENTRADA PRODUCTO
                    ======================================-->
                  <!--=====================================
                    ENTRADA PARA AGREGAR PRODUCTO
                    ======================================-->
                  <div class="from-group row nuevoProducto">


                  </div>

                <input type="hidden" id="listaProductos" name="listaProductos">

              <!--=====================================
                  ENTRADA INPUESTO Y TOTAL
              ======================================-->
              <div class="row">
                
                <div class="col-lg-8 col-xs-12">

                 <h4 class="text-center">Comentarios de venta</h4>
                 
                  <div class="input-group">
                 
                  <textarea class="form-control input-lg" rows="3" cols="120" name="Nuevocomentario" id="Nuevocomentario" placeholder="Comentarios"></textarea>

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

                          <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>

                          <input type="number" class="form-control input-lg" min="0.01" step="any" id="nuevoDescuentoVenta" name="nuevoDescuentoVenta" placeholder="0" >

                          <input type="hidden" name="nuevoPrecioDescuento" id="nuevoPrecioDescuento" required>
                          <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>
                          
                          <input type="hidden" name="nuevoCambioVent" id="nuevoCambioVent" required>

                          <input type="hidden" name="nuevoEfecVent" id="nuevoEfecVent" required>

                        </div>
                       
                      </td>

                      <td style="width:50%">

                        <div class="input-group">

                        <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>

                        <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="0" readonly>
                        <input type="hidden" name="totalVenta" id="totalVenta">
                         
                        </div>
                       
                      </td>

                    </tr>

                    </tbody>

                  </table>

                </div>

              </div>

               <!--=====================================
                  ENTRADA MÉTODO DE PAGO
              ======================================-->
              
              <div class="form-group row ">
                
               
                 <div class="col-lg-4">
                  <br>
                        <label>Efectivo</label>
                        <div class="input-group">

                              <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>

                              <input type="text" class="form-control" id="nuevoEfectivoVenta" name="nuevoEfectivoVenta" placeholder="0000000" required>

                        </div>
                        
                  </div>

                  <div class="col-lg-4" id="capturarCambioEfectivo" >
                    <br>
                      <label>Cambio</label>
                        <div class="input-group">

                            <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>

                            <input type="text" class="form-control"  id="nuevoCambioEfectivo" name="nuevoCambioEfectivo"  placeholder="0000000" readonly required>

                        </div>     

                  </div>

            
               <!--============================
                 =  botone            =
                 =============================-->
               <input type="hidden" id="MetodoPagos" name="MetodoPagos" value="Efectivo">
        
              </div>
            
              </div>
            
            </div>
          <button type="submit" class="btn btn-danger">Guardar venta</button>
  
        
        </form>

        <?php
          
          $guardarVenta = new ControladorVentas();
          $guardarVenta -> ctrCrearVenta();
         
        ?>

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
            
              <button type="button " class="btn btn-danger ml-auto" data-dismiss="modal">Cerrar</button>
            
            </div>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->