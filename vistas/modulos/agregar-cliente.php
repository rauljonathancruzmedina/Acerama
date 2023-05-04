

<!-- Main content -->
<div class="content-wrapper">
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Agregar Clientes</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item"><a href="clientes">Clientes</a></li>

              <li class="breadcrumb-item active text-danger">Agregar clientes</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>

    <section class="content">
      <div class="container-fluid">
      
        <div class="card card-outline card-danger">
          <div class="card-header">

            <a href="clientes" class="btn btn-danger float-sm-right" class="nav-link">
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


                <!-- ENTRADA PARA NOMBRE -->

                <label>Nombre / cliente</label>

                <div class="input-group mb-3">

                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  
                  <input type="text" class="form-control" name="nuevoCliente" placeholder="Nombre del cliente" required>

                </div>


                <!-- ENTRADA PARA Dirección -->

                <label>Dirección / cliente</label>

                <div class="input-group mb-3">
                  
                    <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>

                  <input type="text" class="form-control" name="nuevaDireccion" id="nuevaDireccion" placeholder="Dirección del cliente" required>
                </div>

                <div class="row col-md-12">
              
                  <div class="col-md-6">

                    <!-- ENTRADA PARA Teléfono -->

                    <label>Teléfono / cliente</label>

                    <div class="input-group mb-3">
                      
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>

                      <input type="text" class="form-control" name="nuevoTelefono" data-inputmask='"mask": "(999) 999-9999"' data-mask >
                    </div>

                  </div>

                  <div class="col-md-6">

                    <!-- ENTRADA PARA RFC -->

                    <label>RFC / cliente</label>

                    <div class="input-group mb-3">
                      
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-caret-square-up"></i></span>
                        </div>

                      <input type="text" class="form-control" name="nuevoRfc" placeholder="RFC del cliente">

                    </div>

                  </div>
                
                </div>
            

              <button type="submit" class="btn btn-success btn-block">Guardar cliente</button>
              
            </div>

                <?php

                  $crearClientes = new ControladorClientes();
                  $crearClientes -> contCrearCliente();

                ?>

            </form>

          </div>

        </div>
        
      </div>
      <!-- /.container-fluid -->
    </section>

</div>   

