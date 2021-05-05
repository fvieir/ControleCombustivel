<?php
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