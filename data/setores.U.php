<?php

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
require_once("../assets/php/class/class.seg.php");
session_start();
proteger();

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$id=$_SESSION['usuarioId'];
$email=$_SESSION['usuarioEmail'];
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

$sigla=$_POST['sigla'];
$nome=$_POST['nome'];
$gestor=$_POST['gestor'];
$label=$_POST['label'];

$query3="UPDATE IN_SETORES SET sigla = :sigla, nome = :nome, gestor = :gestor, label = :label WHERE SIGLA = :sigla";
$stmt3 = $conn->prepare($query3);
$stmt3->bindValue(':sigla',$sigla);
$stmt3->bindValue(':nome',$nome);
$stmt3->bindValue(':gestor',$gestor); 
$stmt3->bindValue(':label',$label);  
$stmt3->execute();
header("Location: setores.php");


?>
