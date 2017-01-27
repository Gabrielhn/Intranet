<?php
session_start();
// GET e SET
$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$login_username=$_SESSION['usuarioEmail'];
$login_pass=$_POST['login_pass'];
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");



    // Valida
    $query = "SELECT ID, EMAIL, NOME, SOBRENOME, SENHA FROM IN_USUARIOS WHERE ATIVO='S' AND EMAIL=:email AND SENHA=:senha";

    $stmt = $conn->prepare($query);
    $stmt->bindValue(':email',$login_username);
    $stmt->bindValue(':senha',$login_pass);
    $stmt->execute();

    $result=$stmt->fetch(PDO::FETCH_ASSOC);

    if ( ! $result) { // Nenhum registro                
        $erro = "Usu&aacute;rio ou senha incorretos. Verifique os dados digitados e tente novamente.";
        $_SESSION['erro'] = $erro;    
        header("Location: ../../bloquear.php"); 
    } else {
        unset($_SESSION['erro']);       
        sleep(1);
        header("Location: ../../index.php"); //Abre index

    }

?>