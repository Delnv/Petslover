<?php include "./includes/tags_inicio.php"; ?>

<div class="container" style="">
<?php include './includes/header.php';?>  
<section>
  <script src="includes/validacao_js.js"></script>
    <div class="geral clearfix" style="" >
        
        
 <?php
    require_once("conexao.php");

    $con = abreConexao();
   
    $cd = $_GET['n'];

    $sql= "SELECT p.cdPet, p.nmPet,p.nmFaixaEtariaPet,p.nmTipoPet,p.descPet,p.icSexoPet,p.nmPortePet,i.imgPet1,i.cdImagem,u.cdUsuario,u.nmUsuario FROM PET AS p INNER JOIN IMAGEM_PET AS i INNER JOIN  USUARIO AS u ON p.cdPet = i.cdPet and p.cdUsuario = u.cdUsuario WHERE p.cdPet='" . $cd . "' ";
        
    $res = mysqli_query($con, $sql);
       
     while ($linha = mysqli_fetch_object($res)) {
  ?> 
            <div class="conteudo" style='width: 81.541883%'> <!-- 1312/1349-->

                 <p class="paragrafos" style="text-transform: capitalize" align="center">
                  <?php if (empty($linha->nmPet)){ 
                    echo "Pet Escolhido"; 
                  }else{ ?>
                 <b><?php echo "$linha->nmPet"; ?></b>
                  <?php } ?>
                 </p><br>

                <div class='divesq' style="margin: auto"> <!-- 530/1312-->
                   <figure class="fotos"><img src='imagem/<?php echo $linha->imgPet1; ?>' id='img' style='border:2px solid black' height='auto'/> </figure><!-- 500/530-->
                </div>

  <?php $cdpet = $linha->cdPet; ?>
                     
                <div class="divdir" style=''> <!-- 650/1312 -->
                  <br>
                  <table style='max-width: 100%;font-size: 1.3em;'> <!-- 650/650 -->
                    <tr>
                      <td class='tabPret'><b>Nome : </b>&nbsp;
                      <label class="pets"><?php echo "$linha->nmPet"; ?></label></td>
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
                      <td class='tabPret'><b>Tipo :</b>  &nbsp;
                      <label class="pets"><?php echo $linha->nmTipoPet;?></label></td>
                    </tr>

                    <tr>
                      <td class='tabPret'><b>Faixa Et&aacute;ria :</b>  &nbsp;
                      <label class="pets"><?php echo $linha->nmFaixaEtariaPet;?></label></td>
                    </tr>

                    <tr>
                      <td class='tabPret'><b>Tratador (a) :</b> &nbsp;
                      <label class="pets"><?php echo "$linha->nmUsuario"; ?></label></td>
                    </tr>
                
                    <tr>
                     <td class='tabPret'><b>Porte :</b> &nbsp;
                     <label class="pets"><?php echo $linha->nmPortePet; ?></label></td>
                    </tr>
                
                    <tr>
                     <td class='tabPret'><b>Detalhes :</b> &nbsp;
                     <label class="pets" style="max-width:30%;wordwrap: break-word"><?php echo $linha->descPet; ?></label></td> <!-- wordwrap: limita a quantidade de caracteres por linha --> 
                    </tr>
                   
                  </table>

                </div>      
              
  <?php } ?>
               
               <div style="clear:both;"><br>
               <hr class="line">
  <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'SIM') {?>

                 <div id="mensagem" align='center'><br>
                  <form action="enviar_mensagem.php" method="post" align="center" id="env_mens_prets">
                   <textarea rows="4"  name="descmsg" id="dmsg" cols="65" maxlength="800" pattern="^[a-zA-Zà-úÀ-Ú0-9 -,./:;?!@()]+$" resize="none" tabindex="1" autofocus placeholder="Escreva aqui sua mensagem ao pet acima..."></textarea><br>
                   <label class="dois" style="">
                                OBS: O Pet'sLover não divulga e-mail e dados de seus clientes.<br>
                                No entando, o que for digitado no campo de mensagens será enviado <br>
                                ao doador(a) sem interferência do Pet'sLover. Envio de dado pessoal: <br>
                                e-mail, telefone e endereço, neste espaço, ocorre sob responsabilidade<br>
                                do usuário. Evite a troca deste tipo de informação no primeiro contato.
                                </label><br>
                   <br><input type="hidden" name="cdpet" value="<?php echo $cdPet; ?>">
                       <input type="submit" value="Enviar" id="btfarejar" name="mensagem" tabindex="2" class="far"> 
                  </form>
                  <br>
                   <div id="escond"></div>
                 </div>

  <?php
                    } else {
                        $_SESSION['logado'] = 'NAO';
                    ?>
                  <br>
                    
               <p align="center" id="div1" > 
                  <label class="aviso">Para enviar mensagem ao responsável pelo Pet acima<br>
                     faça o login, caso não seja cadastrado, realize seu cadastro!</label><br><br>
                  <input type="submit" class="far" style="width:20%;" value='Login' onClick="ocultarDiv(this);" tabindex="1" id="div1"/>&nbsp;&nbsp;
                  <a href="cadastro_adotante.php"> <input type="submit" class="far" style="width:20%" onClick="ocultarDiv(this);" value='Cadastro' tabindex="2" id="div1"/></a>                     
                </p>
                  
                <div id="continuar" align='center' style="display:none;">
                 <form id="login" name="login" method="POST" action="verifica_login.php">
                  <div align="center" style=""> 
                   <p><input type="email" id="email" name="email" maxlength="60" value="" tabindex="1" autofocus placeholder="E-mail" required> 
                       <input type="password" id="pass" name="senha"  maxlength="20" tabindex="2" placeholder="Senha" required>&nbsp;
                       <input type="submit"  name="btlogin" type="button" id="btlogin" tabindex="3"value="Entrar"/>
                   </p>
                    
                   <p align="center" style="width:33%;">
                     <a href="form_recuperar_senha.php" id="link" tabindex="4">  Esqueci a Senha </a>
                     <a href="cadastro.php" name="scad" id="link" tabindex="5"> &nbsp;&nbsp;&nbsp; N&atilde;o Possuo Cadastro</a> &nbsp;&nbsp;<input type="submit" onClick="ocultarDiv(this);" name="sair" value="Voltar" tabindex="6" class="btSair" id="sair">
                   </p>

                  <p align="center"></p>
                  </div>  
                 <div id="hidden" align="center">&nbsp;</div><br>
                  
                </form>
      </div> 
      
  <?php
      }

       mysqli_close($con);
  ?>
        </div>  
         </div>
           <br>
           <p align="center" ><a href="javascript:history.go(-1)" class="pet">Voltar &agrave; Lista de Pets Escolhidos </a></p>
  </div>
</section>

<?php include("includes/footer.php"); ?>
</div>
</body>
</html>

