<?php include "./includes/tags_inicio.php"; ?>

 
<script>
 
 /* utilizada na abas do perfil do pet (divdir) pag. perfil/ menagem */
  function esconderDivsPet(obj){
            document.getElementById('dados').style.display="none";
            document.getElementById('editar').style.display="none";
            document.getElementById('excluir').style.display="none";
            document.getElementById('editarBts').style.display="none";
            document.getElementById('dialogoMsg').style.display="none";

            switch(obj.id){
             case 'dds':
             document.getElementById('dados').style.display="block";
             break;
           
             case 'ed':
             document.getElementById('editar').style.display="block";
             document.getElementById('editarBts').style.display="block";
             break;

             case 'exl':
             document.getElementById('excluir').style.display="block";
             break;

             case 'msgsR':
             document.getElementById('dialogoMsg').style.display="block";
             break;
           }
          } 
 
 /* utilizada para esconder/exibir a div com os dilogos das msgs */
  var v = true; //Variável que vai manipular o botão Exibir/ocultar        
  function escondeExibeDiv() { // Quando clicar no botão.
 
    if (v) {//Se a variável visibilidade for igual a true, então...
        document.getElementById("dialogoMsg").style.display = "none";//Ocultamos a div
        v = false;//alteramos o valor da variável para falso.
    } else {//ou se a variável estiver com o valor false..
        document.getElementById("dialogoMsg").style.display = "block";//Exibimos a div..
        v = true;//Alteramos o valor da variável para true.
    }
}        
  
</script>

