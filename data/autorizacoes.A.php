<?php

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
require_once("../assets/php/class/class.seg.php");
require_once("../assets/php/class/class.phpmailer.php");
session_start();
proteger();

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

$id=$_GET['id'];

$query3="UPDATE IN_AUTORIZACOES SET AUTORIZADO = 'S' WHERE ID=:id";
$stmt3 = $conn->prepare($query3);
$stmt3->bindValue(':id',$id); 
$stmt3->execute();

//Dados para montar email
$query4="SELECT * FROM IN_AUTORIZACOES WHERE ID=:id";
$stmt4 = $conn->prepare($query4);
$stmt4->bindValue(':id',$id); 
$stmt4->execute();
$result4=$stmt4->fetch(PDO::FETCH_ASSOC);

//Des-serializando
$dados=unserialize($result4['CONTEUDO']);

// Inicia a classe PHPMailer
$mail = new PHPMailer(true);
 
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP

//REQUEST campos
$nome='Carmen';
$fantasia='LALALA';
$endereco=$dados['endereco'];
$nro=$dados['nro'];
$bairro=$dados['bairro'];
$cep=$dados['cep'];
$cidade=$dados['cidade'];
$estado=$dados['estado'];
$cpf=$dados['cpf'];
$ie=$dados['ie'];
$contato=$dados['contato'];
$fone=$dados['fone'];
$email=$dados['email'];
$emailN=$dados['emailN'];
$obs=$dados['obs'];
$autorizado=$dados['autorizado'];
$dtAutorizado=$dados['dtAutorizado'];
$dtAutorizado= date("d/m/Y",strtotime($dtAutorizado));

$mensagem = file_get_contents('cliente_tmp.html');
$dest='gabriel.hipolito@aniger.com.br';
$assunto='Novo cliente - ' . $nome;

$mensagem = str_replace('%nome%', $nome, $mensagem);
$mensagem = str_replace('%fantasia%', $fantasia, $mensagem);
$mensagem = str_replace('%endereco%', $endereco, $mensagem);
$mensagem = str_replace('%nro%', $nro, $mensagem);
$mensagem = str_replace('%bairro%', $bairro, $mensagem);
$mensagem = str_replace('%cep%', $cep, $mensagem);
$mensagem = str_replace('%cidade%', $cidade, $mensagem);
$mensagem = str_replace('%estado%', $estado, $mensagem);
$mensagem = str_replace('%cpf%', $cpf, $mensagem);
$mensagem = str_replace('%ie%', $ie, $mensagem);
$mensagem = str_replace('%contato%', $contato, $mensagem);
$mensagem = str_replace('%fone%', $fone, $mensagem);
$mensagem = str_replace('%email%', $email, $mensagem);
$mensagem = str_replace('%emailN%', $emailN, $mensagem);
$mensagem = str_replace('%obs%', $obs, $mensagem);
$mensagem = str_replace('%autorizado%', $autorizado, $mensagem);
$mensagem = str_replace('%dtAutorizado%', $dtAutorizado, $mensagem);


 
try {
     $mail->Host = 'mail.aniger.com.br'; // Endereço do servidor SMTP
     $mail->SMTPAuth   = true;  // Usar autenticação SMTP
     $mail->Port       = 587; //  Usar 587 porta SMTP
     $mail->Username = 'gabriel.hipolito'; // Usuário do servidor SMTP
     $mail->Password = 'Rmox@bj6'; // Senha do servidor SMTP
 
     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->SetFrom('gabriel.hipolito@aniger.com.br', $nome); //De:
     $mail->AddReplyTo('gabriel.hipolito@aniger.com.br', $nome); //Responder para:
     $mail->Subject = '=?utf-8?B?'.base64_encode($assunto).'?=';//Assunto do e-mail com codificação UTF-8
 
 
     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress('gabriel.hipolito@aniger.com.br', 'Intranet');
 
     //Campos abaixo são opcionais 
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
      $mail->AddCC('gabriel.hipolito@aniger.com.br', $nome); // Copia para o solicitante
     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
 
 
     //Define o corpo do email
    //  $mail->MsgHTML (); 
 
     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     $mail->MsgHTML($mensagem);
 
     $mail->Send();
     echo "Mensagem enviada com sucesso</p>\n";
    //  print_r($dados);
 
    //caso apresente algum erro é apresentado abaixo com essa exceção.
    }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
}






?>
