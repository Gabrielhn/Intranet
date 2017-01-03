<?php


function getDados()
{
    $host="10.0.0.2";
    $service="//10.0.0.2:1521/orcl";
    $conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");
    $email=$_SESSION['EMAIL'];

    $query="SELECT * FROM USUARIOS WHERE EMAIL='gabriel.hipolito@aniger.com.br'";

    $stmt = $conn->prepare($query);

    $stmt->execute();

    $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $stmt;
}

?>