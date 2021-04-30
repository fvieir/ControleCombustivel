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

	public function run()
	{
		// Verifica se há controller, joga valores para controllerName
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

		// Se não existir controller vai instanciar o homeController por padrão.
		/*if(!$this->controller)
		{
			$nomeClasse = $this->controllerName;
			$objetoClasse = new $nomeClasse($this);
			$objetoClasse->index();
			//var_dump($objetoClasse);
		}*/

		// Verificar se existe o diretorio
		if (!file_exists("App/Controllers/" . $this->controllerFile))
		{
			throw new Exception("Pagina não encontrada");
		}

		// Instancia a classe 
		$nomeClasse =  $this->controllerName; // "\\App\\Controller\\".$this->controllerName;

		// Se não existir a classe, entra no if
		if(!class_exists($nomeClasse))
		{
			throw new Exception("Suporte já esta verificando o erro",500);
		} else {
			// Se classe existir instancia a classe.
			$objetoClasse = new $nomeClasse($this);
		}

		if (method_exists($objetoClasse,$this->action)) {
			$objetoClasse->{$this->action}($this->params);
			return;
		} else if (!$this->action && method_exists($objetoClasse, 'index')) {
			$objetoClasse->index($this->params);
		} else {
			throw new Exception("Suporte esta verificando o erro");
		}
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

	public function getControllerName()
	{
		return $this->getControllerName;
	}

}