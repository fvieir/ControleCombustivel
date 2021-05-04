<?php
require_once "App/Lib/Conexao.php";
require_once "App/Controllers/Controller.php";
require_once "App/App.php";

class HomeController extends Controller{

    public function index (){
       $this->render('home/index');
    }

}