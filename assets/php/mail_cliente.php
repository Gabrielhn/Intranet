<?php
 
// Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("class.phpmailer.php");
 
// Inicia a classe PHPMailer
$mail = new PHPMailer(true);
 
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP

//REQUEST campos
$nome=$_POST['nome'];
$fantasia=$_POST['fantasia'];
$endereco=$_POST['endereco'];
$nro=$_POST['nro'];
$bairro=$_POST['bairro'];
$cep=$_POST['cep'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$cpf=$_POST['cpf'];
$ie=$_POST['ie'];
$contato=$_POST['contato'];
$fone=$_POST['fone'];
$email_from=$_POST['email'];
$emailN=$_POST['emailN'];
$obs=$_POST['obs'];
$autorizado=$_POST['autorizado'];
$dtAutorizado=$_POST['dtAutorizado'];
 
try {
     $mail->Host = 'mail.aniger.com.br'; // Endereço do servidor SMTP
     $mail->SMTPAuth   = true;  // Usar autenticação SMTP
     $mail->Port       = 587; //  Usar 587 porta SMTP
     $mail->Username = 'gabriel.hipolito'; // Usuário do servidor SMTP
     $mail->Password = 'Rmox@bj6'; // Senha do servidor SMTP
 
     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->SetFrom('gabriel.hipolito@aniger.com.br', 'Intranet'); //Seu e-mail
     $mail->AddReplyTo('gabriel.hipolito@aniger.com.br', 'Gabriel'); //Seu e-mail
     $mail->Subject = 'Cadastro de cliente - ' . $nome;//Assunto do e-mail
 
 
     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress('gabriel.hipolito@aniger.com.br', 'Intranet');
 
     //Campos abaixo são opcionais 
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
 
 
     //Define o corpo do email
     //$mail->MsgHTML (teste); 
 
     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     $mail->MsgHTML(file_get_contents('teste2.html'));
 
     $mail->Send();
     echo "Mensagem enviada com sucesso</p>\n";
 
    //caso apresente algum erro é apresentado abaixo com essa exceção.
    }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
}
?>