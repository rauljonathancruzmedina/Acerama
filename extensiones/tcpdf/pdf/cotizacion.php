<?php 

require_once "../../../controladores/contizacion.controlador.php";
require_once "../../../modelos/cotizacion.modelo.php";

require_once "../../../controladores/clietes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/empresa.controlador.php";
require_once "../../../modelos/empresa.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";


class imprimircotizacion{

public $codigo;

public function traerImpresioncotizacion(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemCotiz = "codigo";
$valorCotiz = $this->codigo;

$respuestaCotiz = ControladorCotiz::ctrMostrarCotiz($itemCotiz, $valorCotiz);

$fecha = substr($respuestaCotiz["fecha"], 0, -8);
$productos = json_decode($respuestaCotiz["productos"], true);
$neto = number_format($respuestaCotiz["neto"], 2);
$comentario =$respuestaCotiz["comentarios"];
$remitente = $respuestaCotiz["remitente"];
$descuento = number_format($respuestaCotiz["descuento"], 2);
$totalVenta = number_format($respuestaCotiz["total"], 2);

//TRAEMOS LA INFORMACION DEL CLIENTE

$itemCliente = "id";
$valorCliente = $respuestaCotiz["cliente"];

$respuestaCliente = ControladorClientes::controMostrarClientes($itemCliente, $valorCliente);


$itemUsuarios = "id";
$valorUsuarios = $respuestaCotiz["remitente"];

$respuestaUsuarios = ControladorUsuarios::ctrMostrarUsuarios($itemUsuarios, $valorUsuarios);

$itemEmpresa = "id";
$valorEmpresa = '1';
$respuestaEmpresa = ControladorEmpresa::ctrMostrarEmpresa($itemEmpresa, $valorEmpresa);

$nombreEm = $respuestaEmpresa["nombre"];  
$direccionEm = $respuestaEmpresa["direccion"]; 
$correoEm = $respuestaEmpresa["correo"]; 
$telefonoEm = $respuestaEmpresa["telefono"];

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);

$pdf->startPageGroup();


$pdf->setFooterData(array(0,64,0), array(0,64,128));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->AddPage();

//-----------------------------------PRIMER BLOQUE---------------------------------------

$bloque1 = <<<EOF
	
	<table>
		
		<tr>

			<td style="width:70px"></td>
				

			<td style="width:470px"><img src="images/Acerama.jpg"  width="400"
     height="190"></td>
			
		</tr>

		<tr>
			<td style="background-color:white; width:230px">

				<div style="font-size:8.5px; text-aling:right; line-heigth:15px">

					<br>
					Teléfono: $telefonoEm

					<br>
					Correo: $correoEm

					<br>
					Dirección: $direccionEm

				</div>

			</td>

			<td style="background-color:white; width:270px">

				<div style="font-size:12px; text-aling:right; line-heigth:15px; color:blue">

					<br>
					BOLETA DE COTIZACIÓN

				</div>

			</td>

				<td style="background-color:white; width:60px text-align:center; color:blue">
					<br>FOLIO<br> $valorCotiz
			</td>

		</tr>
	</table>


EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

//---------------------------------PRIMER BLOQUE---------------------------------------

//---------------------------------SEGUNDO BLOQUE----------------------------------------
$bloque2 = <<<EOF

	<table>

		<tr>

			<td style="width:540px"></td>

		</tr>

	</table>

	<table  style="font-size:10px; padding:5px 10px;">

		<tr> 

			<td style="border: 1px solcodigo #666; background-color:white; width:390px">
			
				Cliente: $respuestaCliente[nombre]

			</td>

			<td style="border: 1px solcodigo #666; background-color:white; width:150px; text-align:right">
			
				Fecha: $fecha

			</td>

		</tr>

		<tr>

			<td style="border: 1px solcodigo #666; background-color:white; width:540px">

			Vendedor: $respuestaUsuarios[nombre]

			</td>

		</tr>

		<tr>

			<td style="border-bottom: 1px solcodigo #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');
//---------------------------------SEGUNDO BLOQUE--------------------------------------

//---------------------------------TERCER BLOQUE-------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px">

		<tr>

