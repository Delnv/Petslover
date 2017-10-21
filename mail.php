<?php
	require_once('class.phpmailer.php');
	
	$mailer = new PHPMailer();
	$mailer->IsSMTP();
	$mailer->SMTPDebug = 0;
	$mailer->Port = 587; // Indica a porta de conexão para a saída de e-mails. Utilize obrigatoriamente a porta 587.
	$mailer->Host = 'localhost'; // Onde em 'servidor_de_saida' deve ser alterado por um dos hosts abaixo:
	/**
	 * Para cPanel: 'localhost';
	 * Para Plesk 11 / 11.5: 'smtp.dominio.com.br';
	 * Descomente a linha abaixo caso revenda seja 'Plesk 11.5 Linux'
	 */
	#$mailer->SMTPSecure	= 'tls';
	$mailer->SMTPAuth	= false;						// Define se haverá ou não autenticação no SMTP
	#$mailer->Username	= '';							// Informe o e-mai o completo
	#$mailer->Password	= '';							// Senha da caixa postal
	$mailer->FromName	= 'nome';					// Nome que será exibido para o destinatário
	$mailer->From		= 'contato@petslover.com.br';	// Obrigatório ser a mesma caixa postal indicada em "username"
	$mailer->AddAddress('contato@petslover.com.br');			// Destinatários
	$mailer->Subject	= 'assunto'.date("H:i").'-'.date("d/m/Y");
	$mailer->Body		= 'mensagem';
	if(!$mailer->Send()){
		echo "Mensagem nao enviada";
		echo "Erro: " . $mailer->ErrorInfo;
		exit;
	}
	print "E-mail enviado!";