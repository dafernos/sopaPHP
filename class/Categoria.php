<?php
require_once 'Conexion.php';
class Categoria {
    private static $instancia;
    private $dbh;
    private function __construct(){
        $this->dbh =new Conexion;
        $this->dbh = $this->dbh->get_mngDB();
    }
    public static function singleton(){
        if (!isset(self::$instancia)){
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
     // Evita que el objeto se pueda clonar
    public function __clone(){
    trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
    
    public function getCategorias(){
    	try {
		    $query = $this->dbh->prepare("SELECT * from categoria");
		    $query->execute();
		    return $query->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			print "Error!: " . $e->getMessage();
		}	
    }
}