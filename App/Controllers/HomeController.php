<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\App;
use App\Lib\Conexao;
use App\Lib\Sessao;

class HomeController extends Controller
{
    public function index()
    {
       $this->render('home/index');

       Sessao::limpaFormulario();
       Sessao::limpaMensagem();
    }
}