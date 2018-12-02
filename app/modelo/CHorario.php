<?php  

require_once "app/core/Database.php";

class CHorario extends Database{

	protected $codHor; 
  protected $cedDoc; 
  protected $codTie;

  private $codActAdm;


  private $codSec;
  private $codAmb;
  private $codUniCur;


  protected $tipo;
  protected $estado; 

  public function setCodHor( $codHor ){
    $this->codHor = $codHor;
  }

  public function setCedDoc( $cedDoc ){
    $this->cedDoc = $cedDoc;
  }
  
  public function setCodTie( $codTie ){
    $this->codTie = $codTie;
  }


  public function setCodSec( $codSec ){
    $this->codSec = $codSec;
  }
  
  public function setCodAmb( $codAmb ){
    $this->codAmb = $codAmb;
  }
  
  public function setCodUniCur( $codUniCur ){
    $this->codUniCur = $codUniCur;
  }

  public function getCodSec(  ){
    return $this->codSec;
  }
  
  public function getCodAmb(  ){
    return $this->codAmb;
  }
    
  public function getCodUniCur( ){
    return $this->codUniCur;
  }

  
  public function setTipo( $tipo ){
    $this->tipo = $tipo;
  }
  
  public function setEstado( $estado ){
    $this->estado = $estado;
  }

    public function setCodActAdm( $codActAdm ){
    $this->codActAdm = $codActAdm;
  }
  
  public function getCodActAdm(  ){
    return $this->codActAdm;
  }

  public function getCodHor(  ){
    return $this->codHor;
  }
  
  public function getCodTie(  ){
    return $this->codTie;
  }
  
  public function getTipo( ){
    return $this->tipo;
  }
  
  public function getEstado( ){
    return $this->estado;
  }

  public function asignarActividadHorario(){

    $this->conectarBD();
    $sql = "INSERT INTO \"THorarios\"

        (\"codHor\", \"cedDoc\", \"codSec\", \"codUniCur\", \"codActAdm\", \"codTie\", \"codAmb\", tipo, estado)

        VALUES 
        
        (default, ?, ?, ?, ?, ?, ?, ?, ?)";

    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->bindValue(1, $this->cedDoc);
    $this->stmt->bindValue(2, $this->codSec);
    $this->stmt->bindValue(3, $this->codUniCur);
    $this->stmt->bindValue(4, $this->codActAdm);
    $this->stmt->bindValue(5, $this->codTie);
    $this->stmt->bindValue(6, $this->codAmb);
    $this->stmt->bindValue(7, $this->tipo);
    $this->stmt->bindValue(8, $this->estado);
    $result = $this->stmt->execute();
    $this->desconectarBD();

    return $result;
  }


  public function consultarAmbientesDisponibles(){
    
      $this->conectarBD();
      $sql = "SELECT 
                a.\"codAmb\"
              FROM 
                \"TAmbientes\" as a
              WHERE 

              NOT EXISTS(
  
                SELECT 
                * 
                FROM 
                \"THorarios\" as h
                WHERE 
                a.\"codAmb\"=h.\"codAmb\"
                AND 
                h.\"codTie\" IN(
                  $this->codTie
                )
              )";

      $this->stmt = $this->conn->prepare($sql);
      $this->stmt->execute(); 
      $result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
      $this->desconectarBD();

      return $result;
  }

  public function cambiarDocenteHorarioSeccion(){
    
      $this->conectarBD();
      $sql = 'UPDATE 
              "THorarios"
              SET  
                "cedDoc"= :cedDoc
              WHERE 
                "codSec" = :codSec
              AND
                "codUniCur" = :codUniCur';

      $this->stmt = $this->conn->prepare($sql);
      $this->stmt->bindParam(':cedDoc', $this->cedDoc);
      $this->stmt->bindParam(':codSec', $this->codSec);
      $this->stmt->bindParam(':codUniCur', $this->codUniCur);
      $result = $this->stmt->execute();
      $this->desconectarBD();

      return $result;
  }

