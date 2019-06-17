<?php

/*
********  A U Y A N T E P U I  ********
- Trayecto III - Fase II

Proyecto : 

- Sistema para la Gestion de Horarios del PNF en Informatica de la UPTAEB

Autores : 

- Juan E. Chirinos
- Yesika Betancourt
- Yordy Jimenez

Tecnologias : 

- HTML5
- PHP >= 7.0
- Postgresql 9.5
- Materialize v0.100.1
- jQuery v1.12.4
- JQuery Validation Plugin v1.17.0
- PaginationTdA 1.0
*/
date_default_timezone_set('America/Caracas');
// echo date('d-m-Y');
// exit();
require_once "config/config.php";


  session_start();
	if ( $_SESSION && empty( $_GET['controlador'] ) ) {

		// si hay una sesion iniciada y pero la url esta vacia : 
		// el controlador sera Login y la actividad sera home
		$controlador = 'home';
		$actividad = 'index';	

	}elseif ( !$_SESSION && empty( $_GET['controlador'] ) ) { 
		
		// si no hay una sesion iniciada y la url esta vacia :
		// el controlador sera Login y la actividad sera el index osea la vista del login

		$controlador = 'login';
		$actividad = 'index';	
	
	}else{

		$controlador = $_GET['controlador'];
		$actividad = $_GET['actividad'];
	}

	if ( !is_file("app/controlador/". ucwords($controlador) ."Controlador.php") ) {	

		// si no existe un archivo en la carpeta controlador que se llame como el controlador de la url

		$actividad = 'noEncontrada';
		echo $actividad;
	} else {

		// si el archivo con el nombre del controlador de la url existe en la carpeta controlador
		require_once "app/controlador/". ucwords($controlador) ."Controlador.php";
	}
