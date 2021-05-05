<?php

require_once "App/Models/DAO/BaseDao.php";

class UsuarioDao extends BaseDao {

    public function buscarEmail($email){

        $resultado =$this->select("SELECT * FROM usuario WHERE email = '{$email}'");
        var_dump($resultado);

    }

}