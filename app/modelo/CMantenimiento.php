<?php 

class CMantenimiento{
	private static $serv;
	private static $host;
	private static $port;
	private static $dbname;
	private static $username;
	private static $password;
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
		$output=glob("backups/prueba/*.sql");
		return $output;
	}

	public function resetCopyBackup(){
	$backupName=$this->backup;
	$dbname='horarios1';

	include "config/config.php";
		self::$serv = $config["database"]["driver"];
		self::$host = $config["database"]["host"];
		self::$port = $config["database"]["port"];
		self::$dbname = $config["database"]["dbname"];
		self::$username = $config["database"]["username"];
		self::$password = $config["database"]["password"];
	$salida = system('PGPASSWORD="543217" pg_restore -h localhost -p 5432 -U postgres -d horarios1 -v "/var/www/auyantepui-git/backups/prueba/horarios1.backup";');
	return "Success";

	}



}
 ?>