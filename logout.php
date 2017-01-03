<?php
session_start();
session_unset();
echo "processando...";
sleep(1);
header("Location: login.php");

?>