<div id="back"></div>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-danger">
    
    <div class="login-logo">

      <?php
       
       $item = "id";
       $valor = 1;
       $empresa = ControladorEmpresa::ctrMostrarEmpresa($item, $valor);

       if ($empresa["foto"] == null) {
         echo '<img src="vistas/img/empresa/3410490.svg" class="img-responsive" style="max-width: 100%; width: 300px; height: 150px;">';
 
       }else{
       echo '<img src="'.$empresa["foto"].'" class="img-responsive" style="max-width: 100%; width: 300px; height: 150px;">';
 
       }
       
       ?>

    </div>

    <div class="card-body">

      <p class="login-box-msg">Ingresar al sistema</p>

      <form method="post">


        <div class="input-group mb-3">
        
          <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
          
          <div class="input-group-append">

            <div class="input-group-text">

              <span class="fa fa-user"></span>

            </div>

          </div>

        </div>


        <div class="input-group mb-3">

          <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>

          <div class="input-group-append">

            <div class="input-group-text">

              <span class="fas fa-lock"></span>

            </div>

          </div>

        </div>


        <div class="row">

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" style="padding-right: 20px" class="btn btn-danger">Acceder</button>
          </div>

          <!-- /.col -->
        </div>

        <?php 

        	$login = new ControladorUsuarios();
        	$login -> contrIngresoUsuario();

        ?>
        	
      </form>


    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
