<?php

namespace App\Models\DAO;

use App\Lib\Conexao;

abstract class BaseDao 
{
    private $conexao;

    public function __construct() 
    {
        $this->conexao = Conexao::getInstance();
    }

    protected function select($sql)
    {
        if (!empty($sql))
        {
            return $this->conexao->query($sql);
        }else {
            return false;
        }
        
    }

    protected function Insert($table, $cols, $values)
    {
        if (!empty($table) && !empty($cols) &&!empty($values))
        {
            $parametros = $cols;
            $colunas = str_replace(":","",$sols);

            $stm = $this->conexao->prepare("INSERT INTO $tables ($colunas) VALUES($parametros)");
            $stm->execute($values);

            return $stm->rowCount();

        }else {
            return false;
        }
    }

    protected function update($table, $cols, $values, $where = null)
    {
        if (!empty($table) && !empty($cols) && !empty($values))
        {
            if($where)
            {
                $where = "WHERE = $where";
            }

            $stm = $this->conexao->prepare("UPDATE $table SET $cols $where");
            $stm->execute($values);

            return $stm->rowCount();
        } else {
            return false;
        }
    }

    protected function delete($table, $where)
    {
        if (!empty($table) && !empty($cols) && !empty($values))
        {
            if($where){
                $where = "WHERE = $where";
            }

            $stm->conexao->prepare("DELETE FROM $table $where");
            $stm->execute($values);

            return $stm->rowCount();
        }else{
            return false;
        }
    }

}


?>