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
        $usuario = $usuarioDao->buscarEmail($_POST['email']);

        if ($usuario->getstatus()==1) {
            \App\Lib\Sessao::gravaMensagem('Usuario já cadastrado');

        }

        
    }

}