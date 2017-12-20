<?php

define("DATABASE","inventory");
define("MYSQL_HOST","mysql:host=localhost;dbname=".DATABASE);
define("MYSQL_USER","www-data");
define("MYSQL_PASSWORD","www-data");

define("TABLE_USER", "user");
define("COLUMN_USER_NAME", "name");
define("COLUMN_USER_PASSWORD", "password");
define("COLUMN_USER_EMAIL", "email");

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
     * Destructor de la clase
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
            
        }
    }
}
?>