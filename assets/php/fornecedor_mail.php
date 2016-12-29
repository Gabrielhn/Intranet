<?php
 
// Inclui o arquivo class.phpmailer.php
require_once("class.phpmailer.php");
 
// Inicia a classe PHPMailer
$mail = new PHPMailer(true);
 
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP

//REQUEST campos
$nome=$_POST['nome'];
$endereco=$_POST['endereco'];
$nro=$_POST['nro'];
$bairro=$_POST['bairro'];
$cep=$_POST['cep'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$cnpj=$_POST['cnpj'];
$ie=$_POST['ie'];
$contato=$_POST['contato'];
$fone=$_POST['fone'];
$email=$_POST['email'];
$emailN=$_POST['emailN'];
$prazo=$_POST['prazo'];
$tpmatserv=$_POST['tpmatserv'];
$obs=$_POST['obs'];
$autorizado=$_POST['autorizado'];
$dtAutorizado=$_POST['dtAutorizado'];

$mensagem = file_get_contents('fornecedor_tmp.html');
$dest='gabriel.hipolito@aniger.com.br';

$mensagem = str_replace('%nome%', $nome, $mensagem);
$mensagem = str_replace('%endereco%', $endereco, $mensagem);
$mensagem = str_replace('%nro%', $nro, $mensagem);
$mensagem = str_replace('%bairro%', $bairro, $mensagem);
$mensagem = str_replace('%cep%', $cep, $mensagem);
$mensagem = str_replace('%cidade%', $cidade, $mensagem);
$mensagem = str_replace('%estado%', $estado, $mensagem);
$mensagem = str_replace('%cnpj%', $cnpj, $mensagem);
$mensagem = str_replace('%ie%', $ie, $mensagem);
$mensagem = str_replace('%contato%', $contato, $mensagem);
$mensagem = str_replace('%fone%', $fone, $mensagem);
$mensagem = str_replace('%email%', $email, $mensagem);
$mensagem = str_replace('%emailN%', $emailN, $mensagem);
$mensagem = str_replace('%prazo%',$prazo, $mensagem);
$mensagem = str_replace('%tpmatserv%',$tpmatserv, $mensagem);
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
     $mail->SetFrom('gabriel.hipolito@aniger.com.br', 'Intranet'); //Seu e-mail
     $mail->AddReplyTo('gabriel.hipolito@aniger.com.br', 'Gabriel'); //Seu e-mail
     $mail->Subject = 'Cadastro de fornecedor - ' . $nome;//Assunto do e-mail
 
 
     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress($dest, 'Intranet');
 
     //Campos abaixo são opcionais 
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
 
 
     //Define o corpo do email
    //  $mail->MsgHTML (); 
 
     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     $mail->MsgHTML($mensagem);
 
     $mail->Send();
     echo "Mensagem enviada com sucesso</p>\n";
 
    //caso apresente algum erro é apresentado abaixo com essa exceção.
    }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
}
?>