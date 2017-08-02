<?php

$image = "C:\www\Intranet\assets\img\others\Funcional.jpg"; // be careful that the path is correct

$blob = file_get_contents($image);

// $data = fopen($image, 'rb');
// $size = filesize($image);
// $contents = fread($data, $size);
// fclose($data);

 $encoded = base64_encode($blob);

// echo $encoded;

//echo Guilherme

// $blob = fopen("C:\www\Intranet\assets\img\others\Funcional.jpg", 'rb');
// // fread ($fp


var_dump($encoded);


?>