<?php
  
  if ($_SESSION["perfil"] == "Vendedor") {
    
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

            <h1>Agregar Productos</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item active text-danger">Agregar productos</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>

  <section class="content">
     <div class="container-fluid">
      
      <div class="card card-outline card-danger">
          <div class="card-header">

            <a href="productos" class="btn btn-danger float-sm-right" class="nav-link">
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
           <div class="col-md-8">
              <!-- ROW PRIMERO -->
                <div class="row"> 

                    <div class="col-md-6 ">
                            <!-- SELECCIONAR CATEGORIA -->
                       <label>Categoría</label>

                          <div class="input-group mb-3">

                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-th"></i></span>
                              </div>

                              <select class="form-control select2 select2-danger input-lg" data-dropdown-css-class="select2-danger" name="nuevaCategoria" id="nuevaCategoria"  required>
                                  
                                  <option value="">Seleccionar Categoría</option>
                                  <?php

                                  $item = null;
                                  $valor = null;

                                  $categorias = ControladorCategorias::ctrMostrarCategoria($item, $valor);
                                  foreach ($categorias as $key => $value) {
                                    echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                  }

                                  ?>
                                  
                              </select>

                          </div>

                    </div>

                        <div class="col-md-3">
                               <!-- CÓDIGO DEL PRODUCTO -->
                       <label>Código</label>

                          <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-barcode"></i></i></span>
                                </div>
                                    
                                    <input type="text" class="form-control" name="nuevoCodig" id="nuevoCodig" placeholder="Ingresa Código" required>
                          </div>

                    </div>
                           
                    <div class="col-md-3 ">
                            <!-- ENTRADA PARA NUMERO DE SERIE -->
                       <label>Número de serie</label>

                          <div class="input-group mb-3">
                                  
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-code"></i></span>
                              </div>

                              <input type="text" class="form-control" name="nuevoNumSerie" id="nuevoNumSerie" placeholder="Número de serie" required>
                          </div>

                    </div>
                 
                </div>
                  <!-- ROW SEGUNDO -->
                <div class="row">
                    <div class="col-md-12">
                           <!-- COLUMNA DOS DE DATOS DEL PRODUCTO -->
                       <label>Descripción</label>

                          <div class="input-group mb-3">
                                
                               <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fab fa-product-hunt"></i></i></span>
                               </div>

                                 <input type="text" class="form-control" name="nuevaDescripcion" placeholder="Ingresar descripción" required>
                          </div>
                    </div> 
                          
                 </div>
                   <!-- ROW TERCER -->
                 <div class="row">
                    <div class="col-md-6">
                            <!-- ENTRADA PARA  MARCA-->  
                            <label>Marca</label>

                            <div class="input-group mb-3">
                              
                                <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="fas fa-bookmark"></i></span>
                                </div>

                              <input type="text" class="form-control" name="nuevaMarca" id="nuevaMarca" placeholder="Ingresar marca" required>
                            </div>
                         
                    </div>


                    <div class="col-md-3">
                            <!-- ENTRADA PARA CANTIDAD -->
                       <label>Cantidad</label>

                          <div class="input-group mb-3">
                              
                               <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="fas fa-sort-numeric-up-alt"></i></span>
                               </div>

                               <input type="number" class="form-control" name="nuevaCantidad" id="nuevaCantidad" placeholder="Cantidad" required>
                          </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">                       
                        <!-- ENTRADA PARA UNIDAD DE MEDIDA -->
                       <label>Unidad de medida</label>

                          <div class="input-group mb-3">

                               <div class="input-group-prepend">
                               <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                               </div>

                               <select class="form-control select2 select2-danger input-lg" data-dropdown-css-class="select2-danger" name="nuevaUnidadMedida" id="nuevaUnidadMedida">
                                
                               <option value="M">M</option>
                               <option value="Pza">Pza</option>
                               <option value="Kg">Kg</option>
                              
                              </select>

                          </div>
                    </div>
                               
                 </div>

                   <!-- ROW CUARTO -->
                 <div class="row">
                   
                    <!-- PRECIO COMPRA -->
                    <div class="col-md-4 ">
                          <!-- ENTRADA PRECIO COMPRA -->
                        <label>Precio de compra</label>
                        <div class="input-group mb-3">

                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                          </div>
                          
                          <input type="number" class="form-control" name="nuevoPrecioCompra" id="nuevoPrecioCompra"   step="any" placeholder="Ingresar precio compra" required>
                        </div>
                    </div>

                    <!-- CHECKBOX PARA PORCENTAJE -->

                        <div class="col-md-2 ">
                          <br>
                          <div class="form-group">
                            <label >
                              
                              <input type="checkbox" class="porcentaje" id="porcentaje" checked>
                              Utilizar porcentaje
                            </label>
                          </div>
                        </div>
                        <!-- ENTRADA PARA PORCENTAJE -->
                        <div class="col-md-2">
                          <label>
                            
                          </label>
                          <div class="input-group mb-3">

                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-percent"></i></span>
                          </div>
                            
                          <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="16">
                        </div>
                        </div>


                    <div class="col-md-4">
                          <!-- ENTRADA PRECIO  VENTA 1 -->
                        <label>Precio de venta</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                          </div>
                          <input type="number" class="form-control" id="nuevoPrecioVenta" name="nuevoPrecioVenta" step="any"  placeholder="Ingresar precio venta" required>
                        </div>

                    </div>
                 </div>
                 <!-- ROW QUINTO -->
                 <div class="row">
                    <div class="col-md-4">
                                 
                            <!-- ENTRADA PRECIO  MAYOREO -->

                            <label>Precio mayoreo</label>

                            <div class="input-group mb-3">

                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                              </div>
                              
                              <input type="number" class="form-control" id="nuevoPrecioMayoreo" name="nuevoPrecioMayoreo" step="any" placeholder="Ingresar precio mayoreo">
                            </div>
                    </div>
                    <div class="col-md-4">
                                   
                        <!-- ENTRADA PRECIO  VENTA 3 -->

                        <label>Apartir de cuantos</label>

                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                
                            <input type="number" class="form-control" id="nuevoApartir" name="nuevoApartir" placeholder="Ingresar Apartir de cuantos" >
                        </div>

                    </div>

                 </div>

       </div>
       <div class="col-md-4">
         
                   <!--========================================== 
                                      FOTO
                    ==========================================-->
                        <!-- ENTRADA PARA FOTO -->

                        <label>Foto del producto</label>

                        <div class="panel" style="padding-left: 200px;">SUBIR FOTO</div> 

                          <div class="form-group">
                            <img src="vistas/img/productos/default/anonymous.png" class="img-fuld img-responsive previsualizar" style="max-width:100%;width:300px;height:250px;">
                            <div class="input-group" >
                              <div class="custom-file">
                                <input type="file" class="nuevaImagen" name="nuevaImagen">
                                <label class="custom" for="exampleInputFile"></label>
                              </div>
                            </div>
                  
                  </div>
               </div>
             </div>

              <button type="submit" class="btn btn-success btn-block">Guardar producto</button>
            
            <?php

                  $crearProducto = new ControladorProductos();
                  $crearProducto -> ctrCrearProductos();
                ?>

            </form>

          </div>

        </div>
        
      </div>
      <!-- /.container-fluid -->
    </section>

</div>   

