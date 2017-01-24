<?php
session_start();
// GET e SET
$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$login_username=$_POST['login_username'];
$login_pass=$_POST['login_pass'];
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

    // Valida
    $query = "SELECT * FROM IN_USUARIOS WHERE EMAIL=:email AND SENHA=:senha";

    $stmt = $conn->prepare($query);
    $stmt->bindValue(':email',$login_username);
    $stmt->bindValue(':senha',$login_pass);
    $stmt->execute();

    $result=$stmt->fetch(PDO::FETCH_ASSOC);

    if ( ! $result) { // Nenhum registro                
        $erro = "Usuário ou senha incorretos. Verifique os dados digitados!";
        $_SESSION['erro'] = $erro;    
        header("Location: ../../login.php"); 
    } else {
        session_unset();
        $_SESSION['usuarioId'] = $result['ID']; // Valor da coluna EMAIL -> SESSION_usuarioId
        $_SESSION['usuarioEmail'] = $result['EMAIL']; // Valor da coluna EMAIL -> SESSION_usuarioEmail
        $_SESSION['usuarioNome'] = $result['NOME']; //Valor da coluna NOME -> SESSION_usuarioNome
        $_SESSION['usuarioSobreNome'] = $result['SOBRENOME']; //Valor da coluna SOBRENOME -> SESSION_usuarioSobreNome
        sleep(1);
        header("Location: ../../index.php"); //Abre index

    }

?>