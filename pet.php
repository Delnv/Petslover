<?php
include("includes/tags_inicio.php");
include("includes/header.php");
?>
  
<section>
  <script src="includes/validacao_js.js"></script>
    <div class="geral clearfix" style="background-color:white;opacity:0.96;filter:alpha(opacity=60);border-radius:0px" >
        
        <p class="paragrafos" align="center">Pet Escolhido</p><br>

 <?php
    require_once("conexao.php");

    $con = abreConexao();
   
    $cd = $_GET['n'];
        

    $sql= "SELECT p.cdPet, p.nmPet,p.nmRacaPet,p.nmFaixaEtariaPet,p.nmTipoPet,p.descPet,p.icSexoPet,p.nmPortePet,i.imgPet1,i.cdImagem FROM PET AS p INNER JOIN IMAGEM_PET AS i ON p.cdPet = i.cdPet WHERE p.cdPet='" . $cd . "' ";

       
    $res = mysqli_query($con, $sql);
       
     while ($linha = mysqli_fetch_object($res)) {
  ?> 
            <div class="conteudo" style=''> <!-- 1312/1349-->
                
                <div class='divesq' style=""> <!-- 530/1312-->
                   <figure class="fotos"><img src='imagem/<?php echo $linha->imgPet1; ?>' id='img' style='border:2px solid black' height='auto'/> </figure><!-- 500/530-->
                </div>
  <?php $cdpet = $linha->cdPet; ?>
                      
                <div class="divdir" style=''> <!-- 650/1312 -->
                  <br>
                  <table style='width:100%;font-size:1.3em;'> <!-- 650/650 -->
                    <tr>
                      <td class='tabPret'><label class="pets">Nome &nbsp;</label></td><td class='tabPret'><?php echo "$linha->nmPet"; ?></td>
                    </tr>
                    <tr>
                      <td class='tabPret'><label class="pets">Ra&ccedil;a &nbsp;</label></td><td class='tabPret'><?php echo "$linha->nmRacaPet"; ?></td>
                    </tr>
                    <tr>
                      <td class='tabPret'><label class="pets">Faixa Et&aacute;ria  &nbsp;</label></td><td class='tabPret'><?php echo $linha->nmFaixaEtariaPet;?></td>
                    </tr>
                    <tr>
                      <td class='tabPret'><label class="pets">Sexo &nbsp;</label></td>
                      <td class='tabPret'><?php  if($linha->icSexoPet == 'f' OR $linha->icSexoPet == 'F' OR $linha->icSexoPet == 'fêmea' OR $linha->icSexoPet == 'Fêmea' OR $linha->icSexoPet == 'Femea' OR $linha->icSexoPet == 'femea'){
                               echo "F&ecirc;mea";
                              } elseif($linha->icSexoPet =='m' OR $linha->icSexoPet == 'M' OR $linha->icSexoPet == 'macho' OR $linha->icSexoPet == 'Macho'){
                               echo "Macho";
                              }?> </td>
                    </tr>
                    <tr>
                     <td class='tabPret'><label class="pets">Tipo </label></td>
                     <td class='tabPret'> <?php echo $linha->nmTipoPet; ?></td>
                    </tr>
                    <tr>
                     <td class='tabPret'><label class="pets">Porte &nbsp;</label></td><td class='tabPret'><?php echo $linha->nmPortePet; ?></td>
                    </tr>
                
                       <?php if (!empty($linha->descPet)){ ?>
                        <tr><td>&nbsp;</td></tr>
                    <tr>
                     <td colspan='2' align='center' class='tabPret' style='background-color:aliceblue'><label class="pets"><b>Mais sobre mim </label></b></td>
                    </tr>
                    <tr>
                     <td colspan='2' class='tabPret' style="line-height:180%"><?php echo $linha->descPet; ?></td> 
                     <?php } ?>
                    </tr>
                  </table>
                </div>
               
              
  <?php } ?>

               <div style="clear:both;">
  <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'SIM') {?>
                 <form action="enviar_mensagem.php" method="post" align="center" id="env_mens_prets">
                   <br><input type="hidden" name="cdpet" value="<?php echo $cdPet; ?>">
                      <a href=""> <button type="button" name="mensagem" id="btfarejar" value="Olá" class="far"> Enviar Mensagem</button></a>  
                  </form>
                  <br>
                   <div id="escond"></div>

  <?php
                    } else {
                        $_SESSION['logado'] = 'NAO';
                    ?>
                  <br>
                    
               <p align="center" id="div1" > 
                  <label class="aviso">Para enviar mensagem ao responsável pelo Pet acima<br>
                     faça o login, caso não seja cadastrado, realize seu cadastro!</label><br><br>
                  <input type="submit" class="far" style="width:15%" value='Login' onClick="ocultarDiv(this);" tabindex="1" id="div1" class="btsMsgs"/>&nbsp;&nbsp;
                  <a href="cadastro.php"> <input type="submit" class="far" style="width:15%" onClick="ocultarDiv(this);" value='Cadastro' tabindex="2" id="div1" class="btsMsgs"/></a>                     
                </p>
                  
                <div id="continuar" align='center' style="display:none;">
                 <form id="login" name="login" method="POST" action="verifica_login.php">
                  <div align="center" style=""> 
                   <p ><input type="email" id="email" name="email" maxlength="60" value="" tabindex="1" autofocus placeholder="E- mail" required> 
                       <input type="password" id="pass" name="senha"  maxlength="20" tabindex="2" placeholder="Senha" required>&nbsp;
                       <input type="submit"  name="btlogin" type="button" id="btlogin" tabindex="3"value="Entrar"/>
                   </p>
                    
                   <p align="left" style="width:25%;">
                     <a href="form_recuperar_senha.php" id="link" tabindex="4">  Esqueci a Senha </a>
                     <a href="cadastro.php" name="scad" id="link" tabindex="5"> &nbsp;&nbsp;&nbsp; N&atilde;o Possuo Cadastro</a> 
                   </p>
                  </div>  
                 
                  <div id="hidden" align="center" style="">&nbsp;</div>
                </form>
      </div> 
      
  <?php
      }

       mysqli_close($con);
  ?>
        </div>  
         </div>
           <br>
           <p align="center" ><a href="javascript:history.go(-1)" class="pet">Voltar &agrave; Lista de Pets </a></p>
  </div>
</section>

<?php include("includes/footer.php"); ?>

