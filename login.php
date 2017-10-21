<?php include("includes/tags_inicio.php");?>
 <header>
    <div id="header">
        <div id="headertable" style=""><!-- 1200/1349 --> 
                <div class="logo" style="float:left;padding-left:4.6%; padding-top:1.5%">
                 <a href="index.php"><img src="img/logo1.PNG" style=""></a>
                </div> 
                <div class="acesso" style="float:right;width:74.128984%;padding-top:3px;padding-right: 3%"> <!-- 1000/1349-->
                    <?php
                      session_start();
                      if (isset($_SESSION['nmUsuario'])) {
                        $cd = $_SESSION['cdUsuario'];
                        $_SESSION['logado'] = 'SIM';

                    ?>
                        
                     <p align="right" style="font-size:1.5em;color:white;font-weight:bold">Olá, <?php echo $_SESSION['nmUsuario']; ?></p>                        
                     <p align="right"><a href="perfil.php" id="senha" tabindex="1" autofocus>Perfil</a>&nbsp;&nbsp;
                                <a href="logout.php" id="senha"style="text-decoration:none" tabindex="2">Sair</a></p>
                    <?php } ?> 

         </div></div><br><br>
        <nav id="headernav" style="">
          <div align="center">
            <ul>
                <li><a href="index.php">Principal</a></li>
                <li><a href="galeria.php">Galeria</a></li>
                <li><?php
                    if (!isset($_SESSION['nmUsuario'])) {
                        echo "<a href='cadastro.php'>Cadastro</a>";
                    }else{
                  echo "<a href='mensagem.php'>Mensagens</a>";
              }
                    ?></li>
                <li><a href="contato.php">Fale Conosco</a></li>
            </ul>
          </div>
        </nav>
    </div>

    <script src="js/jquery-1.12.3.js"></script>
    <script src="includes/functions.js"></script>
    <script src="includes/validacao_js.js"></script>
</header>
  
<section>
    <div class="geral clearfix" style="min-height:560px">
        <br/><br/>
        <p class="index" align="center">Acesse sua Conta!</p><br><br>
     <div class="conteudo">   
      <div class="divdir" style="padding-top:3%">  
        <form id="login"  name="login" method="POST" action="verifica_login.php" style="">
            <table border="0" style="float:right;max-width:71.929825%;background-color:#CEE3F6;opacity:0.85;filter:alpha(opacity=60);border-radius:10px;font-size:1.2em;box-shadow: 5px 5px 5px #87cefa;">
                <tr><td>&nbsp;</td></tr>

                <tr align="center">
                   
                    <td><input type="email" id="email" name="email" size="28" value="" maxlength="60" autofocus required tabindex="1" placeholder="E-mail"></td>
                </tr>
               
                <tr align="center">
                    
                    <td><input type='password' style='color:black' id='pass' name='senha' size='28'  maxlength='20' required tabindex="2" placeholder="Senha"></td>
                </tr>
                 <tr><td>&nbsp;</td></tr>
                <tr align="center">
                    <td><button type="button" name="btlogin" id="btlogin" tabindex="3" style="width:100%">Entrar</button></td>
                </tr>
                 
                <tr>
                    <td colspan="2"align="center"><a href="form_recuperar_senha.php" id="link" maxlength="10" required tabindex="4">&nbsp; Esqueci a Senha</a>
                        <a href="cadastro.php" name="scad" id="link" tabindex="5">&nbsp;&nbsp;Não Possuo Cadastro&nbsp;&nbsp;</a></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <div id="hidden" style="color:#8b0000;font-size:1.5em;font-weight:bold">
                        </div>
                    </td>
                </tr>
            </table>
        </form>
       </table></div>
     </div>  
    </div>
</section>

<?php include("includes/footer.php"); ?>



