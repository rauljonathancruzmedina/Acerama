$('.tablaPCotiza').DataTable({
     "ajax": "ajax/datatable-cotizacion.ajax.php",
     "deferRender": true,
     "retrieve": true,
     "processing": true,
       "language": {

      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
});

/*==========================================================
  AGREGAMOS PRODUCTOS A LA VENTA DESDE LA TABLA        
============================================================*/

$(".tablaPCotiza tbody").on("click", "button.agregarProductoC", function(){

	var idProducto = $(this).attr("idProducto");

	$(this).removeClass("btn-primary agregarProductoC");

	$(this).addClass("btn-default");

	var datos = new FormData();
	datos.append("idProducto",idProducto);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType:false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			var descripcionC = respuesta["descripcion"];
		
			var precioC = respuesta["precio_venta"];
		
			var stockC = respuesta["stock"];
		
			var precioMC = respuesta["precio_ventaa"];

			var apartirDC = respuesta["precio_ventaaa"];

			$(".nuevoProductoC").append(

			'<div class="row" style="padding:5px 15px">'+
				
            /*-- Descripción del producto --*/

           '<div class="col-lg-6 col-xs-12" >'+
               
              '<div class="input-group mb-3">'+
                
              '<div class="input-group">'+
                
                '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-info quitarProductoC" idProducto="'+idProducto+'"><i class="fas fa-trash-alt"></i></button></span>'+

                '<input type="text" class="form-control nuevaDescripcionProductoC" idProducto="'+idProducto+'" name="agregarProductoC" value="'+descripcionC+'" readonly required>'+
              
                 '</div>'+
              
              '</div>'+
            
            '</div>'+ 
            /*==================================
            =            PRECIO VENTA            =
            ===================================*/
            
           '<div class="col-lg-2 col-xs-12 precioCCol" >'+
            
              '<div class="input-group mb-3">'+
            
              '<span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>'+    
              
              '<input type="text" class="form-control nuevoPrecioProductoC" name="nuevoPrecioProductoC" value="'+precioC+'" precioMeC ="'+precioC+'" required>'+
              
              '<input type="hidden" class="form-control nuevoPrecioMayoreoC" name="nuevoPrecioMayoreoC" value="'+precioMC+'"  required>'+             

              '</div>'+
              
            '</div>'+

 

            '<!-- Cantidad del producto -->'+
             '<div class="col-lg-1 col-xs-12 cantidadProductoC">'+
              
              '<div class="input-group mb-3">'+
              
              '<input type="number" class="form-control nuevaCantidadProductoC" name="nuevaCantidadProductoC" min="0.25" step="any" value="0" stockC="'+stockC+'" nuevoStock="'+stockC+'" apartirDe="'+apartirDC+'" required>'+
                      
            '</div>'+
            
            '</div>'+ 

            '<!-- Precio del producto -->'+
             '<div class="col-lg-2 col-xs-12" >'+
            
              '<div class="input-group mb-3">'+
            
              '<div class="input-group-prepend">'+
            
              '<span class="input-group-text"><i class="fa fa-dollar-sign"></i></span>'+
            
              '</div>'+     
            
              '<input type="text" class="form-control total"  name="total" value="" readonly required>'+
            
              '</div>'+
              
            '</div>'+

            '</div>')

            // SUMAR TOTAL DE PRECIOS
            
			sumarTotalPreciosCot();

			// AGREGAR DESCUENTO
			 agregarDescuentoCot();

			 //AGRUPAR PRODUCTOS EN FORMATO JSON
			 listarProductosCot();
			
			// PONER FORMATO AL PRECIO DE LOS PRODUCTOS
			/*$(".nuevoPrecioProductoC").number(true, 2);
			$(".total").number(true, 2);*/

		}
	})
});


/*====================================================================
=            CUANDO CARGUE LA TABLA CADA  VEZ QUE NAVEGUE EN ELLA           
======================================================================*/
$(".tablaPCotiza").on("draw.dt", function(){

	if (localStorage.getItem("quitarProductoC") != null) {

		var listaIdProductosC = JSON.parse(localStorage.getItem("quitarProductoC"));

		for (var i = 0; i <listaIdProductosC.length; i++) {

			$("button.recuperarBotonC[idProducto='"+listaIdProductosC[i][idProducto]+"']").removeClass('btn-default');
			$("button.recuperarBotonC[idProducto='"+listaIdProductosC[i][idProducto]+"']").addClass('btn-primary agregarProductoC');


		}

	}

});

