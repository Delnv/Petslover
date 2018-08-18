@extends('template.template')
@section('content')
<section>

    <div class="geral clearfix"><br>          
 <!--      
     @while ($linha = mysqli_fetch_object($res)) {
  --> 
            <div class="conteudo" style='width: 81.541883%'>

                 <p class="paragrafos pCap" align="center">
                  @if (empty($pet->nmPet)){ 
                     Pet Escolhido 
                  @else
                 <b>{{ $pet->nmPet}}</b>
                  @endif
                 </p><br>

               <div class='divesq' style="overflow: hidden;">
                  <div class="slide-wrapper">
                   <div class="slide"><figure class="fotos1"><img src='{{ asset($img->nmImgPet) }}' id='img' class='petSize'/></figure></div>
                  </div>
               </div>

  {{$pet->cdPet}}
                     
                <div class="divdir">
                                  <br>
                  <table class="tableGal">
                    <tr>
                      <td class='tabPret'><b>Nome : </b>&nbsp;
                      <label class="pets">{{ $pet->nmPet }}</label></td>
                    </tr>

                    <tr>
                      <td class='tabPret'><b>Sexo :</b> &nbsp;
                      <label class="pets">@if($pet->icSexoPet == 'f' OR $pet->icSexoPet== 'F' OR $pet->icSexoPet== 'fêmea' OR $pet->icSexoPet == 'Fêmea' OR $pet->icSexoPet == 'Femea' OR $pet->icSexoPet == 'femea')
                                Fêmea;
                           @elseif($pet->icSexoPet =='m' OR $pet->icSexoPet == 'M' OR $pet->icSexoPet == 'macho' OR $pet->icSexoPet == 'Macho')
                                Macho;
                           @endif  </label></td>
                    </tr>

                     <tr>
                      <td class='tabPret'><b>Tipo :</b>  &nbsp;
                      <label class="pets">{{$pet->nmTipoPet}}</label></td>
                    </tr>

                    <tr>
                      <td class='tabPret'><b>Faixa Et&aacute;ria :</b>  &nbsp;
                      <label class="pets">{{$pet->nmFaixaEtariaPet}}</label></td>
                    </tr>

                    <tr>
                      <td class='tabPret'><b>Tratador (a) :</b> &nbsp;
                      <label class="pets">{{$pet->nmUsuario}}</label></td>
                    </tr>
                
                    <tr>
                     <td class='tabPret'><b>Porte :</b> &nbsp;
                     <label class="pets">{{$pet->nmPortePet}}</label></td>
                    </tr>
                
                    <tr>
                     <td class='tabPret'><b>Detalhes :</b> &nbsp;
                     <label class="pets lbDet">{{$pet->descPet}}</label></td> 
                    </tr>
                   
                  </table>

                </div>      
              
  @endwhile
               
               <div style="clear:both;"><br>
               <hr class="line">
        @if(Session::has('usuario'))

                 <div id="mensagem1" align='center'><br>
                  <form action="/enviar-mensagem" method="post" align="center" id="env_mens_prets">
                   <textarea rows="4"  name="descmsg" id="dmsg" cols="65" maxlength="800" pattern="^[a-zA-Zà-úÀ-Ú0-9 -,./:;?!@()]+$" resize="none" tabindex="1" autofocus placeholder="Escreva aqui sua mensagem ao pet acima..."></textarea><br>
                   <label class="dois">
                                OBS: O Pet'sLover não divulga e-mail e dados de seus clientes.<br>
                                No entando, o que for digitado no campo de mensagens será enviado <br>
                                ao doador(a) sem interferência do Pet'sLover. Envio de dado pessoal: <br>
                                e-mail, telefone e endereço, neste espaço, ocorre sob responsabilidade<br>
                                do usuário. Evite a troca deste tipo de informação no primeiro contato.
                                </label><br>
                   <br><input type="hidden" name="cdpet" value="{{$pet->cdPet}}">
                       <input type="submit" value="Enviar" id="btfarejar" name="mensagem" tabindex="2" class="far"> 
                  </form>
                  <br>
                   <div id="escond"></div>
                 </div>

      @else
                        
                  <br>
                    
               <p align="center" id="div1" > 
                  <label class="aviso">Para enviar mensagem ao responsável pelo Pet acima<br>
                     faça o login, caso não seja cadastrado, realize seu cadastro!</label><br><br>
                  <input type="submit" class="far" style="width:20%;" value='Login' onClick="ocultarDiv(this);" tabindex="1" id="div1"/>&nbsp;&nbsp;
                  <a href="/cadastro-adotante"> <input type="submit" class="far" style="width:20%" onClick="ocultarDiv(this);" value='Cadastro' tabindex="2" id="div1"/></a>                     
                </p>
                  
                <div id="continuar" align='center' style="display:none;">
                 <form id="login" name="login" method="POST" action="/logar">
                  {{csrf_field()}}
                  <div align="center" class="logPet"> 
                   <p>
                     <input type="email" id="email" name="email" maxlength="60" value="" tabindex="1" autofocus placeholder="E-mail" required> 
                       <input type="password" id="pass" name="senha"  maxlength="20" tabindex="2" placeholder="Senha" required>&nbsp;
                       <input type="submit"  name="btlogin" type="button" id="btlogin" tabindex="3" value="Entrar"/>
                   </p>
                    
                   <p align="center" class="llogin2">
                     <a href="/form-recuperar-senha" id="link" tabindex="4">  Esqueci a Senha </a>
                     <a href="/cadastrar-adotante" name="scad" id="link" tabindex="5"> &nbsp;&nbsp;&nbsp; N&atilde;o Possuo Cadastro</a> &nbsp;&nbsp;<input type="submit" onClick="ocultarDiv(this);" name="sair" value="Voltar" tabindex="6" class="btSair" id="sair">
                   </p>

                  <p align="center"></p>
                  </div>  
                 <div id="hidden" align="center">&nbsp;</div><br>
                  
                </form>
      </div> 
      
    @endif 

        </div>  
         </div>
           <br>
           <p align="center" ><a href="javascript:history.go(-1)" class="pet">Voltar &agrave; Lista de Pets Escolhidos </a></p>
  </div>
</section>
</div>
@endsection

