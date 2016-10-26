<?php
class DB extends PDO {

static public $db;

static public $dbP;

    function __construct(){
        try {
                parent::__construct(
                                'mysql:host='.SD::$Config->db['host'].
                                ';dbname='.SD::$Config->db['name'], 
                                SD::$Config->db['user'],
                                SD::$Config->db['password'],
                                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                );
            }catch(PDOException $e) {
                echo "Error al conectar con la base de datos: " . $e->getMessage();
            }    

    }

    public static function connect(){
        if (!isset(self::$dbP)){
            self::$dbP= new DB();
        }
        return self::$dbP;
    }

    static function getStatement($query) {
            return self::connect()->prepare($query);
    }
}
?>
