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

$ramal=$_POST['ramal'];
$nome=$_POST['nome'];
$setor=$_POST['setor'];
$gestor=$_POST['gestor'];

$query3="INSERT INTO IN_RAMAIS (ramal, nome, setor, gestor) values (:ramal, :nome, :setor, :gestor)";
$stmt3 = $conn->prepare($query3);
$stmt3->bindValue(':ramal',$ramal);
$stmt3->bindValue(':nome',$nome);
$stmt3->bindValue(':setor',$setor);
$stmt3->bindValue(':gestor',$gestor);   
$stmt3->execute();
header("Location: ramais.php");


?>
