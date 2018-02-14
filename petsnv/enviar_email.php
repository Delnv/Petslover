<?php

$nome = $_POST['tnome'];
$email =$_POST['temail'];
$assunto =$_POST['assunto'];
$mensagem =$_POST['mensagem'];

if(isset($_POST['enviar'])){

	$email_remetente = "contato@petslover.com.br"; // conta de email valido do dominio

	//Configurações do email

	$email_destinatario = "contato@petslover.com.br"; // email que receberá as mensagens
	$email_assunto = "Contato"; // assunto da mensagem

	//Corpo da Mensagem

	$email_conteudo = "Nome = $nome \n";
	$email_conteudo .= "Email = $email \n";
	$email_conteudo .= "Assunto = $assunto \n";
	$email_conteudo .= "Mensagem = $mensagem \n";

	//Seta os Headers
	//implode — Junta elementos de uma matriz em uma string
	$email_headers = implode ( "\n",array (
	"MIME-Version: 1.0",
    "Content-Type: text/html; charset=UTF-8",
    "From: $email_remetente",
    "Reply-To: $email",
    "Cc: $email_remetente",
    "Return-Path: $email_remetente" ) );

     //nl2br — Insere quebras de linha HTML antes de todas newlines em uma string
	if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){
							echo "<script>alert(\"Mensagem enviada com sucesso!\")</script>";
							echo "<script>window.location = \"index.php\"</script>";
						}
						else{
							echo "<p><b>$nome</b><br />Ouve um erro no envio, desculpe-nos pelo transtorno!!!</p>";
						}

  }
?>
