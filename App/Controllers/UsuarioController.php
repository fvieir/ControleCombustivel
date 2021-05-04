<?php
require_once "App/Lib/Conexao.php";
require_once "App/Lib/Sessao.php";
require_once "App/Controllers/Controller.php";
require_once "App/App.php";

class UsuarioController extends Controller{

    public function index (){
       echo "chamou usuario";
    }

    public function cadastrar(){

        Sessao::gravarDados($_POST);

    }

}