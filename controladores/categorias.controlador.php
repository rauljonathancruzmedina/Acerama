<?php

class ControladorCategorias{
  /* ======================================== 
            CREAR CATEGORÍAS
  ========================================*/
  static public function ctrCrearCategoria(){
  	
  	if (isset($_POST["nuevaCategoria"])) {
  	
  		if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])) {
 			
 			$tabla = "categorias";

 			$datos = $_POST["nuevaCategoria"];

 			$respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);

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
							        title: "¡La categoría ha sido guardada correctamente!"
							      })
							    });
					

					</script>';
 			} else {
 				echo '<script>

				   var Toast = Swal.mixin({
					   toast: true,
					   position: "top-end",
					   showConfirmButton: false,
					   timer: 3000
					   });

					   Toast.fire({
				       icon: "error",
				       title: "¡La categoría no se pudo registrar.!"
				      })

					</script>';
 			}
 			

  		}else{
  			echo '<script>

				   var Toast = Swal.mixin({
					   toast: true,
					   position: "top-end",
					   showConfirmButton: false,
					   timer: 3000
					   });

					   Toast.fire({
				       icon: "error",
				       title: "¡La categoría no puede ir vacía o llevar caracteres especiales.!"
				      })

					</script>';
  			
  		}
  		
  	} 
  }	

static public function ctrMostrarCategoria($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlMostrarCategoria($tabla, $item, $valor);

		return $respuesta;
	}

static public function ctrEditarCategoria(){

	if (isset($_POST["editarNombre"])) {
		if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {
			
			$tabla ="categorias";

			$datos = array("nombre" => $_POST["editarNombre"],
						   "id" => $_POST["idCategoria"]);

			$respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);

			if ($respuesta == "ok") {
				echo '<script>

						Swal.fire({
						  title: "¡La categoía ha sido editada correctamente!",
						  type: "success",
						  icon: "success",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){
							
								window.location = "categorias";

							}

						});

						</script>';	
			}
			
			
		} else {
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
					        title: "¡El nombre no puede ir vacío o llevar caracteres especiales!"
					      })
				    });
					

				</script>';
		}	
	} 	
}

  /* ======================================== 
            BORRAR CATEGORÍA
  ========================================*/
  
  static public function ctrBorrarCategoria(){
  
  	if (isset($_GET["idCategoria"])) {
  		
  		$tabla = "categorias";
  		$datos = $_GET["idCategoria"];

  		$respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

  		if ($respuesta == "ok") {
  			echo '<script>

						Swal.fire({
						  title: "¡La categoía ha sido borrada correctamente!",
						  type: "success",
						  icon: "success",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){
							
								window.location = "categorias";

							}

						});

						</script>';
  		}
  		
  	} 
  	
  }	

}