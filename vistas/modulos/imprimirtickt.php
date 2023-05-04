<?php
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class imprimirticket1{

public $idVentat;

public function traerImpresionticket1(){


	  		$itemEmpresa = "id";
				$valorEmpresa = 1;
				$respuestaEmpresa = ControladorEmpresa::ctrMostrarEmpresa($itemEmpresa, $valorEmpresa);

				//TRAEMOS LA INFORMACIÓN DEL CLIENTE

				$itemV = "id";
				$valorV = $_GET["idVentat"];
				 $Ventas1 = ControladorVentas::ctrMostrarVentas($itemV, $valorV);
				 
				$Neto=$Ventas1["neto"];
				$Descuento =$Ventas1["impuestos"];
				$totall = $Ventas1["total"];
				$efectivo = $Ventas1["importe"];
				$cambioo= $Ventas1["cambio"];

				$itemCliente = "id";
				$valorCliente = $Ventas1["id_cliente"];

				$respuestaCliente = ControladorClientes::controMostrarClientes($itemCliente, $valorCliente);

				//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

				$itemVendedor = "id";
				$valorVendedor = $Ventas1["id_vendedor"];

				$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

				$productos1 = json_decode($Ventas1["productos"], true);

 				$impresoraE = "TM-T20III";
				$connector = new WindowsPrintConnector($impresoraE);
				$printer = new Printer($connector);
				$printer -> setJustification(Printer::JUSTIFY_CENTER);
				$printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH |Printer::MODE_EMPHASIZED | Printer::MODE_DOUBLE_HEIGHT);
    			$printer->text($respuestaEmpresa["nombre"]."\n" );

				$printer -> feed();

				$printer->selectPrintMode(Printer::MODE_EMPHASIZED );
				$printer -> text("TU AMIGO, TU GRAN ALIADO \n");
				$printer->selectPrintMode(Printer::MODE_EMPHASIZED );
				$printer -> text("PARA CONSTRUIR TUS SUEÑOS...\n");
				//$imprimir -> pulse();
				$printer -> feed(2);
				$printer -> text("Telefono: ".$respuestaEmpresa["telefono"]."\n");
				$printer -> text($respuestaEmpresa["direccion"]."\n");
				$printer -> text("Calle 5 de mayo N.5 \n");
				$printer -> text("Barrio El Calvario, Nochixtlán Oaxaca \n");
				$printer -> selectPrintMode();
				$printer -> text("<==============================================>\n");
				
				$printer -> selectPrintMode(Printer::MODE_EMPHASIZED);
				$printer -> text("Cliente: ".$respuestaCliente["nombre"]."\n");
				$printer -> text("Codigo de venta: "."MAP".$Ventas1["codigo"]."\n");
				$printer -> text("Fecha: ".date("d-m-Y H:i:s")."\n");//Hora y Fecha
				$printer -> text("Vendedor: ".$respuestaVendedor["nombre"]."\n");
				$printer -> selectPrintMode();
				$printer -> text("<==============================================> \n");
				$printer -> selectPrintMode(Printer::MODE_EMPHASIZED );
				//Recorremos los productos 
				$printer -> text("Descripcion "." Precio U. "." U.M. "." Cantidad ". " total \n");
				$printer -> selectPrintMode();
				$printer -> feed(1); //Alimentamos el papel 1 vez		
				
				foreach ($productos1 as $key => $item) {

				$itemProducto = "descripcion";
				$valorProducto = $item["descripcion"];
				$orden = null;

				$respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);

				$printer->setJustification(Printer::JUSTIFY_LEFT);

				$printer->text(substr($item["descripcion"], 0, 46)."\n");//Nombre del producto

				$printer->setJustification(Printer::JUSTIFY_RIGHT);
				$printer -> selectPrintMode(Printer::MODE_EMPHASIZED );

				$printer->text("$".number_format($item["precio"],2)."  ".$respuestaProducto["medida"]."  x  ".$item["cantidad"]."  = $ ".number_format($item["total"],2)."\n");
				$printer -> selectPrintMode();
				}
				
				$printer -> feed(1); //Alimentamos el papel 1 vez	
				
				$printer->text("NETO: $ ".number_format($Neto,2)."\n"); //precio de el neto
				$printer->text("- - - - - - - - - - - - - - - -\n");
				$printer->text("DESCUENTO: $ ".number_format($Descuento,2)."\n"); //precio de el impuesto

				$printer->text("- - - - - - - - - - - - - - - -\n");
				$printer -> selectPrintMode(Printer::MODE_EMPHASIZED );
				$printer->text("TOTAL: $ ".number_format($totall,2)."\n"); //precio de el total
				$printer -> selectPrintMode();
				$printer->text("- - - - - - - - - - - - - - - -\n");

				$printer->text("PAGA CON: $ ".number_format($efectivo,2)."\n");
				$printer->text("- - - - - - - - - - - - - - - -\n");
				$printer->text("SU CAMBIO: $ ".number_format($cambioo,2)." \n");
				$printer->text("- - - - - - - - - - - - - - - -\n");
				$printer -> feed(1); // 1 vez salto de linea	

				$printer -> setJustification(Printer::JUSTIFY_CENTER);
				$printer->text("Muchas gracias por su compra"); 

				
				$printer -> feed(2);				
				/* Cut the receipt and open the cash drawer */
				$printer -> cut();
				$printer -> pulse();
				$printer -> close();
				echo '<script>

							window.location = "ventas";
					
				</script>';
}

}
$tickt1 = new imprimirticket1();
$tickt1 -> idVentat = $_GET["idVentat"];
$tickt1 -> traerImpresionticket1();

?>