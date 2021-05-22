<?php

namespace App\Controllers;

use App\Models\DAO\UsuarioDao;


class UsuarioController extends Controller{

    public function index (){
      
      $this->render('usuario/index');
      Sessao::LimpaMensagem();

    }

    public function cadastrar(){
        
        \App\Lib\Sessao::gravarDados($_POST);

        try 
        {
            $usuarioDao = new UsuarioDao();
            $usuario = $usuarioDao->buscarPorEmail($_POST['email']);
    
            if(!empty($usuario))
            {
                if ($usuario->getStatus() == 1) {
                    \App\Lib\Sessao::gravaMensagem('Usuario já cadastrado');
                    return $this->redirect('home/index');
                 }   
            }
             
        } catch (\Exception $e) {
            
        }
       

    }

}