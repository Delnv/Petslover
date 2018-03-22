@extends('template.template')
@section('content')
 <div class="container" style="">
  <section>
            <div class="geral clearfix" style="">

                <p class="paragrafos" align="center" style="color: #00BFFF "> Cadastre aqui o pet que você está doando </p>
                <p class="paragrafos" align="center" style="font-size: 1.4em"> Se você quer adotar <a href="/cadastrar-adotante" class="cliques">clique aqui</a> e se cadastre</p>
                <div style="clear:both;width:97.25722758%;margin:auto;"></div><br>  
                
                <div class="conteudo" style=""> <!-- 45 / 1312-->
                <!--  <php  //para receber o cod  e dados doador ao cadastar novo pet
    require_once("conexao.php");

    $con = abreConexao();
   
    $cd = $_GET['n'];
   ?>-->
                    <div class="divesq" style=""> <!-- max-width: 45.73170732% 650 / 1312-->
                       <form id="formc" action="/cadastrar/usuario" name="cadastro" method="POST" enctype="multipart/form-data" onsubmit="return btCadastrar()"> 
                       {{csrf_field()}}              
                            <label class="campos">Dados do Pet</label><br><br><br>

                            <label class="campos">Nome do Pet</label><br>
                            <input type="text" name="tnmpet" id="tnmpet" title="" pattern="^[a-zA-Zà-úÀ-Ú0-9 -]+$" autofocus="autofocus" class="inpDados" maxlength="125"  tabindex="1"/><br><br>
                        
                            <label class="campos">Tipo *</label>&nbsp;&nbsp;&nbsp;                           
                            <input type="radio" class="cor" name="tipo" tabindex="2" value="cao"/> Cão &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" class="cor" name="tipo" tabindex="3" value="gato"/> Gato <br><br>                   
                        
                           <label class="campos">Sexo *</label>&nbsp;&nbsp;
                           <input type="radio" class="cor" name="sexo" tabindex="4" value="f"/> Fêmea &nbsp;
                           <input type="radio" class="cor" name="sexo" tabindex="5" value="m"/> Macho  <br><br>
                       
                           <label class="campos">Porte *</label><br>
                           <select name="selporte" id="selporte" tabindex="6">
                                    <option selected value=""></option>
                                    <option value="Micro">Micro</option>
                                    <option value="Pequeno">Pequeno</option>
                                    <option value="Medio">Médio</option>
                                    <option value="Grande">Grande</option>
                                    <option value="Gigante">Gigante</option>
                                    <option value="naosei">Não Sei</option>
                            </select><br><br>
                                                
                           <label class="campos">Faixa Etária *</label><br>
                           <select name="dtnasc" id="dtnasc" tabindex="7">
                                   <option selected value=""></option>
                                   <option value="Filhote">Filhote</option>
                                   <option value="Adulto">Adulto</option>
                                   <option value="Senior/Idoso">Sênior / Idoso</option>
                                   <option value="naosei">Não Sei</option>
                                </select><br><br>
                                                
                           <label class="campos">Características</label><br>
                           <textarea rows="4"  name="asobre" cols="42" maxlength="1000" pattern="^[a-zA-Zà-úÀ-Ú0-9 -,./:;?!@()]+$" resize="none" tabindex="8"></textarea><br>
                           <label class="info">Outras informações que achar necessário</label><br><br>

                           <label class="campos">Imagens de até 2MB</label>
                             <div id="imgs">                               
                                <a href="#">
                                <img src="{{ asset('image/padrao.jpg')}}" style='border:1px solid black' height="95px" width="74px" id="foto" >
                                <img src="{{ asset('image/padrao.jpg')}}"  style='border:1px solid black' height="95px" width="74px" id="foto2">
                                <img src="{{ asset('image/padrao.jpg')}}" style='border:1px solid black' height="95px" width="74px" id="foto3">
                                <img src="{{ asset('image/padrao.jpg')}}" style='border:1px solid black' height="95px" width="74px" id="foto4">
                                <img src="{{ asset('image/padrao.jpg')}}" style='border:1px solid black' height="95px" width="74px" id="foto5">                                   
                                </a>
                              </div>
                              <div>
                                <input type="file" value="petFile" style="font-size:1.2em" name="petFile[]" tabindex="9" id="imagemSub" size="38" accept="image/gif, image/jpeg, image/jpg, image/png" onchange="return is_img(this.id);"/>
                                <input type="file" value="petFile" style="font-size:1.2em" name="petFile[]" tabindex="9" id="imagemSub" size="38" accept="image/gif, image/jpeg, image/jpg, image/png" onchange="return is_img(this.id);"/>
                              </div><br><br>
                              <div id="hint"></div>
                    </div>

                    <!--<div class="ad" style=""><img src="img/ad/ad1.png"></div>-->   
                    
                    <div class="divdir" style=""> <!-- /* 45 / 1312 */-->
                    
                           <label class="campos">Dados do Doador</label><br><br><br>

                           <label class="campos">Nome do Doador*</label><br>
                           <input type="text" name="tnmprot"  class="inpDados" pattern="^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" maxlength="150" tabindex="10"value="" /><br><br>
                            
                           <label class="campos">Cep  </label></br>
                           <input name="tcep" type="text" id="tcep"  class="inpDados" tabindex="11" maxlength="9" title="Somente números" pattern="^[0-9]{5}-[0-9]{3}$" OnKeyPress="formata('#####-###', this)" size="30" maxlength="10" />
                           <br>
                          <label class="info">Este dado não aparece no anúncio </label> &nbsp;<a href="http://www.buscacep.correios.com.br/sistemas/buscacep/"target="_blank"  tabindex="11" style="color:blue;font-size:1.0em;text-decoration:none"> Não sei meu CEP</a><br><br><br>
                      
                          <label class="campos">E-mail *</label><br>
                          <input type="email" name="temail" id="text2" class="inpDados" maxlength="70" tabindex="12" onblur="getEmail(this.value)"/><br>
                          <label class="info">Este dado não aparece no anúncio</label><br><br>
                        
                          <div id="showHint"></div><br>
                       
                          <label class="campos">Minha Senha *</label><br>
                          <input type="password" name="tsenha" class="inpDados" id="tsenha" title="Letras ou números,mínimo 6"pattern="^[a-zA-Zà-úÀ-Ú0-9]+$" maxlength="20"  tabindex="13"/><br><br><br>
                        
                          <label class="campos">Confirmar Senha *</label><br>
                          <input type="password" name="tconfsenha" id="tconfsenha" oninput="check(this)" pattern="^[a-zA-Zà-úÀ-Ú0-9]+$" maxlength="20"  class="inpDados" tabindex="14" /><br><br>

                         <label class="campos">Imagens de até 2MB</label>
                             <div id="fotos">
                                <a href="#">
                                <img src="{{ asset('image/user_photo/photo_padrao.png')}}" style='border:1px solid black' height="93px" width="84px" id="foto" >
                                </a>
                              </div>
                              <div>
                                <input type="file" value="userFile" style="font-size:1.2em" name="userFile[]" tabindex="15" id="imagemSub" size="38" accept="image/gif, image/jpeg, image/jpg, image/png" onchange="return is_img(this.id);"/>
                              </div><br><br>
                              <div id="hint"></div>
                    </div>       
                         
                    <div style="width:97.25722758%;clear:both;"> <!-- 1312/1349-->
                            <br>
                                <p align="center"><label class="asterisco">*</label><label style="font-size:1.2em"> Campos Obrigatórios!</label></p> <br>                                                    
                                <p align="center" style="font-size:1.3em"><input type="checkbox" name="termos" value="s" tabindex="16">&nbsp;Li e concordo com os <a href="acordo.php" target="_blank" style="color:blue;font-weight:bold;text-decoration:none" tabindex="16">Termos de Compromisso</a> Pet's Lover</p><br>
                            
                                <div id="hid3"></div>
                             
                               <p align="center"><button type="submit" name="cadastrar" id="btnfarejar" style="min-width:28.96341463%" tabindex="17">Cadastrar</button></p><br> <!-- 400/1312-->
                            
                               <div id="hidden2"></div>
                            </form><br>
                            <div align="center"> <img src="img/ad/ad5.png"> </div>
                    </div>    
               </div>
                
            </div>

  </section>
</div>
@endsection