  public function cambiarAmbienteHorarioSeccion(){
    
      $this->conectarBD();
      $sql = 'UPDATE 
              "THorarios"
              SET  
                "codAmb"= :codAmb
              WHERE 
                "codSec" = :codSec
              AND
                "codUniCur" = :codUniCur
              AND
                "codTie" = :codTie';

      $this->stmt = $this->conn->prepare($sql);
      $this->stmt->bindParam(':codAmb', $this->codAmb);
      $this->stmt->bindParam(':codSec', $this->codSec);
      $this->stmt->bindParam(':codTie', $this->codTie);
      $this->stmt->bindParam(':codUniCur', $this->codUniCur);
      $result = $this->stmt->execute();
      $this->desconectarBD();

      return $result;
  }

  public function consultarHorarioSeccion( $fase_seleccionada ){

    $this->conectarBD();
    $sql = ' SELECT "THorarios".*, "TUnidCurr"."codUniCur", "TUnidCurr".nombre as nombreMateria, 
                      "TDocentes".nombre as nombreDocente, "TActiAdmi".*
              FROM "THorarios" LEFT JOIN "TActiAdmi" 
              ON "TActiAdmi"."codActAdm" = "THorarios"."codActAdm" 
              LEFT JOIN "TUnidCurr"
              ON "THorarios"."codUniCur" = "TUnidCurr"."codUniCur"
              LEFT JOIN "TDocentes"
              ON "TDocentes"."cedDoc" = "THorarios"."cedDoc"
              LEFT JOIN "TAmbientes"
              ON "TAmbientes"."codAmb" = "THorarios"."codAmb"
              WHERE "THorarios"."codSec" = :codSec
              OR "TUnidCurr".fase in (:fase_seleccionada,3)';
    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->bindParam(':codSec',$this->codSec);
    $this->stmt->bindParam(':fase_seleccionada',$fase_seleccionada);
    $this->stmt->execute(); 
    $result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
    $this->desconectarBD();

    return $result;
  }


  public function consultarActividadesPorUniCur(){

    $this->conectarBD();
    $sql = 'SELECT 
              *
            FROM 
              "THorarios"
            WHERE 
              "THorarios"."codSec" = :codSec AND 
              "THorarios"."codUniCur" = :codUniCur';
    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->bindParam(':codSec',$this->codSec);
    $this->stmt->bindParam(':codUniCur',$this->codUniCur);
    $this->stmt->execute(); 
    $horario = $this->stmt->fetchAll(PDO::FETCH_OBJ);

    $sql = 'SELECT 
              DISTINCT( "TDocentes".* )
            FROM 
              "THorarios", 
              "TDocentes", 
              "TSecciones", 
              "TUnidCurr", 
              "TAmbientes"
            WHERE 
              "TDocentes"."cedDoc" = "THorarios"."cedDoc" AND
              "TSecciones"."codSec" = "THorarios"."codSec" AND
              "TUnidCurr"."codUniCur" = "THorarios"."codUniCur" AND
              "THorarios"."codSec" = :codSec AND
              "TUnidCurr"."codUniCur" = :codUniCur';
    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->bindParam(':codSec',$this->codSec);
    $this->stmt->bindParam(':codUniCur',$this->codUniCur);
    $this->stmt->execute(); 
    $docente = $this->stmt->fetch(PDO::FETCH_OBJ);

    $this->desconectarBD();

    return [ "docente" => $docente , "actividades" => $horario ];
  }

