<?php
try {

    // Conexao
    $host="10.0.0.2";
    $service="//10.0.0.2:1521/orcl";
    $id=$_SESSION['usuarioId'];
    $conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

    // Query
    $query = "SELECT * FROM IN_AGENDA";

    $stmt = $conn->prepare($query);    
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);       

    echo json_encode($result);

//     // Fetch
//     while ($row = $stmt->fetch(PDO::FETCH_ASSOC) {

//         $e = array();
//         $e['id'] = $row['id'];
//         $e['title'] = "Lorem Ipsum";
//         $e['start'] = $row['start'];
//         $e['end'] = $row['end'];
//         $e['allDay'] = false;

//         // Merge the event array into the return array
//         array_push($eventos, $e);

//     }

//     // Output json for our calendar
    
//     exit();

 } catch (PDOException $e){
     echo $e->getMessage();
 }
?>