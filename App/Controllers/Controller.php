<?php

namespace App\Controllers;

abstract class Controller {

    protected $app;
    private $viewVar;

    public function __construct($app)
    {
        $this->setViewVar('nameController',$app->getControllerName());
        $this->setViewVar('action',$app->getAction());
    }
		
    public function setViewVar($varNome, $varValue){
        if ($varNome != "" && $varValue != "") {
            $this->viewVar[$varNome] = $varValue;
        }
    }

    public function render($view){
        
        $this->getViewVar();
        $Sessao = Sessao::class;
        
        require_once PATH. "/App/Views/layouts/header.php";
        require_once PATH. "/App/Views/layouts/menu.php";
        require_once PATH. "/App/Views/" .$view. ".php";
        require_once PATH. "/App/Views/layouts/footer.php";

    }
	
    public function getViewVar(){
        return $this->viewVar;
    }

}

?>