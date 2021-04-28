<?php
require_once "Model/Conexao.php";

$sql = "SELECT * FROM usuario";
$con = Conexao::getIsntace()->prepare($sql);
$con->execute();

var_dump($con->fetch(PDO::FETCH_ASSOC));

?>

