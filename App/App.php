<?php

namespace App;	

class App {

private $controller;
private $action;
private $param;
public $controllerName;

public function __construct(){
	$this->url();
}

public function run (){

	if($this->controller){
		$this->controllerName = $this->controller."Controller";
		$this->controllerName  = preg_replace("/[^a-z]/i",'',$this->controllerName);
		var_dump($this->controllerName);
		exit;

	} else {
		$this->controllerName = "HomeController";
	}

}

public function url(){

	if(isset($_GET['url']))
	{
		$path = $_GET['url'];
		$path = rtrim($path,'/');
		$path = filter_var($path,FILTER_SANITIZE_URL);

		$path = explode('/',$path);

		$this->controller = $this->verificaArray($path,0);
		$this->action = $this->verificaArray($path,1);

		if ($this->verificaArray($path,2)){
			unset($path[0]); // exlcui a posição 0 do array
			unset($path[1]); // exlcui a posição 1 do array
			$this->param = array_values($path);
		}
	} 
}

public function verificaArray($array, $key)
{

	if (isset($array) && isset($key)) {
		return $array[$key];
	}
	return null;
}

public function getController(){
	$this->controller;
}

public function getAction(){
	$this->action;
}

public function getParam(){
	$this->param;
}

}