  public function consultarHorarioAmbiente(){

    $this->conectarBD();
    // $sql = 'SELECT * FROM "THorarios" WHERE "codAmb" = :codAmb';
    $sql = ' SELECT "THorarios".*, "TUnidCurr"."codUniCur", "TUnidCurr".nombre as nombreMateria, "TDocentes".nombre as nombreDocente, "TSecciones"."codSec"
              FROM "THorarios"
              LEFT JOIN "TDocentes"
              ON "TDocentes"."cedDoc" = "THorarios"."cedDoc" 
              LEFT JOIN "TSecciones"
              ON "THorarios"."codSec" = "TSecciones"."codSec"
              LEFT JOIN "TUnidCurr"
              ON "THorarios"."codUniCur" = "TUnidCurr"."codUniCur"
              WHERE "THorarios"."codAmb" = :codAmb ';

    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->bindParam(':codAmb',$this->codAmb);
    $this->stmt->execute(); 
    $result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
    $this->desconectarBD();

    return $result;
  }

  public function consultarHorarioDocente(){

    $this->conectarBD();
    $sql = ' SELECT "THorarios".*, "TUnidCurr"."codUniCur", "TUnidCurr".nombre as nombreMateria, 
                    "TDocentes".nombre as nombreDocente, "TActiAdmi".*
              FROM "THorarios" LEFT JOIN "TActiAdmi" 
              ON "TActiAdmi"."codActAdm" = "THorarios"."codActAdm" 
              LEFT JOIN "TUnidCurr"
              ON "THorarios"."codUniCur" = "TUnidCurr"."codUniCur"
              LEFT JOIN "TDocentes"
              ON "TDocentes"."cedDoc" = "THorarios"."cedDoc"
              LEFT JOIN "TAmbientes"
              ON "TAmbientes"."codAmb" = "THorarios"."codAmb"
              WHERE "THorarios"."cedDoc" = :cedDoc ';
    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->bindParam(':cedDoc',$this->cedDoc);
    $this->stmt->execute(); 
    $result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
    $this->desconectarBD();

    return $result;
  }

  public function consultarCargaHorariaDocente(){

    $this->conectarBD();
    $sql = 'SELECT * FROM get_carga_horaria_docente( :cedDoc )';
    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->bindParam(':cedDoc',$this->cedDoc);
    $this->stmt->execute(); 
    $result = $this->stmt->fetch(PDO::FETCH_OBJ);
    $this->desconectarBD();

    return $result;
  }

  public function listarAmbientesConHorario(){

    $this->conectarBD();
    $sql = 'SELECT * FROM 
            "TAmbientes" AS a 

            WHERE EXISTS(

            SELECT 
              * 
            FROM 
            "THorarios" AS h
            WHERE 
            a."codAmb" =  h."codAmb"
    )';

    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->execute(); 
    $result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
    $this->desconectarBD();
    return $result;
  }

  public function listarDocentesConHorario(){

    $this->conectarBD();
    $sql = 'SELECT * FROM 
            "TDocentes" AS d 

            WHERE EXISTS(

            SELECT 
              * 
            FROM 
            "THorarios" AS h
            WHERE 
            d."cedDoc" =  h."cedDoc"
    )';
    
    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->execute(); 
    $result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
    $this->desconectarBD();
    return $result;
  }

  public function unidCurrHorarioSeccion( $fase_seleccionada ){

    $this->conectarBD();
    $sql = 'SELECT 
              uc.*
            FROM 
              "TUnidCurr" as uc,
              "TSecciones" as s 
            WHERE
            uc.trayecto=s.trayecto and
             uc.fase= any
             (
            SELECT 
              uc.fase
            FROM 
              "TUnidCurr" as uc
              WHERE uc.fase = :fase_seleccionada or fase=3 )
              AND 
              s."codSec" = :codSec';
    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->bindParam(':codSec',$this->codSec);
    $this->stmt->bindParam(':fase_seleccionada',$fase_seleccionada);
    $this->stmt->execute(); 
    $result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
    $this->desconectarBD();

    return $result;


  }