<div class="container" style="">
<?php include './includes/header.php';?>
  <section>
    <div class="geral clearfix">
       <?php
                    require_once("conexao.php");
                    require_once ("includes/tratarErro.php");

                    $con = abreConexao();
                    $cd = $_SESSION['cdUsuario'];

                    $sql = "SELECT p.cdPet,p.nmPet,p.nmFaixaEtariaPet,p.nmTipoPet,p.descPet,
              p.nmPortePet,p.icSexoPet,u.nmUsuario,u.cdCep,u.cdUsuario,l.emailUsuario,i.imgPet1
              FROM PET p, USUARIO u, LOGIN l, IMAGEM_PET i
              WHERE  u.cdUsuario=l.cdUsuario
              and u.cdUsuario=p.cdUsuario and p.cdPet=i.cdPet and u.cdUsuario='" . $cd . "'";
               $result = mysqli_query($con,$sql);
                    
                    if ( $result == FALSE) {
                        echo "Erro de conexão com o banco: " . mysqli_connect_error();
                    } else {

                        while ($linha = mysqli_fetch_object($result)) {
        ?>
      
      <div align="center" style="clear:both;width:97.25722758%;margin:auto;">
      <p class="paragrafos" style="color:  #0000CD" align="center"><b>Perfil <?php echo $linha->nmUsuario ?></b></p>
      </div>
      <div class="conteudo" style=''> <!-- 1200/1349-->
               
        <div class="divesq" style="width: 30%"> <!-- 600 / 1312-->

        <!--  <div align="right" id="divContMsgs">  div que exibira a contagem das msgs recebidas 
             <label class="campos2" style="padding:0;"></label> &nbsp; -->
             <img src="img/pata_verde.png" align="right" style="width:30px;height:25px" class="noteMsg" id="foto">
         <!-- </div>--><br>
          
          <div class="trocaDiv">
           
          <ul>
            <li style="background-color: #1E90FF;border:1px solid #1E90FF;"><a href="#" id="perf" onClick="esconderPerfilMensagem(this);" tabindex="1">Principal</a></li>
            <li style="background-color: #0000CD; border:1px solid #0000CD;"><a href="#" id="msg" onClick="esconderPerfilMensagem(this);" tabindex="2">Mensagens</a>&nbsp;<label align="right" style="background-color: white;border-radius: 50%;border: 1px solid #0000CD;font-size: 1.1em;color: #0000CD;"><?php echo $linha->cdUsuario ?>2</label></li>
           </ul><br><br><br>
          </div>

          <div class="bordaPerfil">
                   
          <p>
           <img src="img/doadores.png" class="imgsPerfil" id="foto">&nbsp;
           <label class="campos2" style="padding:0;"><?php echo $linha->nmUsuario ?></label>
          </p>

          <hr class="line">
          <label class="campos2">E-mail </label>
          <p class="eco"> <?php echo $linha->emailUsuario ?></p>

          <label class="campos2">CEP </label>
          <p class="eco"><?php if (empty($linha->cdCep)){ 
                           echo "Não informado"; 
                          }else{ 
                           echo $linha->cdCep; } ?></p>

          <div id="todas">
            <div>
            <form action="editar_perfil.php" method='POST'  name='perfil' enctype="multipart/form-data" onsubmit="return btCadastrar()">

              <a href="campos" class="abrirCampos" tabindex="3">Alterar Senha</a>
              <hr class="line"><br>
              <span style="margin-left: 19px;">
                <label class="campos3">Senha Atual</label> &nbsp;
                <a href="form_recuperar_senha.php" id="link" tabindex="4">(esqueci minha senha)</a><br>
                <input type="password"  name="tsenha" class="campCadPet" id="tsenha" title="Letras ou números,mínimo 6" pattern="^[a-zA-Zà-úÀ-Ú0-9]+$" autofocus maxlength="20" tabindex="5"/><br>

                <label class="campos3">Nova Senha</label><br> 
                <input type="password" name="tsenha" class="campCadPet" id="tsenha" title="Letras ou números,mínimo 6" pattern="^[a-zA-Zà-úÀ-Ú0-9]+$" maxlength="20" tabindex="6"/><br>

                <label class="campos3">Confirmar Nova Senha</label><br>
                <input type="password" name="tconfsenha" id="tconfsenha" oninput="check(this)" pattern="^[a-zA-Zà-úÀ-Ú0-9]+$" maxlength="20"  class="campCadPet" tabindex="7" /><br>
                
                <div id="showHint"> </div> <!-- precisa de funcao para exibir as notificacoes sobre a senha parecia com a ja utilizada na verificacao do e-mail ao se cadastrar --><br>
              
              <p align="center"><input type='submit' name='cmd' class='btAlterar' value='Salvar Alterações' tabindex="30"/></p>
              </span>
              
          </form>
            </div>
            
            <div>
            <form action="editar_perfil.php" method='POST'  name='perfil' enctype="multipart/form-data" onsubmit="return btCadastrar()">

              <a href="campos" class="abrirCampos" tabindex="8">Editar Perfil</a>
              <hr class="line"><br>
              <span style=" margin-left: 19px;">
                <label class="campos3">Alterar Nome</label><br>
                <input type="text" style="color:#708090" name="tnm_usuario" class="campCadPet" pattern="^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" autofocus maxlength="150" tabindex="9" value="<?php echo $linha->nmUsuario ?>"/><br>

                <label class="campos3">Alterar CEP</label><br>
                <input type='text' style="color:#708090" name='tcd_cep' 
                 value="<?php
                        if (empty($linha->cdCep)){ 
                           echo "Não informado"; 
                          }else{ 
                           echo $linha->cdCep; } ?>" maxlength='9' title='Somente números' OnKeyPress="formata('#####-###', this)" pattern='^[0-9]{5}-[0-9]{3}$' class="campCadPet" tabindex="10"/><br>

                <label class="campos3">Alterar E-mail</label><br>
                <input type="email" style="color:#708090" name="tnm_email" id="text2" class="campCadPet" maxlength="70" tabindex="11" onblur="getEmail(this.value)" value="<?php echo $linha->emailUsuario ?>"/><br>
                <label class="campos3">Alterar Foto</label><br>
                <input type="file" style="color:#708090" value="fileToUpload" style="font-size:1.1em" name="fileToUpload" tabindex="12" id="imagemSub" size="35" accept="image/gif, image/jpeg, image/jpg, image/png" onchange="return is_img(this.id);"/><br><br>

              <p align="center"><input type='submit' name='cmd' class='btAlterar' value='Salvar Alterações' tabindex="30"/></p>
             </form> 

              </span>

            </div>

             <div>
              <a href="campos" class="abrirCampos" tabindex="13">Cadastrar Novo Pet</a><br>
               <hr class="line"><br>
               <span style=" margin-left: 19px;">
                <form id="formc" action="grava_cadastro.php" name="cadastro" method="POST" enctype="multipart/form-data" onsubmit="return btCadastrar()">               
                           
                            <label class="campos">Nome</label><br>
                            <input type="text" name="tnmpet" id="tnmpet" title="" pattern="^[a-zA-Zà-úÀ-Ú0-9 -]+$" autofocus="autofocus" class="campCadPet" maxlength="125"  tabindex="14"/><br><br>
                        
                            <label class="campos">Tipo *</label>&nbsp;&nbsp;&nbsp;                           
                            <input type="radio" class="cor" name="tipo" tabindex="15" value="cao"/> Cão &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" class="cor" name="tipo" tabindex="16" value="gato"/> Gato <br><br>                   
                        
                           <label class="campos">Sexo *</label>&nbsp;&nbsp;
                           <input type="radio" class="cor" name="sexo" tabindex="17" value="f"/> Fêmea &nbsp;
                           <input type="radio" class="cor" name="sexo" tabindex="18" value="m"/> Macho  <br><br>
                       
                           <label class="campos">Porte *</label><br>
                           <select name="selporte" id="selporte" class="campCadPet" tabindex="19">
                                    <option selected value=""></option>
                                    <option value="Micro">Micro</option>
                                    <option value="Pequeno">Pequeno</option>
                                    <option value="Medio">Médio</option>
                                    <option value="Grande">Grande</option>
                                    <option value="Gigante">Gigante</option>
                                    <option value="naosei">Não Sei</option>
                            </select><br><br>
                                                
                           <label class="campos">Faixa Etária *</label><br>
                           <select name="dtnasc" id="dtnasc" class="campCadPet" tabindex="20">
                                   <option selected value=""></option>
                                   <option value="Filhote">Filhote</option>
                                   <option value="Adulto">Adulto</option>
                                   <option value="Senior/Idoso">Sênior / Idoso</option>
                                   <option value="naosei">Não Sei</option>
                                </select><br><br>
                                                
                           <label class="campos">Características</label><br>
                           <textarea rows="3"  name="asobre" cols="40" maxlength="1000" pattern="^[a-zA-Zà-úÀ-Ú0-9 -,./:;?!@()]+$" resize="none" class="campCadPet" tabindex="21"></textarea><br>
                           <label class="info">Outras informações que achar necessário</label><br><br>

                           <label class="campos">Imagens de até 2MB</label>
                             <div id="imgs">                               
                                <a href="#">
                                <img src="img/padrao.jpg" class="imgsPet" id="foto" tabindex="22" >
                                <img src="img/padrao.jpg" class="imgsPet" id="foto2" tabindex="23">
                                <img src="img/padrao.jpg" class="imgsPet" id="foto3" tabindex="24">
                                <img src="img/padrao.jpg" class="imgsPet" id="foto4" tabindex="25">
                                <img src="img/padrao.jpg" class="imgsPet" id="foto5" tabindex="26">                                   
                                </a>
                              </div>
                              <div>
                                <input type="file" value="fileToUpload" style="font-size:1.1em" name="fileToUpload"  id="imagemSub" size="35" accept="image/gif, image/jpeg, image/jpg, image/png" onchange="return is_img(this.id);"/>
                              </div><br>
                              <div id="hint"></div>

                               <p align="center">
                                 <input type="hidden" name="cdusuario" value="<?php echo $cdUsuario; ?>">
                                 <button type="submit" name="cadastrar" id="btnfarejar" style="min-width:25%" tabindex="27">Cadastrar Pet</button>
                               </p> 
                            
                               <div id="hidden2"></div>
                            </form>
                        
              </span>
             </div>

             <div>
              <a href="campos" class="abrirCampos" tabindex="13">Excluir Perfil</a><br>
              <hr class="line">
              <span>
                <p align="center"><label class="dois" style="font-size: 1em">
                   Tem certeza que deseja excluir seu perfil!<br>
                   Todos os seu pets cadastrados também <br>
                   serão excluídos!<br>
                 </label></p>
                 <p align="center">
                   <input type='submit' onClick="ocultarDiv(this);" id="sair" name='cmd' class='btAlterar' value='Cancelar' tabindex="28"/> 
                   <input type='submit' name='cmd' id='btexcluir' value='Excluir' tabindex="29"/>
                 </p><!-- 150/600-->
                 <hr class="line">  
              </span>
                
             </div>
             <p align="center"><label class="dois" style="font-size: 1em">
                   Atenção! Ao excluir seu perfil todos os pets<br>
                   cadastrados também serão excluídos!<br>
                  </label></p>
             
             <hr class="line">
             <p align="center"><img src="img/logo1.png"></p>
         
          </div>    
          </div><!-- fim div todas --> 
       
        </div>  <!-- fim divesq --> 
        
        <br><br><br><br><br>
        <!-- inicio divdir perfil -->
       <div id="perfil" class="divdir bordaPerfil abasDivs">
          <p class="paragrafo" align="center" style="font-size: 1.7em;">Meus pets cadastrados</p>
           <div class="trocaPet" >
            <ul>
             <li class="liInfoPet">Dta cadastro</li>
             <li class="liInfoPet"><a href="#" id="dds" onClick="esconderDivsPet(this);" tabindex="31"><?php echo $linha->nmPet; ?></a></li>
             <li class="liInfoPet"><a href="#" id="ed" onClick="esconderDivsPet(this);" tabindex="32">Editar pet</a></li>
             <li class="liInfoPet"><a href="#" id="exl" onClick="esconderDivsPet(this);" tabindex="33">Excluir pet</a></li>
            </ul><br>
           </div><!-- fim div trocaDiv --> <br>

         <div id="fotoPet" style="float: left">
          <br> <div style="width: 100%"><img src='imagem/<?php echo $linha->imgPet1; ?>' id='img' class='imgsPetEd2' tabindex='34'/></div><br>
                <img src='imagem/<?php echo $linha->imgPet1; ?>' id='img' class='imgsPetEd'  tabindex='35'/>
                <img src='imagem/<?php echo $linha->imgPet1; ?>' id='img' class='imgsPetEd'  tabindex='36'/>
                <img src='imagem/<?php echo $linha->imgPet1; ?>' id='img' class='imgsPetEd'  tabindex='37'/>
                <img src='imagem/<?php echo $linha->imgPet1; ?>' id='img' class='imgsPetEd'  tabindex='38'/><br> 
         </div>
          <div id="dados" class="abasPets" style="display: block">
           <br>
            <table style='min-width: 100%;font-size: 1.3em;'> <!-- 650/650 -->
                    
                    <tr>
                      <td class='tabPret'><b>Nome : </b>&nbsp;
                      <label class="pets"><?php echo $linha->nmPet; ?></label></td>
                    </tr>

                    <tr>
                      <td class='tabPret'><b>Sexo :</b> &nbsp;
                      <label class="pets"><?php  if($linha->icSexoPet == 'f' OR $linha->icSexoPet == 'F' OR $linha->icSexoPet == 'fêmea' OR $linha->icSexoPet == 'Fêmea' OR $linha->icSexoPet == 'Femea' OR $linha->icSexoPet == 'femea'){
                               echo "F&ecirc;mea";
                              } elseif($linha->icSexoPet =='m' OR $linha->icSexoPet == 'M' OR $linha->icSexoPet == 'macho' OR $linha->icSexoPet == 'Macho'){
                               echo "Macho";
                              }?> </label></td>
                    </tr>

                    <tr>
                      <td class='tabPret'><b>Faixa Et&aacute;ria :</b>  &nbsp;
                      <label class="pets"><?php echo $linha->nmFaixaEtariaPet;?></label></td>
                    </tr>

                    <tr>
                     <td class='tabPret'><b>Porte :</b> &nbsp;
                     <label class="pets"><?php echo $linha->nmPortePet; ?></label></td>
                    </tr>

                    <tr>
                     <td class='tabPret'><b>Adotado :</b> &nbsp;
                     <label class="pets"> </label></td>
                    </tr>
                
                    <tr>
                     <td class='tabPret'><b>Detalhes :</b> &nbsp;
                     <label class="pets" style="max-width:30%"><?php echo wordwrap($linha->descPet, 48, "\n", true); ?></label></td> 
                    </tr>
                   
                  </table>
          </div><!-- fim div dados --> 

          <div id="editar" class="abasPets">
          
           <table style='max-width: 100%;'>
            <tr>
              <td id="cor"><b>Nome: </b></td>
              <td><input type="text" name="tnm_pet" class="dadosPets" pattern="^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" maxlength="150" tabindex="39" value="<?php echo $linha->nmPet ?>"/></td></tr>
            <tr>
              <td id="cor"><b>Sexo: </b></td>
              <td><input type="text" name="tsexo" class="dadosPets" pattern="^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" maxlength="150" tabindex="40" value="<?php echo $linha->icSexoPet ?>"/></td></tr>
            <tr>
              <td id="cor"><b>Faixa Etária: </b></td>
              <td><input type="text"  name="tfaixa" class="dadosPets" pattern="^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" maxlength="150" tabindex="41" value="<?php echo $linha->nmFaixaEtariaPet ?>"/></td></tr>
            <tr>
              <td id="cor"><b>Porte: </b></td>
              <td><input type="text" name="tnm_tam" class="dadosPets" pattern="^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" maxlength="150" tabindex="42" value="<?php echo $linha->nmPortePet ?>"/></td></tr>
            <tr>
              <td id="cor"><b>Detalhes: </b></td>
              <td><textarea rows="3" style="color:#708090" name="ads" cols="43" maxlength="800" pattern="^[a-zA-Zà-úÀ-Ú0-9 -,./:;?!@()]+$" resize="none"><?php echo $linha->descPet ?></textarea></td></tr>
            <tr>
              <td id="cor"><b>Foi adotado: </b></td>
              <td>&nbsp;<input type="radio" id="cor" name="adotado" tabindex="44" value="sim"/><label id="cor"> Sim</label> &nbsp; &nbsp;
              <input type="radio" id="cor" name="adotado" tabindex="45" value="nao"/><label id="cor">Não</label>
              </td></tr>
           </table><br>
           
          </div><!-- fim div editar -->
          
          <div id="excluir" class="abasPets">
           <p class="paragrafo" align="center" style="font-size:1.5em;"><b>Motivo da exclusão</b></p>

           <input type="radio" id="cor" name="exclusao" tabindex="46" value="adotado"/><label class="cor"> Foi Adotado</label><br>
           <input type="radio" id="cor" name="exclusao" tabindex="47" value="desisti"/><label class="cor"> Desisti de Doar </label><br>
           <input type="radio" id="cor" name="exclusao" tabindex="48" value="outro"/><label class="cor"> Outro Motivo </label><br><br>
           <p align="center">
            <input type='submit' name='cmd' id='btexcluir' value='Excluir' tabindex="49"/><br>
            <label id="cor" style="color: blue">Isto excluirá apenas o pet cadastrado, seu perfil se manterá ativo!</label>
            </p>

          </div><!-- fim div excluir -->

     <!-- div com os botoes de edicao de dados --> 
         <div id="editarBts" style="display: none;clear:both">
          <label class="campos3">Trocar Fotos</label>
          <input type='file' value="fileToUpload" style="font-size: 1.1em" name="fileToUpload" id="imagemSub" size="35" accept="image/gif, image/jpeg, image/jpg, image/png" onchange="return is_img(this.id);"/> <br>
          <p align='center'><input type='submit' name='cmd' class='btAlterar' value='Salvar Alterações' tabindex='50'/></p>
        </div><!-- fim editarBts --> 

       </div><!-- fim divdir perfil -->
 <br>

       <!-- inicio divdir mensagem -->
       <div id="mensagem" class="divdir bordaPerfil abasDivs" style="display:none;"><br>

          <a href="#" onclick="escondeExibeDiv();">
           <div id="msgRecebida"> <!-- div: msg recebida -->
            <div  style="float: left">
               <img src="img/doadores.png" class="imgsMsgs" id="foto">
            </div>

            <label class="campos3 usuarioRemt"><?php echo $linha->nmUsuario ?></label><br><br>

            <div class="infoMsgRec"> 
               <label class="campos2 areaPet"><?php echo $linha->descPet ?></label>
            </div>
            <hr class="lineMsg">  
           </div><!-- fim div msg recebida -->
          </a> 
                     
            <br> 
           <div id="dialogoMsg" style="display:none">

            <div id="remetente" style="float:left">
              <label class="campos3" align="left"> <?php echo $linha->nmUsuario ?></label><br><br>
              <label class="campos2 areaPet"><?php echo $linha->descPet ?></label><br><br>
            </div>
              
            <div id="destinatario" style="float:right"><br>
              <label class="campos3" align="right"><?php echo $linha->nmUsuario ?></label> <br><br>
               <label class="campos2 areaPet" style="background-color:  #E0FFFF"><?php echo $linha->descPet ?></label><br><br>
            </div><br>
            <hr class="lineMsg"> 
            <p align="center">
               <textarea rows="2" autofocus style="background-color: #E0FFFF;min-width: 95%;" class="areaPet" name="ads" cols="42" maxlength="800" placeholder="Digite aqui..." pattern="^[a-zA-Zà-úÀ-Ú0-9 -,./:;?!@()]+$" resize="none"  tabindex="51"></textarea>
             </p>
             <p align="right">
                <input type="submit" value="Enviar" id="btfarejar" name="mensagem" tabindex="52" class="compartilhar">
             </p>
             <hr class="lineMsg"> 
           </div><!-- fim div dialogo Msg --> 
             
        <p class="avisoUsuario">
          <b>ATENÇÃO:</b> O PetsLover não fornece dados de seus usuários. A troca de informações neste espaço, como endereço, telefone , etc., ocorrerá por conta e risco do usuário. Aconselhamos não fornecer informações pessoais nos primeiros contatos. Utilize a segurança desta área de mensagens até a concretização da doação / adoção.
        </p>   
       </div> <!-- fim divdir mensagem -->   
      </div>
      <?php } 
        
               }
                 mysqli_close($con);
      ?>        
    </div>

  </section>

<?php include("includes/footer.php"); ?>

<script src="includes/showImage.js"></script>
</div>
</body>
</html>
