   <header>
    <div id="header">
        <div id="headertable" style=""><!-- 1200/1349 --> 
                <div class="logo" style="float:left;padding-left:4.6%; padding-top:1.5%">
                 <a href="index.php"><img src="img/logo1.PNG" style=""></a>
                </div> 
                <div class="acesso" style="float:right;width:74.128984%;padding-top: 0.3%;padding-right: 3%"> <!-- 1000/1349-->
                    <?php
                      session_start();
                      if (isset($_SESSION['nmUsuario'])) {
                        $cd = $_SESSION['cdUsuario'];
                        $_SESSION['logado'] = 'SIM';
                    ?>
                        
                     <p align="right" style="font-size:1.5em;color:white;font-weight:bold">Olá, <?php echo $_SESSION['nmUsuario']; ?></p>                        
                     <p align="right"><a href="perfil.php" id="senha" tabindex="1" autofocus>Perfil</a>&nbsp;&nbsp;
                                <a href="logout.php" id="senha"style="text-decoration:none" tabindex="2">Sair</a></p>
                           
                
                    <?php
                    } else {
                        $_SESSION['logado'] = 'NAO';
                    ?>

                       <form id="login" name="login" method="POST" action="verifica_login.php">
                           <div class="divlogin" style=""> 
                              <p align="right"><input type="email" class="inpsize" id="email" name="email" maxlength="60" value="" tabindex="1" required placeholder="E- mail" required> 
                                  <input type="password" id="pass" name="senha" required class="inpsize" maxlength="20" tabindex="2" placeholder="Senha">&nbsp;
                                  <input type="submit"  name="btlogin" type="button" id="btlogin" tabindex="3"value="Entrar"/>
                              </p>
                               
                              <p class="llogin" style="width:47%;float:right;">
                                <a href="form_recuperar_senha.php" id="senha" tabindex="4">  Esqueci a Senha </a>
                                <a href="cadastro.php" name="scad" id="senha" tabindex="5"> &nbsp;&nbsp;&nbsp; N&atilde;o Possuo Cadastro</a>
                              </p>
                           </div>  
                            
                            <div id="hidden" align="right" style="">&nbsp;</div>
                       </form>
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


    