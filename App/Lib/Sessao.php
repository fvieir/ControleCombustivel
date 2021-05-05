<?php
namespace App\Lib;

class Sessao {

    public static function gravarDados($form){
       $_SESSION['form'] = $form;
    }

    /*public static function limpaMensagem(){
        unset($_SESSION['mensagem']);
    }*/

    /*public static function gravaMensagem(){
        $_SESSION['mensagem'] = '';
    }*/

    public static function retornaValorFormulario($key){
          return (isset($_SESSION['form'][$key])) ? $_SESSION['form'][$key] : "";
    }
}