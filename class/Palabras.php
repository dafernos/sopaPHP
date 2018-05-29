<?php
require_once 'Conexion.php';
class Palabra {
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
    public function getPalabras($categoria_id,$numero){
        try {
            $query = $this->dbh->prepare("SELECT palabra FROM palabra WHERE categoria_id=:categoria_id ORDER BY RAND() LIMIT $numero ");
            $query->bindParam(':categoria_id', $categoria_id);      
            $query->execute();
            $palabra = array(); 
            $palabras = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($palabras as $key => $value) {
                array_push($palabra, array_filter($value));
            } 
            if (sizeof($palabras) != 0){ 
                return $palabra; 
            }
        }catch(PDOException $e){
            print "Error!: " . $e->getMessage();
        }   
    }
}