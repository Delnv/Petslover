﻿<?php
include("includes/header.php");
include("includes/tags_inicio.php");
?>

  <section>
    <div class="geral clearfix" style="background-color:white;opacity:0.95;filter:alpha(opacity=60);border-radius:0px;">
        <br><br> 
      
<!-- PARA HOSPEDAGEM COMPARTILHADA, DESCOMENTE A LINHA ABAIXO: -->
<form method="post" align="center" action="enviar_email.php"/>

<!-- Abaixo, informe uma conta de email do dominio da hospedagem (email@dominio.com.br) -->
<input type="hidden" name="email"value="contato@petslover.com.br"/>
 
<!-- Informe a conta de emails que recebera os dados do formulario nele preenchido. --> 
<!-- Dica: Para adicionar outro recipiente do formulario, separe as contas de email por virgula Ex.: value="email@dominio.com.br, podeseroutroemail@outrodominio.com.br"  -->
<input type="hidden" name="recipient" value="contato@petslover.com.br"/>
 
<!-- Abaixo, informe o qual o assunto padrao da mensagem -->
<input type="hidden" name="subject" value="Fale conosco"/>
 
<!-- NO DIA 30/05 DESCOMENTE A LINHA ABAIXO -->
 <input type="hidden" name="redirect" value="http://www.petslover.com.br/email_ok.php"/>


 
  
     <div class="conteudo" style="">
       <div class="divesq" style="">
              <p class="paragrafos" style=""align="center">D&uacute;vidas, Reclama&#231;&otilde;es, Sugest&otilde;es ou Outros Assuntos?<br> Fale Conosco!</p> <br>
              <figure class="fotos" style=""><img src="img/padrao.jpg" style='border:2px solid black;height:auto' id="foto"></figure> 
       </div>
       <div class="divdir"  style="">
        <div class="" align="justify" style="">
       <br><br>
              <label for="nome" class="campos">Nome</label><br>
              <input type="text" name="tnome" id="tnome"  size="39" autofocus="autofocus" pattern="^[      A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" maxlength="150" required tabindex="1"/> <br><br>
              
              <label for="email" class="campos">E-mail</label><br> 
              <input type="email" name="temail" id="email"  size="39" required maxlength="70"tabindex="2"/><br><br>
              
              <label for="assunto" class="campos">Assunto</label><br>
              <select name="assunto" id="select2" tabindex="3" >
                                    <option selected value=""></option>
                                    <option>D&uacute;vidas</option>
                                    <option>Sugest&otilde;es</option>
                                    <option>Reclama&#231;&otilde;es</option>
                                    <option>Den&uacute;ncia</option>
                                    <option>Outro Assunto</option>
               </select><br><br>
               
               <label for="mensagem" class="campos">Mensagem</label><br>   
               <textarea rows="8"  name="mensagem" cols="35" maxlength="800" pattern="^[a-zA-Zà-úÀ-Ú0-9   -,./:;?!@()]+$" required tabindex="4"></textarea><br>
                   
              <p align="center" style="font-size:1.0em"> Todos os Campos Obrigat&oacute;rios!</p>
              
               <p class="pbotao" style="max-width:100%;"><button type="submit" name="enviar" id="bfarejar" style="width:390px;" tabindex="5" />Enviar</button></p>
       </div>   
      </div>
     
     </div>
  </form>
 </div>
</section>
 
 <?php include("includes/footer.php"); ?>


