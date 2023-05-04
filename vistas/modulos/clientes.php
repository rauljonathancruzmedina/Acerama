
  <div class="content-wrapper">
    
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Administrar clientes</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item active text-danger"> Clientes</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->
    <section class="content">
      
      <div class="card card-outline card-danger">
        <div class="card-header">
          
          <a href="agregar-cliente" class="btn btn-primary" class="nav-link">
            <ion-icon name="add-outline"></ion-icon>
            <h5>
              Agregar clientes
            </h5>
          </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped tablas">
            <thead>

            <tr class="bg-info">
              <th style="width:10px">id</th>
              <th class="text-uppercase">Nombre</th>
              <th class="text-uppercase">dirección</th>
              <th class="text-uppercase">teléfono</th>
              <th class="text-uppercase">rfc</th>
              <th class="text-uppercase">Total compras</th>
              <th class="text-uppercase">última compra</th>
              <th class="text-uppercase">acciónes</th>
            </tr>

            </thead>

            <tbody>

            

              <?php

                $item = null;
                $valor = null;

                $clientes = ControladorClientes::controMostrarClientes($item, $valor);

                foreach ($clientes as $key => $value) {
                  
                  echo '<tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["direccion"].'</td>
                    <td>'.$value["telefono"].'</td>
                    <td>'.$value["rfc"].'</td>
                    <td>'.$value["compras"].'</td>
                    <td>'.$value["ultima_compra"].'</td>
                    <td>
                      
                      <div class="btn-group">
                            
                          <button class="btn btn-primary btnEditarCliente" idCliente="'.$value["id"].'"><i class="fas fa-pencil-alt"></i></button>';
                          if ($_SESSION["perfil"] == "Administrador") {
                             echo'<button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-trash"></i></button>';
                            }
                        echo'</div>  

                    </td>

                  </tr>';

                }

              ?>
                              
            </tbody>

          </table>
        </div>
        
      </div>
    
    </section>
    
  </div>

  <?php

    $borrarClientes = new ControladorClientes();
    $borrarClientes -> contBorrarCliente();

  ?>

