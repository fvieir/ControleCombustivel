<?php

class Conexao {

    public static $con;

    public static function getIsntace(){

        if(!isset(self::$con)){
            try {
                self::$con = new PDO('mysql:host=localhost; dbname=controleabastecimento','root','', array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
                ));
                self::$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                echo"Error-> ".$e->getMessage();
            }
        } 
        return self::$con;
    }
}

?>