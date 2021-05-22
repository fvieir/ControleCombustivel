<?php
namespace App\Lib;

class Sessao {


    public static function retornaMensagem()
    {
        return ($_SESSION['mensagem'])? $_SESSION['mensagem'] : "";
    }

    public static function limpaMensagem()
    {
        unset($_SESSION['mensagem']);
    }

    public static function gravaMensagem($mensagem)
    {
        $_SESSION['mensagem'] = $mensagem;
    }

    public static function gravarDados($form)
    {
        $_SESSION['form'] = $form;
    }

    public static function retornaValorFormulario($key)
    {
          return (isset($_SESSION['form'][$key])) ? $_SESSION['form'][$key] : "";
    }

    public static function limpaFormulario()
    {
        unset($_SESSION['form']);
    }
}