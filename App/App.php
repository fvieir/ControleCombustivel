<?php

namespace App;

//use App\Controllers\Controller;
use App\Controllers\HomeController;
use App\Controllers\UsuarioController;


class App 
{
	private $controller;
	private $action;
	private $params;
	private $controllerFile;
	public $controllerName;

	public function __construct(){

		define(APP_HOST,$_SERVER['HTTP_HOST']."/");// Retorna o localhost com barra
        define(PATH,realpath("./")); // Retorna o caminho absoluto diretorio
        define(DB_HOST,$_SERVER['HTTP_HOST']); // Retorna o nome do localhost
        define(DB_USER,'root');
        define(DB_NAME, 'controleabastecimento');
        define(DB_PASSWORD, '');
        define(DB_DRIVE, 'mysql');

		$this->url();
	}

	public function run()
	{
		// Verifica se há controller, joga valores para controllerName
		if (isset($this->controller)) {
			$this->controllerName = ucwords($this->controller."Controller");
			$this->controllerName = preg_replace('/[^a-zA-Z]/i','',$this->controllerName);		
		} else {
			$this->controllerName = 'HomeController';
		}

		$this->controllerFile = $this->controllerName.".php";
		$this->action = preg_replace('/[^a-zA-Z]/i','',$this->action);	

		// Se não existir controller vai instanciar o homeController por padrão.
		/*if(!$this->controller)
		{
			$this->controller = new HomeController($this);
			$this->controller->index();
			return;
		}*/

		// Verifica se existe o diretorio
		if (!file_exists(PATH."/App/Controllers/".$this->controllerFile)) {
			throw new Exception("Pagina não encontrada!");
		}
		
		$nomeClasse =  '\\App\\Controllers\\'.$this->controllerName;
		$objetoClasse = new $nomeClasse($this);
		/*echo"<pre>";
		print_r($objetoClasse);
		echo"</pre>";*/

		if (!class_exists($nomeClasse)) {
			throw new Exception("Classe não existe, suporte esta verificando");
		}

		if (method_exists($objetoClasse,$this->action)) {
			$objetoClasse->{$this->action}($this->params);
			return;
		} else if (!$this->action && method_exists($objetoClasse, index)){
			$objetoClasse->index($this->params);
		} else {
			throw new Exception("Erro na Aplicação");
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
		return $this->controllerName;
	}

	public function verificaArray($array,$key)
	{
		if (isset($array[$key]) && !empty($array[$key])) {
			return $array[$key];
		}
		return null;
	}

}