/*====================================================================
=            QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN           
======================================================================*/

var idQuitarProductoC =[];

localStorage.removeItem("quitarProductoC");

$(".formularioCotiz").on("click", "button.quitarProductoC", function(){

	$(this).parent().parent().parent().parent().parent().remove();

	var idProducto = $(this).attr("idProducto");

  /*=========================================================
	ALMACENAR EN EL LOCALATORAGE EL ID DEL PRODUCTO A QUITAR            =
	=========================================================*/
	
	if (localStorage.getItem("quitarProductoC")== null) {

		idQuitarProductoC = [];
	}else{

		 idQuitarProductoC.concat(localStorage.getItem("quitarProductoC"));
	}

	idQuitarProductoC.push({"idProducto":idProducto});

	localStorage.setItem("quitarProductoC", JSON.stringify(idQuitarProductoC)); 
	$("button.recuperarBotonC[idProducto='"+idProducto+"']").removeClass('btn-default');

	$("button.recuperarBotonC[idProducto='"+idProducto+"']").addClass('btn-primary agregarProductoC'); 

	if ($(".nuevoProductoC").children().length == 0) {
 		
 		$("#nuevoDescuentoCo").val(0);

 		$("#totalC").attr("total", 0);

 		$("#nuevoTotalCo").attr("total", 0);
	
	}else {
	 // SUMAR TOTAL DE PRECIOS   
			sumarTotalPreciosCot();
	 // AGREGAR DESCUENTO
			agregarDescuentoCot();
	 //AGRUPAR PRODUCTOS EN FORMATO JSON
		listarProductosCot();
	}
	
})
/*=============================================
=            MODIFICAR LA CANTIDAD            =
=============================================*/

$(".formularioCotiz").on("change", "input.nuevaCantidadProductoC", function(){

	/*=====================================================
	=            COMPARACION SI ES LA CANTIDAS ES DE MAYOREO            =
	=====================================================*/
	var precio = $(this).parent().parent().parent().children(".precioCCol").children().children(".nuevoPrecioProductoC");

	var precioFinal = $(this).val() * precio.val();

	var precioTotalProducto = $(this).parent().parent().parent().children().children().children(".total");

	precioTotalProducto.val(precioFinal);	

	var nuevoStock = Number($(this).attr("stockC")) - $(this).val();

	$(this).attr("nuevoStock", nuevoStock);

	if (Number($(this).attr("apartirDe")) != 0) {

		if (Number($(this).val()) >= Number($(this).attr("apartirDe"))) {

			var precioante = $(this).parent().parent().parent().children(".precioCCol").children().children(".nuevoPrecioProductoC");
	 	
		  var precioM = $(this).parent().parent().parent().children(".precioCCol").children().children(".nuevoPrecioMayoreoC");
			
			var precioFinal = $(this).val() * precioM.val();
			
			precioante.val(precioM.val());
			
			var precioTotalProducto = $(this).parent().parent().parent().children().children().children(".total");

			precioTotalProducto.val(precioFinal);	

			var nuevoStock = Number($(this).attr("stockC")) - $(this).val();
		
		}else{

		precio.val(precio.attr("precioMeC"));
	
		}
	
	}


				 // SUMAR TOTAL DE PRECIOS
			            
				sumarTotalPreciosCot();


				// AGREGAR DESCUENTO
				agregarDescuentoCot();

				 //AGRUPAR PRODUCTOS EN FORMATO JSON
				listarProductosCot();


			

})

/*===============================================
=            SUMAR TODOS LOS PRECIOS            =
===============================================*/

function sumarTotalPreciosCot(){
	var precioItem = $(".total");
	var arraySumaPrecio = [];

	for (var i = 0; i < precioItem.length; i++) {

		arraySumaPrecio.push(Number($(precioItem[i]).val()));

	}
	
	function sumarArrayPrecios(total, numero){

		return total + numero;

	}

	var sumaTotalPrecio = arraySumaPrecio.reduce(sumarArrayPrecios);
	
	 $("#nuevoTotalCo").val(sumaTotalPrecio);
	  $("#totalC").val(sumaTotalPrecio);
	 $("#nuevoTotalCo").attr("total", sumaTotalPrecio);
}

