<?php

    $conn= new \PDO("oci:host=localhost;dbname=xe","INTRANET","INTRANET");

    $query = "SELECT * FROM USR WHERE EMAIL=:email";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':email',$_GET['email']);
    $stmt->execute($stmt);

    print_r($stmt);
 



?>