<?php 

if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

// switch case a la variable actividad que recibimos en el index.php por get
	switch($actividad){

		
		// HORARIOS DE SECCIONES

		case 'index': 

			require_once "app/vista/horarios/ambientes/index.php";
		break;
		
	}


