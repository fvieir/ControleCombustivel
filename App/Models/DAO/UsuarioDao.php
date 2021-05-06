<?php

require_once "App/Models/DAO/BaseDao.php";
require_once "App/Models/Entidades/Usuario.php";

class UsuarioDao extends BaseDao {

    public function buscarEmail($email){

        $resultado =$this->select("SELECT * FROM usuario WHERE email = '{$email}'");
        return $resultado->fetchObject(Usuario::class);


    }

}