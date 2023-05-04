/*==================================================
				SUBIR FOTO DE USUARIO
==================================================*/

$(".nuevaFoto").change(function(){

	var imagen = this.files[0];

	/*==================================================
				VALIDAR EL FORMATO DE LA IMAGEN PNG OH JPG
	==================================================*/

	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

		$(".nuevaFoto").val("");

			$(function() {
			    var Toast = Swal.mixin({
			      toast: true,
			      position: "top-end",
			      showConfirmButton: false,
			      timer: 3000
			    });
			    
			      Toast.fire({
			        icon: "error",
			        title: "¡Error!, La imagen debe estar en formato PNG o JPG.!"
			      })
			    
			});			


	} else {

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on("load", function(event){

			var rutaImagen = event.target.result;

			$(".previsualizar").attr("src", rutaImagen);

		})

	}



})


/*=============================================
EDITAR USUARIO
=============================================*/
$(document).on("click", ".btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");


	window.location = "index.php?ruta=editar-usuario&idUsuario="+idUsuario;

})


	/*=============================================
			ACTIVAR USUARIO
	=============================================*/

$(document).on("click", ".btnActivar", function(){

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
 	datos.append("activarId", idUsuario);
  	datos.append("activarUsuario", estadoUsuario);

  	$.ajax({

	  url:"ajax/usuarios.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      if(window.matchMedia("(max-width:767px)").matches){
		
      		 Swal.fire({
		      	title: "El usuario ha sido actualizado correctamente",
		      	icon: "success",
		      	confirmButtonText: "¡Cerrar!"
		    	}).then(function(result) {
		        
		        	if (result.value) {

		        	window.location = "usuarios";

		        }

		      });


		}
      }

  	})

  	if(estadoUsuario == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoUsuario',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoUsuario',0);

  	}

})



/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoUsuario").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

	    		$("#nuevoUsuario").val("");

	    	}

	    }

	})
})

/*=============================================
		BORRAR USUARIO
=============================================*/
$(document).on("click", ".btnEliminarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");
	var fotoUsuario = $(this).attr("fotoUsuario");
	var usuario = $(this).attr("usuario");



	Swal.fire({
	  title: '¿Estas seguro de eliminar el usuario?',
	  text: '¡Si no lo está puede cancelar la acción!',
	  type: 'warning',
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

    }

  })

})






