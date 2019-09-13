<?php 

class CMantenimiento{
	private static $serv;
	private static $host;
	private static $port;
	private static $dbname;
	private static $username;
	private static $password;
	private static $fecha_corta;
	protected $conn;
	protected $stmt;
	public $error = '-';

	public function setBackupSelected( $backup ){

		$this->backup = $backup;
	}


	public function getBackupSelected(  ){

		return $this->backup;
	}

	public function listarBackups(){
		$output=glob("backups/prueba/*.dump");
		return $output;
	}

	public function createBackup(){

	include "config/config.php";
		self::$serv = $config["database"]["driver"];
		self::$host = $config["database"]["host"];
		self::$port = $config["database"]["port"];
		self::$dbname = $config["database"]["dbname"];
		self::$username = $config["database"]["username"];
		self::$password = $config["database"]["password"];
		self::$fecha_corta = $config["fecha_corta"];
		$dbnameRespaldo='horarios1';

		$salida = system('PGPASSWORD='.self::$password.' pg_dump -U '.self::$username.' -W -h '.self::$host.' '.self::$dbname.'> /var/www/auyantepui-git/backups/prueba/horarios_'.self::$fecha_corta.'.dump;');
	return "Success";
	}

	public function resetCopyBackup(){
	include "config/config.php";
		self::$serv = $config["database"]["driver"];
		self::$host = $config["database"]["host"];
		self::$port = $config["database"]["port"];
		self::$dbname = $config["database"]["dbname"];
		self::$username = $config["database"]["username"];
		self::$password = $config["database"]["password"];
		$dbnameRespaldo=$_SESSION['databaseRespaldo'];
	$backupName=$this->backup;
	$salida = system('PGPASSWORD="543217"  dropdb horarios1 -U postgres;');
	$salida = system('PGPASSWORD="543217"  createdb horarios1 -U postgres;');
	shell_exec('PGPASSWORD="543217" psql -d horarios1 < /var/www/auyantepui-git/backups/prueba/horarios123.dump -U postgres;'); 
	return "Success";

	}



}
 ?>