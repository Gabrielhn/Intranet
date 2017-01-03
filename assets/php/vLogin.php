<?php
session_start();
// GET e SET
$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$login_username=$_POST['login_username'];
$login_pass=$_POST['login_pass'];
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

    // Valida
    $query = "SELECT * FROM USUARIOS WHERE EMAIL=:email AND SENHA=:senha";

    $stmt = $conn->prepare($query);
    $stmt->bindValue(':email',$login_username);
    $stmt->bindValue(':senha',$login_pass);
    $stmt->execute();

    $row=$stmt->fetch(PDO::FETCH_ASSOC);

    if ( ! $row) { // Nenhum registro
        echo "Usuário ou senha incorretos";
    } else {
        $_SESSION['usuarioEmail'] = $row['EMAIL']; // Valor da coluna EMAIL -> SESSION_EMAIL
        $_SESSION['usuarioNome'] = $row['NOME']; //Valor da coluna NOME -> SESSION_NOME
        sleep(1);
        header("Location: ../../index.php"); //Abre index

    }

?>