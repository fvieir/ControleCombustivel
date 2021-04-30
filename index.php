<?php
include_once "App/App.php";
include_once "App/Controllers/HomeController.php";

try {
	$app = new App();
	$app->run();
} catch (Exception $e) {
	echo "Erro ->".$e->getMessage();
}
