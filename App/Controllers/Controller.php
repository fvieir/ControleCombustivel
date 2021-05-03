<?php

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

    public function getViewVar(){
        return $this->viewVar;
    }

    public function render(){
        $viewVar = $this->getViewVar();

        include_once PATH."/Views/layouts/".$viewVar;

    }
	

}

?>