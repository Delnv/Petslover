<?php  include './includes/tags_inicio.php' ?>

<header>
    <div id="header">
        <div id="headertable" style=""><!-- 1200/1349 --> 
                <div class="logo" style="float:left;padding-left:4.6%; ">
                 <a href="index.php"><img src="img/logo.png" style=""></a>
                </div>
         <div class="acesso" style="float:right;width:74.128984%;padding-right: 3%">
         &nbsp;
         </div></div>     
     <nav id="headernav" style="">
          <div align="center">
            <ul>
                <li>
                <?php
                    if (!isset($_SESSION['nmUsuario'])) {
                        echo "<a href='index.php'>Principal</a>";
                    }else{
                        echo "<a href='perfil.php'>Principal</a>";
                    }
                    ?></li>
                <li><a href="galeria.php">Galeria</a></li>
                <li><?php
                    if (!isset($_SESSION['nmUsuario'])) {
                        echo "<a href='cadastro.php'>Cadastro</a>";
                    }else{
                              echo "<a href='contato.php'>Fale Conosco</a>";
                          }
                    ?></li>
                <li><?php
                    if (!isset($_SESSION['nmUsuario'])) {
                        echo "<a href='contato.php'>Fale Conosco</a>";
                    }else{
                     echo "<a href=''></a>";
                    }
                    ?></li>
            </ul>
          </div>
        </nav>
    </div>

    <script src="js/jquery-1.12.3.js"></script>
    <script src="includes/functions.js"></script>
    
</header>

 <div class="container" style="">

 <script src="includes/validacao_js.js"></script>
  <section>
            <div class="geral clearfix" style="">

             <p class="paragrafos" align="center" style="color: #00BFFF ">Login </p>
             <div class="conteudo" style="">
                         
              <form id="login" name="login" method="POST" action="verifica_login.php">
              <table border="0" style="margin:auto;max-width:71.929825%;background-color:aliceblue;opacity:0.85;filter:alpha(opacity=60);border-radius:10px;font-size:1.2em;box-shadow: 5px 5px 5px #87cefa;">
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
       
      </div>
                
    </div>

  </section>
         
 </div>
    <script src="includes/showImage.js"></script>
    <?php include("includes/footer.php"); ?>
</div>
</body>
</html>
  