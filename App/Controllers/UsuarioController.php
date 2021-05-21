<?php

namespace App\Controllers;

use App\Models\DAO\UsuarioDao;


class UsuarioController extends Controller{

    public function index (){
      
     // $this->render('usuario/index');
      //Sessao::LimpaMensagem();

    }

    public function cadastrar(){
        
        \App\Lib\Sessao::gravarDados($_POST);

        $usuarioDao = new UsuarioDao();
        $usuario = $usuarioDao->buscarPorEmail($_POST['email']);

        var_dump($usuario->getStatus());

        if ($usuario->getStatus() == 1) {
           echo \App\Lib\Sessao::gravaMensagem('Usuario já cadastrado');
        }

        
    }

}