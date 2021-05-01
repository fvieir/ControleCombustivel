<?php

class Conexao {

    public static $con = null;

    public static function getInstance(){
        
        $pdoConfig = DB_DRIVE.":host=".DB_HOST.";";
        $pdoConfig.= "dbname=".DB_NAME;
        
        try {
            if (self::$con === null) {
                self::$con= new PDO($pdoConfig,DB_USER,DB_PASSWORD,
                            array(PDO::ATTR_ERRMODE,
                                  PDO::ERRMODE_EXCEPTION,
                                  PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));    
            }
            return self::$con;  
        } catch (Exception $e) {
            echo "Erro-> ".$e->getMessage();
        }
        
    }

}


?>