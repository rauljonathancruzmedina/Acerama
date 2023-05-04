<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/empresa.controlador.php";
require_once "controladores/clietes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/contizacion.controlador.php";



require_once "modelos/clientes.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/empresa.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/cotizacion.modelo.php";
require_once "extensiones/vendor/autoload.php";



$plantilla = new ControladorPlantilla();
$plantilla -> contrPlantilla();