		<td style="border: 1px solcodigo #666; background-color:#F73A43; width:230px; text-align:center">Producto</td>
		<td style="border: 1px solcodigo #666; background-color:#F73A43; width:60px; text-align:center">U.M.</td>
		<td style="border: 1px solcodigo #666; background-color:#F73A43; width:70px; text-align:center">Cantidad</td>
		<td style="border: 1px solcodigo #666; background-color:#F73A43; width:90px; text-align:center">P.U.</td>
		<td style="border: 1px solcodigo #666; background-color:#F73A43; width:90px; text-align:center">Valor Total</td>



		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

//---------------------------------TERCER BLOQUE-------------------------------------------

//---------------------------------CUARTO BLOQUE-------------------------------------------
foreach ($productos as $key => $item) {

$itemProductoC = "id";
$valorProductoC = $item["id"];
$ordenC = null;

$respuestaProductosC = ControladorProductos::ctrMostrarProductos($itemProductoC, $valorProductoC, $ordenC);

$medcodigoaF = $respuestaProductosC["medida"];


$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="border: 1px solcodigo #666; color:#333; background-color:white; width:230px text-align:center">
				$item[descripcion]
			</td>

			<td style="border: 1px solcodigo #666; color:#333; background-color:white; width:60px text-align:center">
				$medcodigoaF
			</td>

			<td style="border: 1px solcodigo #666; color:#333; background-color:white; width:70px text-align:center">
				$item[cantidad]
			</td>			

			<td style="border: 1px solcodigo #666; color:#333; background-color:white; width:90px text-align:center">$
				$item[precio]
			</td>

			<td style="border: 1px solcodigo #666; color:#333; background-color:white; width:90px text-align:center">$
				$item[total]
			</td>

		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');
}
//---------------------------------CUARTO BLOQUE-------------------------------------------

//---------------------------------QUINTO BLOQUE-------------------------------------------

$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

	 	<tr>

	 		<td style="color:#333; background-color:white; width:340px; text-align:center"></td>

	 		<td style="border-bottom: 1px solcodigo #666; background-color:white; width:100px text-align:center"></td>

			<td style="border-bottom: 1px solcodigo #666; color:#333; background-color:white; width:100px text-align:center"></td>

	 	</tr>

	 	<tr>
	 		<td style="border-right: 1px solcodigo #666; background-color:white; width:340px text-align:center">

	 		</td>

	 		<td style="border: 1px solcodigo #666; background-color:#7FB9ED; width:100px text-align:center">
	 			Neto:
	 		</td>

	 		<td style="border: 1px solcodigo #666; color:#333; background-color:white; width:100px text-align:center">
	 			$ $neto
	 		</td>

	 	</tr>
		
		<tr>
	 		<td style="border-right: 1px solcodigo #666; background-color:white; width:340px text-align:center">
	 		
	 		</td>

	 		<td style="border: 1px solcodigo #666; background-color:#7FB9ED; width:100px text-align:center">
	 			Descuento:
	 		</td>

	 		<td style="border: 1px solcodigo #666; color:#333; background-color:white; width:100px text-align:center">
	 			$ $descuento
	 		</td>

	 	</tr>


		<tr>
	 		<td style="border-right: 1px solcodigo #666; color:#333 background-color:white; width:340px text-align:center"></td>

	 		<td style="border: 1px solcodigo #666; background-color:#7FB9ED; width:100px text-align:center">
	 			Total:
	 		</td>

	 		<td style="border: 1px solcodigo #666; color:#333; background-color:white; width:100px text-align:center">
	 			$ $totalVenta
	 		</td>

	 	</tr>
	 	

	</table>


EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');
//---------------------------------QUINTO BLOQUE-------------------------------------------
$pdf->Write(0, '', '', 0, 'C', 1, 0, false, false, 0);
$pdf->Write(0, '', '', 0, 'C', 1, 0, false, false, 0);
$pdf->Write(0, 'Precios sujetos a cambio sin previo aviso.', '', 0, 'C', 1, 0, false, false, 0);


/* SALcodigoA DEL ARCHIVO */
$pdf->Output('cotizacion.pdf');

}

}

$cotizacion = new imprimircotizacion();
$cotizacion -> codigo = $_GET["codigo"];
$cotizacion -> traerImpresioncotizacion();

?>