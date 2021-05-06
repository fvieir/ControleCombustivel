<?php

class Usuario {

    private $id;
    private $email;
    private $login;
    private $senha;
    private $status;
    private $dataCadastro;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->id = $email;
    }
    
    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->id = $login;
    }
    
    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->id = $senha;
    }
    
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->id = $status;
    }
    
    public function getCadastro(){
        return $this->cadastro;
    }
    public function setDataCadastro($dataCadastro){
        $this->id = $dataCadastro;
    }
}