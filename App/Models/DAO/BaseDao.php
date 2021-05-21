<?php

namespace App\Models\DAO;

use App\Lib\Conexao;

abstract class BaseDao {

    private $conexao;

    public function __construct() {

        $this->conexao = Conexao::getInstance();
    }

    public function select($sql){

        if (!empty($sql)) {
            return $this->conexao->query($sql);
        }
        return false;
    }
}


?>