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
	public $tipoError;

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
			$codigoDeError=$e->getMessage();
			$passForUserDontExist = array('password', 'authentication failed');
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
				foreach($passForUserDontExist as $v){
				    if(strpos($codigoDeError, $v) !== false){
						$this->error= "No Existe el Usuario: ".self::$username." en el gestor de base de datos o la contraseña del mismo es erronea";
						$this->tipoError=2;
				    }
				}
			} else {
				$database = array('database', 'does not exist');
				foreach($database as $v){
				    if(strpos($codigoDeError, $v) !== false){
						$this->error= "No Existe la base de datos: ".self::$dbname." en el gestor de base de datos";
						$this->tipoError=1;

				    }

				}
				foreach($passForUserDontExist as $v){
				    if(strpos($codigoDeError, $v) !== false){
						$this->error= "No Existe el Usuario: ".self::$username." en el gestor de base de datos o la contraseña del mismo es erronea";
						$this->tipoError=2;
				    }
				}
			}
		}
	}

	public function parameterOfConection(){

			include "config/config.php";
			self::$serv = $config["database"]["driver"];
			self::$host = $config["database"]["host"];
			self::$port = $config["database"]["port"];
			self::$dbname = $config["database"]["dbname"];
			self::$username = $config["database"]["username"];
			self::$password = $config["database"]["password"];
			$this->dbname=self::$dbname = $config["database"]["dbname"];
			$this->username=self::$username = $config["database"]["username"];
			$this->password=self::$password = $config["database"]["password"];

	}

	protected function desconectarBD() {
		$this->conn = null;
		$this->stmt = null;
	}
}