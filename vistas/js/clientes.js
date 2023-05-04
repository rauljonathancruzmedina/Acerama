	/*=============================================
			EDITAR CLIENTES
	=============================================*/
$(document).on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");

	window.location = "index.php?ruta=editar-cliente&idCliente="+idCliente;

})

/*=============================================
			ELIMINAR CLIENTES
=============================================*/

$(document).on("click", ".btnEliminarCliente", function(){

	var idCliente = $(this).attr("idCliente");

	Swal.fire({
	  title: '¿Estas seguro de eliminar el cliente?',
	  text: '¡Si no lo está puede cancelar la acción!',
	  type: 'warning',
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar cliente!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=clientes&idCliente="+idCliente;

    }

  })


})