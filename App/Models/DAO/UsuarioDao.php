<?php

namespace App\Models\DAO;

use App\Models\Entidades\Usuario;

class UsuarioDao extends BaseDao {

    public function buscarEmail($email){

        $resultado =$this->select("SELECT * FROM usuario WHERE email = '{$email}'");
        return $resultado->fetchObject(Usuario::class);

    }

}