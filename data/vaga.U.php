<?php

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
require_once("../assets/php/class/class.seg.php");
session_start();
proteger();

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$email=$_SESSION['usuarioEmail'];
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

$idv=$_POST['id'];
$funcao=$_POST['funcao'];
$descricao=$_POST['descricao'];
$requisitos=$_POST['requisitos'];
$setor=$_POST['setor'];
$ativo=$_POST['ativo'];

$query3="UPDATE IN_VAGAS SET FUNCAO = :funcao, DESCRICAO = :descricao, REQUISITOS = :requisitos, SETOR = :setor, ATIVO = :ativo WHERE ID = :idv";

$stmt3 = $conn->prepare($query3);
$stmt3->bindValue(':funcao',$funcao);
$stmt3->bindValue(':descricao',$descricao);
$stmt3->bindValue(':requisitos',$requisitos); 
$stmt3->bindValue(':setor',$setor);
$stmt3->bindValue(':ativo',$ativo);
$stmt3->bindValue(':idv',$idv);   
$stmt3->execute();
header("Location: vagas.php");


?>
