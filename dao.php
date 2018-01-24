<?php

define("DATABASE","inventory");
define("MYSQL_HOST","mysql:host=localhost;dbname=".DATABASE);
define("MYSQL_USER","www-data");
define("MYSQL_PASSWORD","www-data");

define("TABLE_USER", "user");
define("COLUMN_USER_NAME", "name");
define("COLUMN_USER_PASSWORD", "password");
define("COLUMN_USER_EMAIL", "email");

define("TABLE_DEPENDENCY","dependency");
define("COLUMN_DEPENDENCY_ID", "id");
define("COLUMN_DEPENDENCY_NAME", "name");
define("COLUMN_DEPENDENCY_SHORTNAME", "shortname");
define("COLUMN_DEPENDENCY_DESCRIPTION", "description");

define("TABLE_SECTOR","sector");
define("COLUMN_SECTOR_ID", "id");
define("COLUMN_SECTOR_NAME", "name");
define("COLUMN_SECTOR_SHORTNAME", "shortname");
define("COLUMN_SECTOR_DESCRIPTION", "description");
define("COLUMN_SECTOR_IDDEPENDENCY", "id_dependency");

class Dao {
    
    protected $conn;
    public $error;

    /**
     * Constructor de la clase
     */
    function __construct() {
        try {
            $this->conn = new PDO(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD);
        } catch (PDOException $e) {
            $this->error = "Error en la conexión: ".$e->getMessage();
            $this->conn = null;
        }
    }

    /**
     * Destructor de la claseDATABASE
     */
    function __destruct() {
        if($this->isConnected()) {
            $this->conn = null;
            unset($this->error);
        }
    }

    /**
     * Método que comprueba si hay conexión a la base de datos
     */
    function isConnected() {
        return $this->conn != null;
    }

    /**
     * Función que comprueba si el usuario existe en la BD
     */
    function validateUser($user, $password) {
        try {
            $sql="SELECT * FROM ".TABLE_USER." WHERE ".COLUMN_USER_NAME."='".$user."' AND ".COLUMN_USER_PASSWORD."='".sha1($password)."'";
            echo $sql;
            $statement=$this->conn->query($sql);
            return $statement->rowCount() > 0;
        } catch(PDOException $e) {

        }
    }

    function select($value, $table) {
        try {
            $sql= "SELECT ".$value." FROM ".$table;
            return $this->conn->query($sql);
        }
        catch(PDOException $e) {
            $this->error="Error al consultar la tabla ".$table;
        }
    }

    function getDependency(){
        try{
            $sql= "SELECT * FROM ".TABLE_DEPENDENCY;
            return $this->conn->query($sql);
        } catch(PDOException $e) {
            $this->error="Error al consultar la tabla ".TABLE_DEPENDENCY;
        }
    }
    //function execute

    /**
     * Función que devuelve todos los sectores de la base de datos
     */
    function getSectors($idDependency) {
        if($idDependency == null) {
            $sql = "SELECT * FROM ".TABLE_SECTOR." WHERE ".COLUMN_SECTOR_IDDEPENDENCY;
        } else {
            $sql = "SELECT * FROM ".TABLE_SECTOR." WHERE ".COLUMN_SECTOR_IDDEPENDENCY." = :idDependency";
        }
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':idDependency', $idDependency);
        //return $statement->execute(array(':idDependency'=>$idDependency));
        $statement->execute();
        return $statement;
    }

    /**
     * Función que da de alta dependencias.TABLE_DEPENDENCY
     */

     function addDependency($name, $shortname, $description) {
        $sql = "INSERT INTO ".TABLE_DEPENDENCY." (
            ".COLUMN_DEPENDENCY_NAME.", 
            ".COLUMN_DEPENDENCY_SHORTNAME.", 
            ".COLUMN_DEPENDENCY_DESCRIPTION.") 
            VALUES ('".$name."', '".$shortname."', '".$description."')";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        return $statement;
     }

     /**
     * Función que elimina dependencias
     */

    function deleteDependency($id) {
        //Y luego eliminamos la dependencia
        $sql = "DELETE FROM ".TABLE_DEPENDENCY." WHERE ".COLUMN_DEPENDENCY_ID." = '".$id."'";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        return $statement;
    }

    /**
     * Función que da de alta sectores
     * Compruebo que exista una dependencia con la id antes de añadir un sector con esa
     * foreign key, aunque de la forma que lo tengo hecho no necesito la comprobación
     */

    function addSector($name, $shortname, $description, $idDependency) {
        $dependencias = $this->getDependency()->FetchAll();
        for($index = 0; $dependencias[$index]['id'] <= $idDependency; $index++) {
            if($dependencias[$index]['id'] == $idDependency) {
                $sql = "INSERT INTO ".TABLE_SECTOR." (
                    ".COLUMN_SECTOR_NAME.", 
                    ".COLUMN_SECTOR_SHORTNAME.", 
                    ".COLUMN_SECTOR_DESCRIPTION.", 
                    ".COLUMN_SECTOR_IDDEPENDENCY.") 
                    VALUES ('".$name."', '".$shortname."', '".$description."', '".$idDependency."')";
                $statement = $this->conn->prepare($sql);
                $statement->execute();
                return $statement;
            }
        }        
    }

    /**
     * Función que elimina sectores
     */

    function deleteSector($id) {
        $sql = "DELETE FROM ".TABLE_SECTOR." WHERE ".COLUMN_SECTOR_ID." = '".$id."'";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        return $statement;
    }
}
?>