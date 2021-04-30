<?php
include_once "App/App.php";
include_once "App/Controllers/HomeController.php";

error_reporting(E_ALL & ~E_NOTICE);

try {
	$app = new App();
	$app->run();
} catch (Exception $e) {
	echo "Erro ->".$e->getMessage();
}
