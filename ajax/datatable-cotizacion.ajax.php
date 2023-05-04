<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class TablaProductosCotizacion{
/*=====================================================
CARGAR LA TABLA DINÀMICA DE PRODUCTOS VENTAS
=====================================================*/
	public function mostrarTablaProductosCotizacion(){

		$item = null;
		$valor = null;
		$orden = "id";

		$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
		
		$imagen = "<img src='vistas/img/empresa/1/656.jpg' width='40px'>";
		
		$datosJson= '{
			"data": [';

			for($i =0; $i< count($productos); $i++ ) {
				/*=====================================================
				TRAEMOS LA IMAGEN
				=====================================================*/

				$imagen = "<img src='".$productos[$i]["imagen"]."' width='60px'>";

				/*=====================================================
				STOCK
				=====================================================*/

				if ($productos[$i]["stock"]<=3) {
					$stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";
				} else if($productos[$i]["stock"]>=4 && $productos[$i]["stock"]<=10)
				{
					$stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";
				}else{
					
					$stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";
				}			

				/*=====================================================
				TRAEMOS LAS ACCIONES
				=====================================================*/

				$botones ="<div class='btn-group'><button class='btn btn-primary agregarProductoC recuperarBotonC' idProducto='".$productos[$i]["id"]."'>Agregar</button></div>";

				$datosJson .= '[
						  "'.($i+1).'",
						  "'.$productos[$i]["descripcion"].'",
						  "'.$productos[$i]["codigo"].'",
						  "'.$productos[$i]["nSerie"].'",
						  "'.$stock.'",
						  "'.$productos[$i]["medida"].'",
						  "'.$productos[$i]["precio_venta"].'",
						  "'.$productos[$i]["precio_ventaa"].'",
						  "'.$imagen.'",
						  "'.$botones.'"
							],';
			}
			$datosJson = substr($datosJson, 0, -1);
			$datosJson .='] }'; 

		echo $datosJson; 
	}
}

/*=====================================================
ACTIVAR TABLA DE PRODUCTOS
=====================================================*/
$activarProductosVentas = new TablaProductosCotizacion();
$activarProductosVentas -> mostrarTablaProductosCotizacion(); 