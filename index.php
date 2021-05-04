<?php
include_once "App/App.php";
include_once "App/Controllers/Controller.php";
include_once "App/Controllers/HomeController.php";
include_once "App/Controllers/UsuarioController.php";

session_start();
error_reporting(E_ALL & ~E_NOTICE);

try {
	$app = new App();
	$app->run();
} catch (Exception $e) {
	echo "Erro ->".$e->getMessage();
}
