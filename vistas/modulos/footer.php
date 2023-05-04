<!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <?php
       
	   $item = "id";
	   $valor = 1;
	   $empresa = ControladorEmpresa::ctrMostrarEmpresa($item, $valor);

	   echo '<b>'.$empresa["propietario"].'</b>  '.date('d/m/Y').'';

	   ?>
    </div>
    <strong>ACERAMA </strong>.
  </footer>