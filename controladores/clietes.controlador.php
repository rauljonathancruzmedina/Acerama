<?php

class ControladorClientes{


	/*===========================================
					CREAR CLIENTES
	===========================================*/

	static public function contCrearCliente(){

		if (isset($_POST["nuevoCliente"])) {
			
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) ) {
				
				$tabla = "clientes";

				$datos = array("nombre"=>$_POST["nuevoCliente"],
							   "direccion"=>$_POST["nuevaDireccion"],
							   "telefono"=>$_POST["nuevoTelefono"],
							   "rfc"=>$_POST["nuevoRfc"]);

				$respuesta = ModeloClientes::modelCrearCliente($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

						$(function() {
							    var Toast = Swal.mixin({
							      toast: true,
							      position: "top-end",
							      showConfirmButton: false,
							      timer: 3000
							    });
							    
							      Toast.fire({
							        icon: "success",
							        title: "¡El cliente ha sido guardado correctamente!"
							      })
							    });
					

					</script>';

				}

			}else {
				
				echo '<script>

				$(function() {
					    var Toast = Swal.mixin({
					      toast: true,
					      position: "top-end",
					      showConfirmButton: false,
					      timer: 3000
					    });
					    
					      Toast.fire({
					        icon: "error",
					        title: "¡El cliente no puede ir vacío o llevar caracteres especiales!"
					      })
					    });
					

				</script>';

			}


		}

	}


	/*===========================================
					MOSTRAR CLIENTES
	===========================================*/	

	static public function controMostrarClientes($item, $valor){

		$tabla = "clientes";

		$respuesta = ModeloClientes::ModelMostrarClientes($tabla, $item, $valor);

		return $respuesta;

	}


	/*===========================================
					RDITAR CLIENTES
	===========================================*/	

	static public function contEditCliente(){

		if (isset($_POST["EditNomCliente"])) {
			
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditNomCliente"]) &&
				preg_match('/^[()\-0-9 ]+$/', $_POST["EditTelefono"])) {
				
				$tabla = "clientes";

				$datos = array("id"=>$_POST["EditIdCliente"],
							   "nombre"=>$_POST["EditNomCliente"],
							   "direccion"=>$_POST["EditDireccion"],
							   "telefono"=>$_POST["EditTelefono"],
							   "rfc"=>$_POST["EditRfc"]);

				$respuesta = ModeloClientes::modelEditarCliente($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

						Swal.fire({
						  title: "¡El cliente ha sido editado correctamente!",
						  type: "success",
						  icon: "success",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){
							
								window.location = "clientes";

							}

						});

						</script>';	

				}

			}else {
				
				echo '<script>

				$(function() {
					    var Toast = Swal.mixin({
					      toast: true,
					      position: "top-end",
					      showConfirmButton: false,
					      timer: 3000
					    });
					    
					      Toast.fire({
					        icon: "error",
					        title: "¡El cliente no puede ir vacío o llevar caracteres especiales!"
					      })
					    });
					

				</script>';

			}


		}

	}

	/*===========================================
					BORRAR CLIENTES
	===========================================*/

	static public function contBorrarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="clientes";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloClientes::modelBorrarCliente($tabla, $datos);

			if ($respuesta == "ok") {
				
				echo '<script>

					Swal.fire({
					  title: "El cliente ha sido borrado correctamente",
					  icon: "success",
					  showConfirmButton: true,
				      confirmButtonText: "Cerrar",
				      closeOnConfirm: false
				  }).then((result) => {

				    if(result.value){

				      window.location = "clientes";

				    }

				  })

				</script>';

			}


		}


	}



}

