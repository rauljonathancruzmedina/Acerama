	

$(document).on("click",".btnEditarCategoria", function(){
	var idCategoria = $(this).attr("idCategoria");

	window.location = "index.php?ruta=editar-categoria&idCategoria="+idCategoria; 
})

/* ======================================== 
            BORRAR CATEGORÍA
  ========================================*/
$(document).on("click",".btnEliminarCategoria", function(){

   var idCategoria = $(this).attr("idCategoria");

	Swal.fire({
		title: '¿Está seguro de borrar la categoría?',
		text: "¡Si no lo está puede cancelar la accion!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar categoría!'
	 }).then((result)=>{

	 	if (result.value) {
	 		window.location ="index.php?ruta=categorias&idCategoria="+idCategoria;
	 	}

	 })
})
			


