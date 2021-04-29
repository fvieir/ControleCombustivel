<?php

use App\App;

function __autoload($classe){

	include_once "{$classe}.php";
}

try {
	$app = new App();
	$app->run();
} catch (Exception $e) {
	echo "Erro ->".$e->getMessage();
}
