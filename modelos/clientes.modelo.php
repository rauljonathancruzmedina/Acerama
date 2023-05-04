<?php

require_once "conexion.php";

class ModeloClientes{

	/*==========================================
					CREAR CLIENTES 
	==========================================*/

	static public function modelCrearCliente($tabla, $datos){

		$ruso = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, direccion, telefono, rfc) VALUES (:nombre, :direccion, :telefono, :rfc)");

		$ruso->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$ruso->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$ruso->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$ruso->bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);

		if ($ruso->execute()) {
			
			return "ok";

		} else {

			return "error";

		}

		$ruso->close();
		$ruso = null;


	}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/
						
	static public function ModelMostrarClientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}
	

	/*=============================================
				EDITAR CLIENTES
	=============================================*/
	static public function modelEditarCliente($tabla, $datos){

		$ruso = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, direccion = :direccion, telefono = :telefono, rfc = :rfc WHERE id = :id");

		$ruso->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$ruso->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$ruso->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$ruso->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$ruso->bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);

		if ($ruso->execute()) {
			
			return "ok";

		} else {

			return "error";

		}

		$ruso->close();

		$ruso = null;


	}


	/*=============================================
				BORRAR CLIENTES
	=============================================*/
	static public function modelBorrarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}



	/*=============================================
	ACTUALIZAR CLIENTE
	=============================================*/

	static public function mdlActualizarClientes($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}



