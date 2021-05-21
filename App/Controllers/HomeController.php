<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\App;
use App\Lib\Conexao;

class HomeController extends Controller{

    public function index (){
       $this->render('home/index');
    }

}