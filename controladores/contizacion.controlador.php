<?php

class ControladorCotiz{


        /* ======================================== 
                    MOSTRAR COTIZACIONES
        ========================================*/

    static public function ctrMostrarCotiz($item, $valor){

        $tabla = "cotizacion";

        $respuesta = ModeloCotiz::MdlMostrarCotiz($tabla, $item, $valor);

        return $respuesta;
    }

        /* ======================================== 
                    CREAR COTIZACIONES
        ========================================*/

    static public function ctrCrearCotixacion(){

      if (isset($_POST["CodCot"])) {
        
          $tabla = "cotizacion";

          $datos = array("remitente"=>$_POST["nueVendCC"],
                         "codigo"=>$_POST["CodCot"], 
                         "cliente"=>$_POST["NuevClienteC"],
                         "productos"=>$_POST["listaProductC"],
                         "comentarios"=>$_POST["NuevoComenC"],
                         "descuento"=>$_POST["nuevoDescuentoCo"],
                         "neto"=>$_POST["nuevoPrecioNetC"],
                         "total"=>$_POST["nuevoTotalCo"]);

          $respuesta = ModeloCotiz::mdlCrearCotiz($tabla, $datos);

          if ($respuesta == "ok") {
            
              echo '<script>

                  Swal.fire({
                    title: "¡La cotización a sido creada correctamente!",
                    type: "success",
                    icon: "success",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                  }).then(function(result){

                    if(result.value){
                    
                      window.location = "cotizacion";

                    }

                  });

              </script>';

          }

      }


    }

        /* ======================================== 
                      BORRAR COTIZACIONES
        ========================================*/

  static public function ctrBrorrarCotiz(){

    if (isset($_GET["idCotiz"])) {
      
        $tabla = "cotizacion";
        $dato = $_GET["idCotiz"];

        $respuesta = ModeloCotiz::mdlBorrarCotiz($tabla, $dato);

        if ($respuesta == "ok") {
         
          echo '<script>

                  Swal.fire({
                    title: "¡La cotización a sido borrada correctamente!",
                    type: "success",
                    icon: "success",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                  }).then(function(result){

                    if(result.value){
                    
                      window.location = "cotizacion";

                    }

                  });

              </script>';

        }

    }

  }

   /*--=====================================
        EDITAR CATEGORIA
    ======================================-->*/

    static public function ctrEditCotizacion(){
      
      if(isset($_POST["CodCot"])){

        /*=============================================
        GUARDAR LA COMPRA
        =============================================*/ 

        $tabla = "cotizacion";

          $datos = array("remitente"=>$_POST["EditarC"],
                         "codigo"=>$_POST["CodCot"],
                         "fecha"=>$_POST["nuevaFechaD"],   
                         "cliente"=>$_POST["selecEditClienteC"],
                         "productos"=>$_POST["listaProductC"],
                         "comentarios"=>$_POST["EditComenC"],
                         "descuento"=>$_POST["nuevoDescuentoCo"],
                         "neto"=>$_POST["nuevoPrecioNetC"],
                         "total"=>$_POST["nuevoTotalCo"]);

        $respuesta = ModeloCotiz::mdlEditCotizacion($tabla, $datos);

        if($respuesta == "ok"){
          
          echo'<script>

          Swal.fire({
              type: "success",
              icon: "success",
              title: "¡Bien hecho!",
              text: "¡La cotizacion ha sido editada correctamente.!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
              }).then(function(result){
                  if (result.value) {

                  window.location = "cotizacion";

                  }
                })

          </script>';

        }


      }   
    
    } 




}