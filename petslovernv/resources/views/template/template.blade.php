<!DOCTYPE html>
<html>
<head>
  <title>Pet's Lover</title>
  
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf_token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="{{ asset ('css/style.css') }} ">
  <link rel="stylesheet" type="text/css" href="{{ asset ('css/normalize.css') }} ">
	

	<!-- Javascript -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
  	<script src="{{ asset('js/validacao_js.js') }}"></script>

</head>
<body>
<!-- ====================  MELHORAR ======================== -->
<!-- tentei inserir essa funcao no outro arquivo, mas nao deu certo. Deve ser porque utiliza o atributo name do href contido na pag e nao chama pelo nome da funcao. 
Para deixar sem esse trecho de cod aqui, será necessario utilizar outra funcao de modal. Ass:D-->
<script type="text/javascript">

/* utilizado no modal do link nao possuo cadastro e no bt entrar do header */

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

/* Utilizado para exibir o menu apenas nas medias 6 e 7 */
    $("#menu").click(function(e) {
        e.preventDefault();
        $("#divMen").toggleClass("toggled");
    });
/* Utilizado no menu hamburguer ao exibir os links */
function openNav() {
    document.getElementById("mySidenav").style.width = "90%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

</script> 

   <header>
    <div id="header">
        <div id="headertable"> 
                <div class="logo logoDef">
                 <a href="/"><img src="{{ asset('image/logo.png') }}"></a>
                </div> 
                <div class="acesso acessoDef" style="width:74.128984%"> 
                    
                  @if(Session::has('usuario'))
		    <div class="MLogUs">  
                     <p align="right" class="pOla">Olá</p>                        
                     <p align="right">
                         <a href="logout.php" id="senha" class="linkOut" tabindex="2">SAIR</a>
                     </p>
                    </div>       
                  @else
                      <div class="divlogin" id="divlogin">
                       <form id="login" name="login" method="POST" action="/logar">
                        {{csrf_field()}} 
                              <p align="right">
                                  <input type="email" class="inpsize" id="email" name="email" maxlength="60" tabindex="1" size="36" required placeholder="E- mail" required> 
                                  <input type="password" id="pass" name="senha" required class="inpsize" maxlength="20" tabindex="2" placeholder="Senha">&nbsp;
                                  <input type="submit"  name="btlogin" type="button" id="btlogin" tabindex="3"value="Entrar"/>
                              </p>
                               
                              <p class="llogin lNao" style="width:53%;">
                                <a href="/form-recuperar-senha" id="senha" tabindex="4">  Esqueci a Senha </a>
                                <a href="#dialog" name="modal" id="senha" tabindex="5"> &nbsp;&nbsp;&nbsp; N&atilde;o Possuo Cadastro</a>
                              </p><div id="hidden" align="right">&nbsp;</div>                                         
                        </form>
		       </div> <!-- fim divlogin -->
                  @endif
		  
                   <!-- div menu que exibe as informacoes do menu hamb. -->
                    <div id="divMen" class="divMenu">
                      <span href="#menu" class="spanMenu" onclick="openNav()">&#9776;</span>
                  @if(Session::has('usuario'))
                  @else
                      <a href="#log" id="btlogin" style="float:right" class="llog" name="modal" tabindex="3" >Entrar</a>
                  @endif             
                    </div><!-- fim div menu --> 
                  
        </div> <!-- fim div acesso -->
      </div>
        
        <nav id="headernav">
          <div align="center">
            <ul id="mainNav">
            @if(Session::has('usuario'))
              <li><a href='/perfil'>Principal</a></li>
              <li><a href="/galeria">Galeria</a></li>
              <li><a href='/contato'>Fale Conosco</a></li>
            @else
              <li><a href='/'>Principal</a></li>
              <li><a href='/galeria'>Galeria</a></li>
              <li><a href='/cadastrar'>Cadastro</a></li>
              <li><a href='/contato'>Fale Conosco</a></li>
            @endif
            </ul>
          </div>
         
        </nav>
    </div>
    
     <!-- Exibe o conteúdo do menu hamburguer -->
      <div id="mySidenav" class="sidenav">
          
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="index.php" style="padding-left: 14px"><img src="{{ asset('image/logo.png') }}" ></a>
          <br>
          <nav id="headernav">
          <ul style="padding-left: 20px">
	    @if(Session::has('usuario'))
              <li><a href='/perfil'>Principal</a></li>
              <li><a href="/galeria">Galeria</a></li>
              <li><a href='/contato'>Fale Conosco</a></li>
	      <li><a href="quem-somos">Quem Somos</a></li>
	      <li><a href="termo-de-uso">Termos de Compromisso</a></li>
	      <li><a href="perguntas-frequentes">Perguntas Frequentes</a></li>
	    @else   
	      <li><a href='/'>Principal</a></li>
              <li><a href='/galeria'>Galeria</a></li>
              <li><a href='/cadastrar'>Cadastro</a></li>
              <li><a href='/contato'>Fale Conosco</a></li>
	      <li><a href="quem-somos">Quem Somos</a></li>
	      <li><a href="termo-de-uso">Termos de Compromisso</a></li>
	      <li><a href="perguntas-frequentes">Perguntas Frequentes</a></li>
	  </ul>
          </nav>
        </div>
    <!--  fim menu hamburguer -->
    <script src="{{ asset('js/jquery-1.12.3.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    
  <!-- Exibe o modal login  no bt entrar-->
 
  <div id="boxes1" >
     <div id="log" class="window">
       <form id="login" name="login" method="POST" action="verifica_login.php">
           
            <br> <a href="#" class="close" style="">X &nbsp;&nbsp;</a> 
               
                      <p align="center">
                          <input type="email" class="recsenha" id="email" name="email" maxlength="60" tabindex="1"  required placeholder="E - mail" required></p> 
                      <p align="center" >
                          <input type="password" id="pass" name="senha" required class="recsenha" maxlength="20" tabindex="2" placeholder="Senha"></p>
                      <p align="center">
                          <input type="submit" name="btlogin" type="button" id="btlogin" tabindex="3" value="Entrar"/></p>
                      <br>
                               
                      <p align="center" style="margin:auto">
                          <a href="form_recuperar_senha.php" id="mLog" tabindex="4">  Esqueci a Senha</a>&nbsp;&nbsp;&nbsp;&nbsp;
                          <a href="cadastro.php" id="mLog" tabindex="5">  N&atilde;o Possuo Cadastro</a>
                      </p><br>
                      <div id="hidden"></div>
       </form>
    </div>

   <!-- Máscara para cobrir a tela -->
    <div id="mask"></div> 
  
   <!-- Fim do modal login-->   
    
</header>

<!-- Exibe o modal com os bts doar e adotar -->
<div id="boxes">
     <div id="dialog" class="window trocaDiv linksModal">
       <br> <a href="#" class="close">X &nbsp;&nbsp;</a> 
       <ul>
        <li class="li1Modal"><a href="cadastrar" onclick="this.value=''"> Quero Doar </a></li> 
        <li class="li2Modal"><a href="cadastrar-adotante" onclick="this.value=''"> Quero Adotar </a></li> 
       </ul>  
     </div>
</div>
<!--  fim do modal  bts doar e adotar --> 
<!-- ================================================ -->

	@yield('content')

<footer>
	<div id="footer">
	     <nav id="footernav">
	    	<div align="center">
	  			<ul id="mainNav">
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
