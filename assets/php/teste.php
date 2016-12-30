<html>
    
    <body>
        <form method="post" action="teste.php">
            <input type="date" name="ida">
            <input type="date" name="volta">
            <button type="submeit" value="submit">Enviar</button>

        </form>

    </body>

<html>


<?php

$ida=$_POST['ida'];
$volta=$_POST['volta'];

echo $ida."\n";
echo $volta."\n";

$ida2 = new DateTime($ida);
$volta2 = new DateTime($volta);
$ausencia = $ida2->diff($volta2);
echo $ausencia->format('%R%a dias');

















//    $strStart->format('02/05/2017'); 
//    $strEnd   = '02/19/2017'; 



//    $dteStart = new DateTime($strStart); 
//    $dteEnd   = new DateTime($strEnd); 


//    $dteDiff  = $dteStart->diff($dteEnd); 



//    echo $dteDiff->format("%d dias")."\n(".gettype($dteDiff).")"; 



?>



<!--$ida=$_POST['ida'];-->
<!--$ida = strtotime($ida);-->
<!--$volta=$_POST['volta'];-->
<!--$volta = strtotime($volta);-->