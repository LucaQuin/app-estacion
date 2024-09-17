<?php 
	// carga de modelos para que esten disponibles en todos los controladores
	// incluimos la variables de entorno
	include_once 'env.php';

	// inicia o continua la sesión
	session_start();
	session_unset();
	session_destroy();

	// Carga del motor de plantillas
	include_once 'lib/Motor/Motor.php';

	// por defecto seccion es landing
	$seccion = "landing";


	// si existe slug entonces la sección es su contenido
	if($_GET['slug']!=""){
		$seccion = $_GET['slug'];
	}

	// verificamos que exista el controlador
	if(!file_exists('controllers/'.$seccion.'Controller.php')){
		// si no existe el controlador lo llevamos al controlador de error 404
		$seccion = "error404";
	}

	$aux=0;

	// listas de acceso por tipo de usuario
	$seccion_dispo = ["landing", "panel"];

	// recorro la lista de secciones permitidas
	foreach ($seccion_dispo as $key => $value) {
		if($value==$seccion){
			$aux++;
		}
	}

	// 
	if ($aux==0) {
		$seccion = "error404";
	}

	// Carga del controlador
	include_once 'controllers/'.$seccion.'Controller.php';



// https://mattprofe.com.ar/proyectos/app-estacion datos.php?mode=list-stations
 ?>