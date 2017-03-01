<?php

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
require_once("../assets/php/class/class.seg.php");
session_start();
proteger();

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$id=$_SESSION['usuarioId'];
$idp=$_POST['id'];
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

$assunto=$_POST['assunto'];
$conteudo=$_POST['conteudo'];

$query3="UPDATE IN_MURAL_POST SET ASSUNTO = :assunto, CONTEUDO = :conteudo WHERE ID = :idp ";
$stmt3 = $conn->prepare($query3);
$stmt3->bindValue(':idp',$idp);
$stmt3->bindValue(':assunto',$assunto);
$stmt3->bindValue(':conteudo',$conteudo);  
$stmt3->execute();
header("Location: mural.php");


?>
