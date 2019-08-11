<?php 

if ( !$_SESSION ) { header("location: index.php?controlador=login&actividad=index"); }

require_once "app/modelo/CMantenimiento.php";
require_once "app/modelo/CBitacora.php";
	
	switch($actividad){

		case 'index': 

			require_once "app/vista/mantenimiento/index.php";
		break;

		case 'listarBackups': 

			$OMantenimiento = new CMantenimiento();

 			$mantenimiento = $OMantenimiento->listarBackups();

 			echo json_encode( $mantenimiento );

		break;

		case 'resetCopyBackup': 

			$OMantenimiento = new CMantenimiento();

			$OMantenimiento->setBackupSelected($_POST['backupR']);

 			$mantenimiento = $OMantenimiento->resetCopyBackup();

 			echo json_encode( $mantenimiento );

		break;

		
	}

