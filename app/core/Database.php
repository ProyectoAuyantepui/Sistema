<?php  
/*
Clase Database
*/

abstract class Database 
{
	
	//=======================================================================================
	// Propiedades de la clase:
	//=======================================================================================
	private static $serv;
	private static $host;
	private static $port;
	private static $dbname;
	private static $username;
	private static $password;
	
	protected $conn;
	protected $stmt;
	public $error = '-';

	//=======================================================================================
	// Métodos de la clase:
	//=======================================================================================
	// Método: Conectar a la base de datos.
	//=======================================================================================
	protected function conectarBD() {
		try{
			// fichero de configuracion
			$config = parse_ini_file('config/config.ini');

			self::$serv = $config["serv"];
			self::$host = $config["host"];
			self::$port = $config["port"];
			self::$dbname = $config["dbname"];
			self::$username = $config["username"];
			self::$password = $config["password"];

			// $this->conn = new PDO("pgsql:host=localhost;port=5432;dbname=horarios", "postgres", "123456");
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
			//echo "ERROR: " . $e->getMessage();
			$this->error = '1'; // Existe un problema en la conexión con el servidor
		}
	}
	//=======================================================================================
	// Método: Desconectar de la base de datos.
	//=======================================================================================
	protected function desconectarBD() {
		$this->conn = null;
		$this->stmt = null;
	}
}



/*
class DB extends Database{

	public function all(){
		// Conectar a la BD
		$this->conectarBD();

		$sql = 'SELECT * FROM "TDocentes"';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute();

		$resultado = $this->stmt->fetchAll();
			

		// Desconectar de la BD
		$this->desconectarBD();

		return $resultado;
	}	
}

$o = new DB();

var_dump($o->all());

Class CConexion extends PDO{
	
	private $dns = "pgsql:host=localhost;port=5432;dbname=horarios";
	private $pass = '123456';
	private $user = 'postgres';

	public $conectado = false;
	
	public function __construct(){

		try
			{	
				parent::__construct( $this->dns , $this->user , $this->pass);
				parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$this->conectado = true;
			
			}catch(Exception $e){
				$this->conectado = false;

				error_reporting(0);
			}

	}
	
	public function cerrarConexion($stmt) {
	 
		$stmt = null; // doing this is mandatory for connection to get closed
	}
}

*/