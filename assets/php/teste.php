<?php
    
    // require_once "class/class.Iconn.php";
    // require_once "class/class.conn.php";
    // require_once "class/class.service.php";

    // $db = new conn("10.0.0.2","ORCL","INTRANET","ifnefy6b9");

    // $service = new serviceUsuario($db);

    // print_r($service->list());

   foreach(PDO::getAvailableDrivers() as $driver)
    echo $driver, '<br>';

phpinfo()
    
?>