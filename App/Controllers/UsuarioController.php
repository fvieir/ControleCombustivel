<?php

require_once "App/Lib/Conexao.php";
require_once "App\Lib\Sessao.php";
require_once "App/Controllers/Controller.php";
require_once "App/Models/DAO/UsuarioDao.php";
require_once "App/Models/Entidades/Usuario.php";
require_once "App/App.php";


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
            App\Lib\Sessao::gravaMensagem('Usuario já cadastrado');

        }

        
    }

}