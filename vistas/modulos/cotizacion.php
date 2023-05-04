  <div class="content-wrapper">
    
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Cotización</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item active">Vista Cotización</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->
    <section class="content">
      
      <div class="card card-outline card-danger">
        <div class="card-header">
          
          <a href="crear-cotizacion" class="btn btn-primary" class="nav-link">
            <ion-icon name="add-outline"></ion-icon>
            <h5>
              Agregar Cotización
            </h5>
          </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped tablaCot">
            <thead>

            <tr class="bg-info">
              <th style="width:10px">id</th>
              <th class="text-uppercase">código</th>
              <th class="text-uppercase">Remitente</th>
              <th class="text-uppercase">Cliente</th>
              <th class="text-uppercase">Comentarios</th>
              <th class="text-uppercase">Total</th>
              <th class="text-uppercase">Acciones</th>
            </tr>

            </thead>

            <tbody>

            
              <?php

                $item = null;
                $valor = null;

                $cot = ControladorCotiz::ctrMostrarCotiz($item, $valor);

               foreach ($cot as $key => $value){
                 
                  echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["codigo"].'</td>
                          <td>'.$value["remitente"].'</td>';
                          
                          $item = "id";
                          $valor = $value["cliente"];

                          $clientes = ControladorClientes::controMostrarClientes($item, $valor);
                          echo'<td>'.$clientes["nombre"].'</td>';


                          echo'<td>'.$value["comentarios"].'</td>
                          <td>'.$value["total"].'</td>';            

                          echo '
                          <td>

                            <div class="btn-group">

                              <button class="btn btn-warning btnPdf" idCotipdf="'.$value["codigo"].'"><i class="fas fa-file-pdf"></i></button>

                               <button class="btn btn-primary btnEditaC" idEdCotiz="'.$value["id"].'"><i class="fas fa-pencil-alt"></i></button>

                              <button class="btn btn-danger btnElimCotiz" idCotiz="'.$value["id"].'"><i class="fa fa-trash"></i></button>

                            </div>  

                          </td>

                        </tr>';
                }


        ?> 

                              
            </tbody>

          </table>

        </div>
        <!-- /.card-body -->
      </div>

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php

$borrarCotiz = new ControladorCotiz();
$borrarCotiz -> ctrBrorrarCotiz();
     
?>