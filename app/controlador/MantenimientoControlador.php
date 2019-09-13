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

		case 'createBackup': 

				$OMantenimiento = new CMantenimiento();
	 			$mantenimiento = $OMantenimiento->createBackup();
	 			echo json_encode( $mantenimiento );

		break;

		case 'resetCopyBackup': 

			$_SESSION['databaseRespaldo'] ='horarios1';

			if (isset($_SESSION['databaseRespaldo'])) {
				$OMantenimiento = new CMantenimiento();
				$OMantenimiento->setBackupSelected($_POST['backupR']);
	 			$mantenimiento = $OMantenimiento->resetCopyBackup();
	 			echo json_encode( $mantenimiento );
			}

		break;

		
	}

