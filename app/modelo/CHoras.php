<?php  

require_once "app/core/Database.php";
class CHoras extends Database{

	public function obtenerHoras(){
		
		$this->conectarBD();
		$sql = 'SELECT * FROM "THoras"';
		$this->stmt = $this->conn->prepare($sql);
		$this->stmt->execute(); 
		$num_rows = $this->stmt->rowCount();
		$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
       	$this->desconectarBD();
    	return $data;
	}
}

