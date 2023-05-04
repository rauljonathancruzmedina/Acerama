  <div class="content-wrapper">
    
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Usuarios</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="home">Inicio</a></li>

              <li class="breadcrumb-item active">Vista Usuarios</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->
    <section class="content">
      
      <div class="card card-outline card-danger">
        <div class="card-header">
          
          <button class="btn btn-danger" data-toggle="modal" data-target="#AgregarUsuarios">Agregar usuarios</button>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>

            <tr class="bg-info">
              <th style="width:10px">id</th>
              <th class="text-uppercase">Nombre</th>
              <th class="text-uppercase">Usuario</th>
              <th class="text-uppercase">Foto</th>
              <th class="text-uppercase">Perfil</th>
              <th class="text-uppercase">Estado</th>
              <th class="text-uppercase">Ultimo login</th>
              <th class="text-uppercase">Acciones</th>
            </tr>

            </thead>

            <tbody>

            <tr>
              <td>1</td>
              <td>John</td>
              <td>Ruso</td>
              <td>Win</td>
              <td>Administrador</td>
              <td>activo</td>
              <td>01/04/2021</td>
              <td>
                
                <div class="btn-group">
                      
                    <button class="btn btn-primary btnEditarServicio" idservicio="" data-toggle="modal"><i class="fas fa-pencil-alt"></i></button>

                    <button class="btn btn-danger btnEliminarServicio"><i class="fa fa-trash"></i></button>

                  </div>

              </td>
            </tr>
                              
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



