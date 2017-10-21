        <?php
        include './includes/tags_inicio.php';
        include './includes/header.php';
	      if(isset($_SESSION['logado']) && $_SESSION['logado']=='SIM'){
		      header("Location: perfil.php");
		      exit();
	      }
	      ?>

  <section>
            <div class="geral clearfix" style="background-color:white;opacity:0.95;filter:alpha(opacity=60);border-radius:0px">

                <p class="paragrafos" align="center"> Para realizar seu Cadastro escolha uma das 2 opções abaixo: </p><br>
                <div style="clear:both;width:97.25722758%;margin:auto;">
                  <p align="center"><label class="campos">Eu estou  *</label>&nbsp;&nbsp;&nbsp;                           
                  <input type="radio" class="cor" name="usuario" tabindex="2" value="responsavel"/> Doando Pet &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" class="cor" name="usuario" tabindex="3" value="adotante"/> Adotando Pet </p><br><br>
                 
                </div><br>  
                
                <div class="conteudo" style=""> <!-- 45 / 1312-->
                   
                    <div class="divesq" style=""> <!-- max-width: 45.73170732% 650 / 1312-->
                       <form id="formc" action="grava_cadastro.php" name="cadastro" method="POST" enctype="multipart/form-data" onsubmit="return btCadastrar()">               
                            <label class="campos">Dados do Pet</label><br><br><br>

                            <label class="campos">Nome </label><br>
                            <input type="text" name="tnmpet" id="tnmpet" title="" pattern="^[a-zA-Zà-úÀ-Ú0-9 -]+$" autofocus="autofocus" size="39" maxlength="125"  tabindex="1"/><br><br>
                        
                            <label class="campos">Tipo *</label>&nbsp;&nbsp;&nbsp;                           
                            <input type="radio" class="cor" name="tipo" tabindex="2" value="cao"/> Cão &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" class="cor" name="tipo" tabindex="3" value="gato"/> Gato <br><br>
                                              
                            <label class="campos">Raça </label><br>             
                            <input type="text" name="traca" id="traca" size="39" pattern="^[a-zA-Zà-úÀ-Ú0-9 -]+$" maxlength="50" tabindex="4" /><br><br>
                        
                           <label class="campos">Sexo *</label>&nbsp;&nbsp;
                           <input type="radio" class="cor" name="sexo" tabindex="5" value="f"/> Fêmea &nbsp;
                           <input type="radio" class="cor" name="sexo" tabindex="6" value="m"/> Macho  <br><br>
                       
                           <label class="campos">Porte *</label><br>
                           <select name="selporte" id="selporte" tabindex="7">
                                    <option selected value=""></option>
                                    <option value="Micro">Micro</option>
                                    <option value="Pequeno">Pequeno</option>
                                    <option value="Medio">Médio</option>
                                    <option value="Grande">Grande</option>
                                    <option value="Gigante">Gigante</option>
                                </select><br><br>
                                                
                           <label class="campos">Faixa Etária *</label><br>
                           <select name="dtnasc" id="dtnasc" tabindex="8">
                                   <option selected value=""></option>
                                   <option value="Filhote">Filhote</option>
                                   <option value="Adulto">Adulto</option>
                                   <option value="Senior/Idoso">Sênior / Idoso</option>
                                </select><br><br>
                                                
                           <label class="campos">Características</label><br>
                           <textarea rows="4"  name="asobre" cols="42" maxlength="1000" pattern="^[a-zA-Zà-úÀ-Ú0-9 -,./:;?!@()]+$" resize="none" tabindex="9"></textarea><br>
                           <label class="info">Outras informações que achar necessário</label><br><br>

                           <label class="campos">Imagens de até 2MB</label>
                             <div id="fotos">
                               
                                <a href="#">
                                <img src="img/padrao.jpg" style='border:2px solid black' height="140px" width="140px" id="foto" >
                                  <!--  <img src="img/padrao.jpg" height="100px" width="110px" id="foto2">
                                    <img src="img/padrao.jpg" height="100px" width="110px" id="foto3"><br>
                                    <img src="img/padrao.jpg" height="100px" width="110px" id="foto4">
                                    <img src="img/padrao.jpg" height="100px" width="110px" id="foto5">
                                    <img src="img/padrao.jpg" height="100px" width="110px" id="foto6">  -->
                                </a>
                                </div>
                                <div>
                                    <input type="file" value="fileToUpload" style="font-size:1.2em" name="fileToUpload" tabindex="15" id="imagemSub" size="38" accept="image/gif, image/jpeg, image/jpg, image/png" onchange="return is_img(this.id);"/>
                                </div><br><br>
                                <div id="hint"></div>
                    </div>   
                    <div class="divdir" style=""> <!-- /* 45 / 1312 */-->
                        
                           <label class="campos">Dados do Doador ou Adotante</label><br><br><br>

                           <label class="campos">Nome *</label><br>
                           <input type="text" name="tnmprot" size="39" pattern="^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" maxlength="150" tabindex="10"value="" /><br><br>
                            
                           <label class="campos">Cep  </label></br>
                           <input name="tcep" type="text" id="tcep" size="39" tabindex="11" maxlength="9" title="Somente números" pattern="^[0-9]{5}-[0-9]{3}$" OnKeyPress="formata('#####-###', this)" size="30" maxlength="10" />
                           <br>
                          <label class="info">Este dado não aparece no anúncio </label> &nbsp;<a href="http://www.buscacep.correios.com.br/sistemas/buscacep/"target="_blank"  tabindex="11" style="color:blue;font-size:1.0em;text-decoration:none"> Não sei meu CEP</a><br><br><br>
                      
                          <label class="campos">E-mail *</label><br>
                          <input type="email" name="temail" id="text2" size="39" maxlenggth="60" tabindex="12" onblur="getEmail(this.value)"/><br>
                          <label class="info">Este dado não aparece no anúncio</label><br><br>
                        
                          <div id="showHint"></div><br>
                       
                          <label class="campos">Minha Senha *</label><br>
                          <input type="password" name="tsenha" size="39" id="tsenha" title="Letras ou números,mínimo 6"pattern="^[a-zA-Zà-úÀ-Ú0-9]+$" maxlength="20"  tabindex="13"/><br><br>
                        
                          <label class="campos">Confirmar Senha *</label><br>
                          <input type="password" name="tconfsenha" id="tconfsenha" oninput="check(this)" pattern="^[a-zA-Zà-úÀ-Ú0-9]+$" maxlength="20"  size="39" tabindex="14" /><br><br><br><br><br><br><br><br>

                           <p align="right"><label class="asterisco">*</label><label style="font-size:1.2em"> Campos Obrigatórios!</label></p>
                            
                          
                    </div>
               <div style="width:97.25722758%;clear:both; "> <!-- 1312/1349-->
                            <br>
                                                                                    
                                <p align="center" style="font-size:1.3em"><input type="checkbox" name="termos" value="s" tabindex="16">&nbsp;Li e concordo com os <a href="acordo.php" target="_blank" style="color:blue;font-weight:bold;text-decoration:none" tabindex="16">Termos de Compromisso</a> Pet's Lover</p><br>
                            
                                <div id="hid3"></div>
                             
                               <p align="center"><button type="submit" name="cadastrar" id="btnfarejar" style="min-width:28.96341463%" tabindex="17">Cadastrar</button></p><br> <!-- 400/1312-->
                            
                               <div id="hidden2"></div>
                            </form>
               </div>    
               </div>
                
            </div>

  </section>

         
        <?php include("includes/footer.php"); ?>
    </div>
    <script src="includes/showImage.js"></script>

