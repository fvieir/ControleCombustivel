<?php

class App 
{
	private $controller;
	private $action;
	private $params;
	private $controllerFile;
	public $controllerName;

	public function __construct(){
		$this->url();
	}

	public function run(){
		if (isset($this->controller) && !empty($this->controller)) 
		{
			$this->controllerName = ucfirst($this->controller."Controller");
			$this->controllerName = preg_replace('/[^a-zA-Z]/i','',$this->controllerName);

			$this->controllerFile = $this->controllerName.".php";
			$this->action = preg_replace('/[^a-zA-Z]/i','',$this->action);
			
		} else {
			$this->controllerName = 'HomeController';
		}
		//var_dump($this->controllerName,$this->controllerFile,$this->action);

		if(!$this->controller){
			$objetoClasse = new HomeController($this);
			$objetoClasse->index();
			//var_dump($objetoClasse);
		}

		if (!file_exists("App/Controllers/" . $this->controllerFile)) {
			throw new Exception("Pagina não encontrada");
		}
		$nomeClasse =  $this->controllerName; // "\\App\\Controller\\".$this->controllerName;
		$objetoClasse = new $nomeClasse($this);
	}

	public function url()
	{
		if ($_GET) 
		{
			$path = $_GET['url'];
			$path = filter_var($path, FILTER_SANITIZE_URL);
			$path = rtrim($path,'/');

			$path = explode('/',$path);

			$this->controller = $this->verificaArray($path,0);
			$this->action = $this->verificaArray($path,1);

			if ($this->verificaArray($path,2)) {
				unset($path[0]);
				unset($path[1]);
				$this->params = array_values($path);
			}
		}
	}

	public function verificaArray($array,$key)
	{
		if (isset($array[$key]) && !empty($array[$key])) {
			return $array[$key];
		}
		return null;
	}

	public function getController()
	{
		return $this->controller;
	}

	public function getAction()
	{
		return $this->action;
	}

	public function getParam()
	{
		return $this->param;
	}

}