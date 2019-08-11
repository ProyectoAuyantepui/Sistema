<?php  

abstract class Database 
{

	private static $serv;
	private static $host;
	private static $port;
	private static $dbname;
	private static $username;
	private static $password;
	protected $conn;
	protected $stmt;
	public $error = '-';

	protected function conectarBD() {
		
		try{

			include "config/config.php";
			self::$serv = $config["database"]["driver"];
			self::$host = $config["database"]["host"];
			self::$port = $config["database"]["port"];
			self::$dbname = $config["database"]["dbname"];
			self::$username = $config["database"]["username"];
			self::$password = $config["database"]["password"];

			$this->conn = new PDO( 
									self::$serv.
									":host=".self::$host.
									";port=".self::$port.
									";dbname=".self::$dbname ,
									self::$username, 
									self::$password 
								);

			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			$this->error = '1'; 
		}
	}

	protected function desconectarBD() {
		$this->conn = null;
		$this->stmt = null;
	}
}