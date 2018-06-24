<!DOCTYPE html>
<html>
<head>
  <title>Pet's Lover</title>
  
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('css/style.css')); ?> ">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('css/normalize.css')); ?> ">
	

	<!-- Javascript -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
  	<script src="<?php echo e(asset('js/validacao_js.js')); ?>"></script>

</head>
<body>
<!-- ====================  MELHORAR ======================== -->
<!-- tentei inserir essa funcao no outro arquivo, mas nao deu certo. Deve ser porque utiliza o atributo name do href contido na pag e nao chama pelo nome da funcao. 
Para deixar sem esse trecho de cod aqui, será necessario utilizar outra funcao de modal. Ass:D-->
<script type="text/javascript">

$(document).ready(function() {  

  $('a[name=modal]').click(function(e) {
    e.preventDefault();
    
    var id = $(this).attr('href');
  
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();
  
    $('#mask').css({'width':maskWidth,'height':maskHeight});

    $('#mask').fadeIn(1000);  
    $('#mask').fadeTo("slow",0.8);  
  
    //Get the window height and width
    var winH = $(window).height();
    var winW = $(window).width();
              
    $(id).css('top',  winH/2-$(id).height()/2);
    $(id).css('left', winW/2-$(id).width()/2);
  
    $(id).fadeIn(2000); 
  
  });
  
  $('.window .close').click(function (e) {
    e.preventDefault();
    
    $('#mask').hide();
    $('.window').hide();
  });   
  
  $('#mask').click(function () {
    $(this).hide();
    $('.window').hide();
  });     
  
});

</script> 

   <header>
    <div id="header">
        <div id="headertable"> 
                <div class="logo logoDef">
                 <a href="/"><img src="<?php echo e(asset('image/logo.png')); ?>"></a>
                </div> 
                <div class="acesso acessoDef" style="width:74.128984%"> 
                    
                    <?php if(Session::has('usuario')): ?>
                     <p align="right" class="pOla">Olá</p>                        
                     <p align="right">
                            <a href="logout.php" id="senha" class="linkOut" tabindex="2">SAIR</a>
                      </p>
                           
                    <?php else: ?>

                       <form id="login" name="login" method="POST" action="/logar">
                        <?php echo e(csrf_field()); ?>

                           <div class="divlogin"> 
                              <p align="right">
                                  <input type="email" class="inpsize" id="email" name="email" maxlength="60" tabindex="1" size="36" required placeholder="E- mail" required> 
                                  <input type="password" id="pass" name="senha" required class="inpsize" maxlength="20" tabindex="2" placeholder="Senha">&nbsp;
                                  <input type="submit"  name="btlogin" type="button" id="btlogin" tabindex="3" value="Entrar"/>
                              </p>
                               
                              <p class="llogin lNao" style="width:53%;">
                                <a href="/form-recuperar-senha" id="senha" tabindex="4">  Esqueci a Senha </a>
                                <a href="#dialog" name="modal" id="senha" tabindex="5"> &nbsp;&nbsp;&nbsp; N&atilde;o Possuo Cadastro</a>
                              </p><div id="hidden" align="right">&nbsp;</div>
                              
                           </div>  
                                
                       </form>
                    <?php endif; ?>
                
        </div></div>
        <nav id="headernav">
          <div align="center">
            <ul>
            <?php if(Session::has('usuario')): ?>
              <li><a href='/perfil'>Principal</a></li>
              <li><a href="/galeria">Galeria</a></li>
              <li><a href='/contato'>Fale Conosco</a></li>
            <?php else: ?>
              <li><a href='/'>Principal</a></li>
              <li><a href='/galeria'>Galeria</a></li>
              <li><a href='/cadastrar'>Cadastro</a></li>
              <li><a href='/contato'>Fale Conosco</a></li>
            <?php endif; ?>
            </ul>
          </div>
         
        </nav>
    </div>
    <script src="<?php echo e(asset('js/jquery-1.12.3.js')); ?>"></script>
    <script src="<?php echo e(asset('js/functions.js')); ?>"></script>
    
</header>
 
<div id="boxes">
     <div id="dialog" class="window trocaDiv linksModal">
       <ul>
        <li class="li1Modal"><a href="cadastrar-adotante" onclick="this.value=''"> Quero Adotar </a></li> 
        <li class="li2Modal"><a href="cadastrar" onclick="this.value=''"> Quero Doar </a></li> 
       </ul>  
     </div>
</div>
<!-- ================================================ -->

	<?php echo $__env->yieldContent('content'); ?>

<footer>
	<div id="footer">
	  	<nav id="footernav">
	    	<div align="center">
	  			<ul>
	  				<li><a href="quem-somos">Quem Somos</a></li>
	  				<li><a href="termo-de-uso">Termos de Compromisso</a></li>
	  				<li><a href="perguntas-frequentes">Perguntas Frequentes</a></li>
	  		 	</ul><br>
	       	<p align="center" class="sAssinatura">&copy; 2016 Pet's Lover - Todos os direitos reservados.</p>
	       
	  	  </div>
	    </nav>
	</div>
</footer>
</body>
</html>
