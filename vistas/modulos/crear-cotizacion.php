  <div class="content-wrapper">
    
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Crear Cotización</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item active text-danger">Crear Cotización</li>

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
                    
                     <input type="text" class="form-control" id="nueVendC" name="nueVendC" value="<?php echo $_SESSION["nombre"]; ?>" readonly>
                    
                    <input type="hidden" name="nueVendCC" value="<?php echo $_SESSION["id"]; ?>">
                      
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

                       <?php  

                        $item = null;

                        $valor = null;

                        $cotiz = ControladorCotiz::ctrMostrarCotiz($item, $valor);

                        if(!$cotiz){

                          echo'<input type="text" class="form-control" id="CodCot" name="CodCot" value="1001" readonly>';

                        }else{

                          foreach ($cotiz as $key => $value) {
                            // code...
                          }

                          $codigo = $value["codigo"] +1;

                          echo'<input type="text" class="form-control" id="CodCot" name="CodCot" value="'.$codigo.'" readonly>';

                        }

                       ?>
                       
                       
                      
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
                       
                       <input type="text" class="form-control"  id="nuevaFecha" name="nuevaFecha" <?php echo 'value="'.date('d/m/Y').'"'; ?> readonly>
                      
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
                <div class="col-lg-9 col-xs-12">
                    <label>Seleccione cliente</label>
                   <div class="input-group mb-3">
                      
                      <div class="input-group-prepend">
              
                       <span class="input-group-text"><i class="fa fa-users"></i></span> 
                      </div>
                       <select class="form-control select2 select2-danger input-lg" data-dropdown-css-class="select2-danger" id="NuevClienteC" name="NuevClienteC" required>

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
                  <div class="from-group row nuevoProductoC">


                  </div>

                <input type="hidden" id="listaProductC" name="listaProductC">

              <!--=====================================
                  ENTRADA INPUESTO Y TOTAL
              ======================================-->
              <div class="row">
                
                <div class="col-lg-8 col-xs-12">

                 <h4 class="text-center">Comentarios de cotización</h4>
                 
                  <div class="input-group">
                 
                  <textarea class="form-control input-lg" rows="3" cols="120" name="NuevoComenC" id="NuevoComenC" placeholder="Comentarios"></textarea>

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

                        <input type="number" class="form-control input-lg" min="0.25" step="any" id="nuevoDescuentoCo" name="nuevoDescuentoCo" placeholder="0">

                        <input type="hidden" name="nuevoPrecioDescuentC" id="nuevoPrecioDescuentC" required>
                        <input type="hidden" name="nuevoPrecioNetC" id="nuevoPrecioNetC" required>

                        <span class="input-group-text"><i class="fa fa-percent"></i></span>
                          
                        </div>
                       
                      </td>

                      <td style="width:50%">

                        <div class="input-group">

                        <span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>

                        <input type="text" class="form-control input-lg" id="nuevoTotalCo" name="nuevoTotalCo" total="" placeholder="0" required>
                        <input type="hidden" name="totalC" id="totalC">
                         
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

          $crearCotiz -> ctrCrearCotixacion();
         
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