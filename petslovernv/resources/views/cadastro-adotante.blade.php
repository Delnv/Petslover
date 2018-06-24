@extends('template.template')
@section('content')
<div class="container">
  <section>
            <div class="geral clearfix"><br><br>

                <p class="paragrafos2" align="center"> Cadastro de Adotante </p>
                
                <div class="conteudo">
                   
                    <div class="divesq" style="width: 42.25321%">

                       <form id="formc" action="/cadastrar/usuario" name="cadastro" method="POST" enctype="multipart/form-data" onsubmit="return btCadastrar()"> 
                       {{csrf_field()}}              

                        <label class="campos">Nome *</label><br>
                           <input type="text" name="tnmprot" size="42" pattern="^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" maxlength="150" tabindex="10"/><br><br>
                            
                           <label class="campos">Cep  </label></br>
                           <input name="tcep" type="text" id="tcep" size="42" tabindex="11" maxlength="9" title="Somente números" pattern="^[0-9]{5}-[0-9]{3}$" OnKeyPress="formata('#####-###', this)" size="30" /><br>

                          <label class="info" style="padding:0">Esta informação será usada para encontrar um pet próximo de você </label><br><br>
                          <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/"target="_blank"  tabindex="11" class="campCep"> Não sei meu CEP</a><br><br> 

                          <label class="campos">Imagens de até 2MB</label>
                             <div id="fotos">
                                <a href="#">
                                <img src="{{asset('image/user_photo/photo_padrao.png')}}" class="imgsPetCad" id="foto" >
                                </a>
                                </div>
                                <div>
                                  <input type="file" value="fileToUpload" class="cor2" name="fileToUpload" tabindex="15" id="imagemSub" size="38" accept="image/gif, image/jpeg, image/jpg, image/png" onchange="return is_img(this.id);"/>
                                </div><br>
                                <div id="hint"></div>   
                    </div>   
                    <div class="divdir" style="width: 42.25321%">
                        
                          <label class="campos">E-mail *</label><br>
                          <input type="email" name="temail" id="text2" size="42" maxlength="60" tabindex="12" onblur="getEmail(this.value)"/><br>
                          <label class="info">Este dado não aparece no anúncio</label><br><br>
                        
                          <div id="showHint"></div>
                       
                          <label class="campos">Minha Senha *</label><br>
                          <input type="password" name="tsenha" size="42" id="tsenha" title="Letras ou números,mínimo 6"pattern="^[a-zA-Zà-úÀ-Ú0-9]+$" maxlength="20"  tabindex="13"/><br><br>
                        
                          <label class="campos">Confirmar Senha *</label><br>
                          <input type="password" name="tconfsenha" id="tconfsenha" oninput="check(this)" pattern="^[a-zA-Zà-úÀ-Ú0-9]+$" maxlength="20"  size="42" tabindex="14" /><br><br>
                                                                                                                
                    </div>
               <div class="divHorizontal">
                            
                                <p align="center"><label class="asterisco">*</label><label id="cor"> Campos Obrigatórios!</label></p> <br>                                                    
                                <p align="center" class="cor"><input type="checkbox" name="termos" value="s" tabindex="16">&nbsp;Li e concordo com os <a href="acordo.php" target="_blank" class="campTermos" tabindex="16">Termos de Compromisso</a> Pet's Lover</p>
                            
                                <div id="hid3"></div>
                             
                               <p align="center"><button type="submit" name="cadastrar" id="btnfarejar" style="min-width:28.96341463%" tabindex="17">Cadastrar</button></p><br> 
                            
                               <div id="hidden2"></div>
                            </form>
               </div>
               <div align="center"><img src="{{asset('image/ad/ad6.png')}}"> </div>   
               </div>
                
            </div>

  </section>
         
 </div>
    <!--<script src="includes/showImage.js"></script>-->
@endsection