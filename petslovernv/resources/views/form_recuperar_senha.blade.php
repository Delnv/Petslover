@extends('template.template')
@section('content')    
    <?php

      date_default_timezone_set("America/Sao_Paulo");
      ini_set('smtp_port', '587');

      
        if(isset($_POST['acao']) && $_POST['acao'] == 'recuperar'):


          $email = strip_tags(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));


          $verificar = mysqli_query($con, "SELECT emailUsuario FROM LOGIN WHERE emailUsuario = '".$email."'");


          if(mysqli_num_rows($verificar) == 1){


            $codigo = base64_encode($email);
            $data_expirar = date('Y-m-d H:i:s', strtotime('+1 day'));

            $mensagem = 'Recebemos uma tentativa de recuperação de senha para este e-mail, caso não tenha sido você,
              desconsidere este e-mail, caso contrário clique no link abaixo\n
              http://www.petslover.com.br/recuperar_senha.php?codigo='.$codigo;
            $email_remetente = '';

            $headers = "MIME-Version: 1.1\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\n";
            $headers .= "From: $email_remetente\n";
            $headers .= "Return-Path: $email_remetente\n";
            $headers .= "Reply-To: $email\n";

            $inserir = mysqli_query($con, "INSERT INTO CODIGOS (codigo, data) VALUES ('".$codigo."', '".$data_expirar."')");

        
            if($inserir){

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
            $mailer->FromName	= 'PetsLover';					// Nome que será exibido para o destinatário
            $mailer->From	= 'contato@petslover.com.br';	// Obrigatório ser a mesma caixa postal indicada em "username"
            $mailer->AddAddress($email);			// Destinatários
            $mailer->Subject	= 'Recuperação de Senha';
            $mailer->Body		= $mensagem;
            if(!$mailer->Send()){
                    echo "<script> alert('Mensagem não enviada. Tente novamente.'); window.location.href='/form_recuperar_senha';</script>";
                    exit;
            }
            //print "E-mail enviado!";

            header("Location: email_senha.php");

                //if(mail("$email", "Recuperação de Senha", "$mensagem", $headers, "$email_remetente")){
                //echo 'Enviamos um e-mail com um link para recuperação de senha, para o endereço de e-mail informado!';
            //  }
            }
          }

          else {
              echo "<script> alert('Email não cadastrado. Tente novamente.'); window.location.href='/form_recuperar_senha';</script>";
    }

          exit();
        endif;
        ?>

    <section>
        <div class="geral clearfix">
           <br><br>
            <p align="center" class="paragrafos">Para logar novamente em nosso site <br>
                              preencha o campo abaixo e recupere sua senha <br>
                              Voc&ecirc; receber&aacute; uma senha provis&oacute;ria v&aacute;lida por 24 horas</p><br> <br> 


              <!--<form method="post" enctype="multipart/form-data" action="http://scripts.hospedagemdesites.ws/scripts/formmail.pl"/>-->
              <form method="post" enctype="multipart/form-data" action="/form_recuperar_senha"/>
        <div class="conteudo">
          <div class="forms" style="min-width: 40.396341%; margin:auto;">
            <br><br>
            
             <p align="center"><input type="email" name="email" id="email" size="39"  class="recsenha" autofocus required placeholder="E- mail Cadastrado" tabindex="1"/></p> <br>
              <input type="hidden" name="acao"  value="recuperar"/><br>
                       
           <p align="center"><button type="submit" name="recupera" tabindex="2" style="min-width:20%" id="btnfarejar"/>Recuperar Senha</button></p>
          
        </form>
         </div>
          
        </div>
       </div>
    </section>

  </div>
@endsection
  
    
