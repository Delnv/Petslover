<!DOCTYPE html>
<html>
<head>
  <title>Pet's Lover</title>
  
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf_token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/normalize.css"/>

	<!-- Javascript -->
	<script type="text/javascript"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
  <script src="{{ asset('js/validacao_js.js') }}"></script>

</head>
<body>
<!-- ====================  MELHORAR ======================== -->
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
<style type="text/css">


  
#boxes .window {
  float: right;
  //position:absolute;
  
  width:220px;
  height:50px;
  display:none;
  //z-index:9999;
  padding:10px;
  margin-right: 5%;
}

#boxes #dialog {
  width: 200px; 
  height:50px;
  //padding:10px;
  background-color:#ffffff;
}


</style>
   <header>
    <div id="header">
        <div id="headertable" style=""><!-- 1200/1349 --> 
                <div class="logo" style="float:left;padding-left:4.6%; ">
                 <a href="/"><img src="{{ asset('image/logo.png') }}" style=""></a>
                </div> 
                <div class="acesso" style="float:right;width:74.128984%;padding-right: 3%"> <!-- 1000/1349-->
                    
                    @if(Session::has('usuario'))
                     <p align="right" style="font-size:1.6em;color:white;font-weight:bold">Olá</p>                        
                     <p align="right">
                                <a href="logout.php" id="senha" style="text-decoration:none;font-size:1.3em" tabindex="2">SAIR</a></p>
                           
                    @else

                       <form id="login" name="login" method="POST" action="/logar">
                        {{csrf_field()}}
                           <div class="divlogin" style=""> 
                              <p align="right"><input type="email" class="inpsize" id="email" name="email" maxlength="60" value="" tabindex="1" size="36" required placeholder="E- mail" required> 
                                  <input type="password" id="pass" name="senha" required class="inpsize" maxlength="20" tabindex="2" placeholder="Senha">&nbsp;
                                  <input type="submit"  name="btlogin" type="button" id="btlogin" tabindex="3"value="Entrar"/>
                              </p>
                               
                              <p class="llogin" style="width:53%;float:right; ">
                                <a href="form_recuperar_senha.php" id="senha" tabindex="4">  Esqueci a Senha </a>
                                <a href="#dialog" name="modal" id="senha" tabindex="5"> &nbsp;&nbsp;&nbsp; N&atilde;o Possuo Cadastro</a>
                              </p><div id="hidden" align="right">&nbsp;</div>
                              
                           </div>  
                            
                            
                       </form>
                    @endif
                
        </div></div>
        <nav id="headernav" style="">
          <div align="center">
            <ul>
            @if(Session::has('usuario'))
              <li><a href='/perfil'>Principal</a></li>
              <li><a href="/galeria">Galeria</a></li>
              <li><a href='/contato'>Fale Conosco</a></li>
            @else
              <li><a href='/'>Principal</a></li>
              <li><a href="/galeria">Galeria</a></li>
              <li><a href='/cadastrar'>Cadastro</a></li>
              <li><a href='/contato'>Fale Conosco</a></li>
            @endif
            </ul>

          </div>
         
        </nav>
    </div>

    <!--<script src="js/jquery-1.12.3.js"></script>-->
    <!--<script src="includes/functions.js"></script>    -->
</header>
 
<div id="boxes">
     <div id="dialog" class="window" style="border: 1px solid red;">
      <p align="center">
       <a href="cadastro_adotante.php" onclick="this.value=''"> Quero Adotar </a> &nbsp; &nbsp;
       <a href="cadastro.php" onclick="this.value=''"> Quero Doar </a> 
      </p>  
     </div>
 
</div>
<!-- ================================================ -->

	@yield('content')

<footer>
	<div id="footer">
	  	<nav id="footernav">
	    	<div align="center">
	  			<ul>
	  				<li><a href="/quem-somos">Quem Somos</a></li>
	  				<li><a href="/termo-de-uso">Termos de Compromisso</a></li>
	  				<li><a href="/perguntas-frequentes">Perguntas Frequentes</a></li>
	  		 	</ul><br>
	       	<p align="center" style="font-size:1.4em;color:white">&copy; 2016 Pet's Lover - Todos os direitos reservados. </p>
	       
	  	  	</div>
	    </nav>
	</div>
</footer>
</body>
</html>
