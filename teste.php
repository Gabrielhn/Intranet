<?php
// require_once("assets/php/class/class.seg.php");
session_start();
// proteger();

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$id=$_SESSION['usuarioId'];
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

$query1 = "SELECT * FROM VW_PERFIL WHERE ID=:id";
// $query3 = "SELECT USR.EMAIL, USR.IMG_PERFIL, IMG.IMAGEM FROM IN_USUARIOS USR, IN_IMAGENS IMG WHERE USR.IMG_PERFIL = IMG.ID AND USR.SETOR =:setor AND USR.ID != 1";
$query3 = "SELECT IMG.ID, IMG.IMAGEM, USR.ID AS ID_USR, USR.IMG_PERFIL, USR.EMAIL 
FROM IN_IMAGENS IMG 
INNER JOIN IN_USUARIOS USR ON IMG.ID = USR.IMG_PERFIL
WHERE USR.SETOR =:setor AND USR.ID !=2";

//#1
$stmt1 = $conn->prepare($query1);
$stmt1->bindValue(':id',$id);
$stmt1->execute();
$result1=$stmt1->fetch(PDO::FETCH_ASSOC);



//#3
$stmt3 = $conn->prepare($query3);
$stmt3->bindValue(':setor',$result1['SETOR']);
$stmt3->bindValue(':id',$result1['ID']);
$stmt3->execute();
$result3=$stmt3->fetchAll();






    //   foreach($result3 as $value ) 
    //                     { 
    //                       echo
    //                         '<li>
    //                           <div class="profile-pic">
    //                             <img width="35" height="35" title="'. $value['EMAIL'] .'" src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($value['IMAGEM'])).'">
    //                           </div>
    //                         </li>';
    //                     }


    //   print_r($result1);
      echo "<br>" ;
      $ii="2";
      echo "<br>" ;
      echo "<br>" ;
      print_r($result3[$ii][EMAIL]);
      echo "<br>" ;
      echo "<br>" ;
      var_dump($result3) ;
      echo "<br>" ;
      echo '<img width="35" height="35" title="'. $result3['EMAIL'] .'" src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result3[IMAGEM])).'">';


?>