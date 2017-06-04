<?php

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM IN_AGENDA WHERE id = $id";
	
	$query = $conn->prepare( $sql );
	if ($query == false) {
	 print_r($conn->errorInfo());
	 die ('Erro prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erro execute');
	}
	
// }elseif (isset($_POST['title']) && isset($_POST['id'])){
	
// 	$id = $_POST['id'];
// 	$title = $_POST['title'];
// 	$color = $_POST['color'];
	
// 	$sql = "UPDATE IN_AGENDA SET TITULO = '$title' WHERE id = $id ";

	
// 	$query = $conn->prepare( $sql );
// 	if ($query == false) {
// 	 print_r($conn->errorInfo());
// 	 die ('Erro prepare');
// 	}
// 	$sth = $query->execute();
// 	if ($sth == false) {
// 	 print_r($query->errorInfo());
// 	 die ('Erro execute');
// 	}

 }
header('Location: ' . $_SERVER['HTTP_REFERER']);


	
?>