  public function unidCurrAsignadasHorarioSeccion( $fase_seleccionada ){
    
    $this->conectarBD();
    $sql = 'SELECT 
            uc.* 
            FROM 
            "TUnidCurr" AS uc
            WHERE 
            EXISTS(
                SELECT 
                * 
                FROM 
                "THorarios" AS h , "TSecciones" AS s 
                WHERE 
                uc."codUniCur" =  h."codUniCur"
                AND 
                uc."codPnf" = s."pnf"
                AND 
                uc."trayecto" = s."trayecto"
                and
                fase in (3,:fase_seleccionada)
                AND 
                h."codSec" = :codSec
            )';

    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->bindParam(':codSec',$this->codSec);
    $this->stmt->bindParam(':fase_seleccionada',$fase_seleccionada);
    $this->stmt->execute(); 
    $result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
    $this->desconectarBD();

    return $result;
  }



  public function eliminarHorario(){ }

  public function cambiarEstadoHorario(){ }



  public function consultarDocentesDisponibles(){
      
    $this->conectarBD();
    $sql = "SELECT 
              d.\"cedDoc\",
              d.\"nombre\",
              d.\"apellido\"
            FROM 
              \"TDocentes\" as d
            WHERE 

             NOT EXISTS(
    
              SELECT 
              * 
              FROM 
              \"THorarios\" as h
              WHERE 
              d.\"cedDoc\"=h.\"cedDoc\"
              AND 
              h.\"codTie\" IN(
                $this->codTie
              )
            )";

    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->execute(); 
    $result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
    $this->desconectarBD();

    return $result;
  }

public function MoverBloque() {

    $this->conectarBD();
    $sql = 'UPDATE "THorarios"
             SET "codTie"= :codTie
             WHERE "codHor" = :codHor';

    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->bindParam(':codTie',$this->codTie);
    $this->stmt->bindParam(':codHor',$this->codHor);
    $result = $this->stmt->execute();

    if ( $result ) {
       $sql = 'UPDATE 
               "THorarios"
               SET 
               "cedDoc"= null, "codAmb"= null
               WHERE 
               "codUniCur" = :codUniCur
               AND
               "codSec" = :codSec';
        
           $this->stmt = $this->conn->prepare($sql);
           $this->stmt->bindParam(':codUniCur',$this->codUniCur);
           $this->stmt->bindParam(':codSec',$this->codSec);
           $result2 = $this->stmt->execute();
    } 
    
    $this->desconectarBD();

    return $result2;
}

public function moverBloqueDocente() {

    $this->conectarBD();
    $sql = 'UPDATE "THorarios"
             SET "codTie"= :codTie
             WHERE "codHor" = :codHor';

    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->bindParam(':codTie',$this->codTie);
    $this->stmt->bindParam(':codHor',$this->codHor);
    $result = $this->stmt->execute(); 
    $this->desconectarBD();

    return $result;
}

public function vaciarHorario() {

  $this->conectarBD();
  $sql = 'DELETE FROM "THorarios"
           WHERE "codSec" = :codSec ';

  $this->stmt = $this->conn->prepare($sql);
  $this->stmt->bindParam(':codSec',$this->codSec);
  $result = $this->stmt->execute(); 
  $this->desconectarBD();

  return $result;
}

public function eliminar() {
  
  $this->conectarBD();
  $sql = 'DELETE FROM "THorarios"
           WHERE "codSec" = :codSec
           AND "codUniCur" = :codUniCur';

  $this->stmt = $this->conn->prepare($sql);
  $this->stmt->bindParam(':codSec',$this->codSec);
  $this->stmt->bindParam(':codUniCur',$this->codUniCur);
  $result = $this->stmt->execute(); 
  $this->desconectarBD();

  return $result;
}

public function eliminarDocente() {
  
  $this->conectarBD();
  $sql = 'DELETE FROM "THorarios"
           WHERE "codHor" = :codHor';

  $this->stmt = $this->conn->prepare($sql);
  $this->stmt->bindParam(':codHor',$this->codHor);
  $result = $this->stmt->execute(); 
  $this->desconectarBD();

  return $result;
}

}