/*=============================
=  FUNCIÓN AGREGAR DESCUENTO   
=============================*/

function agregarDescuentoCot(){

	var descuento = $("#nuevoDescuentoCo").val();
	var precioTotal = $("#nuevoTotalCo").attr("total");

	var totalConDescuento = Number(precioTotal) - Number(descuento);

	$("#nuevoTotalCo").val(totalConDescuento);
	$("#totalC").val(totalConDescuento);

	$("#nuevoPrecioDescuentC").val(descuento);
	$("#nuevoPrecioNetC").val(precioTotal);
}

/*==================================================
=            CUANDO CAMBIE EL DESCUENTO            =
==================================================*/
$("#nuevoDescuentoCo").change(function(){

	agregarDescuentoCot();
});

/*=================================================
=            LISTAR TODOS LO PRODUCTOS            =
=================================================*/
function listarProductosCot(){
	
	var listaProductosCot =[];

	var descripcion = $(".nuevaDescripcionProductoC");

	var cantidad = $(".nuevaCantidadProductoC");

	var precio = $(".nuevoPrecioProductoC");

	var total = $(".total");

	var efectivo = $(".nuevoValorEfectivo");

	for (var i = 0; i < descripcion.length; i++) {
	
	listaProductosCot.push({ "id" : $(descripcion[i]).attr("idProducto"),
						  "descripcion" : $(descripcion[i]).val(),
						  "cantidad" : $(cantidad[i]).val(),
						  "stockC" : $(cantidad[i]).attr("nuevoStock"),
						  "precio" : $(precio[i]).val(),
						  "total" : $(total[i]).val()})	
	
	}

	$("#listaProductC").val(JSON.stringify(listaProductosCot));

}


/*======================================================================================================
FUNCIÓN PARA DESACTIVAR LOS BOTONES AGREGAR CUANDO EL PRODUCTO YA HABIA SIDO SELECCIONADO EN LA CARPETA
======================================================================================================*/

function quitarAgregarProductoC(){

	//Capturamos todos los id de productos que fueron elegidos en la venta
	var idProductosC = $(".quitarProductoC");

	//Capturamos todos los botones de agregar que aparecen en la tabla
	var botonesTablaC = $(".tablaPCotiza tbody button.agregarProductoC");

	//Recorremos en un ciclo para obtener los diferentes idProductosCC que dieron agregados a la venta
	for (var i = 0; i < idProductosC.length; i++) {

		//Capturamos los id de los productos agregados a la venta
		var botonC = $(idProductosC[i]).attr("idProducto");

		//Hacemos un recorrido por la tabla que aparece para desactivar los botones de agregar
		for (var j = 0; j < botonesTablaC.length; j++) {
					
			if ($(botonesTablaC[j]).attr("idProducto") == botonC) {


				  $(botonesTablaC[j]).removeClass("btn-primary agregarProductoC");
				  $(botonesTablaC[j]).addClass("btn-default");

			}
		}		
	}

}

/*===========================================================================
CADA VEZ QUE CARGUE LA TABLA CUANDO NAVEGAMOS EN ELLA EJECUTAMOS LA FUNCIÓN 
===========================================================================*/

$('.tablaPCotiza').on('draw.dt', function(){

	quitarAgregarProductoC();

})

/*====================================
=            BORRAR COTIZACION            =
====================================*/


$(".tablaCot").on("click", ".btnElimCotiz", function(){

	var idCotiz = $(this).attr("idCotiz");
	

 	Swal.fire({
    title: '¿Está seguro de borrar la cotización?',
    text: '¡Si no lo está puede cancelar la accion!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor:'#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, borrar cotización!'
   }).then((result)=>{

    if (result.value) {
      window.location ="index.php?ruta=cotizacion&idCotiz="+idCotiz;
    }

   })
})


/*========================================
=            IMPRIMIR FACTURA COTIZACION           =
========================================*/
$(document).on("click",".btnPdf", function(){

	var codigo = $(this).attr("idCotipdf");
	window.open("extensiones/tcpdf/pdf/cotizacion.php?codigo="+codigo, "_blank");

})


$(".tablaCot").on("click", ".btnEditaC", function(){

	var idEdCotiz = $(this).attr("idEdCotiz");
	window.location = "index.php?ruta=editar-cotizacion&idECotiza="+idEdCotiz;

})
