@extends('template.template')
@section('content')
<script>
/* NAO FOI POSSIVEL CHAMAR ESSAS FUNCOES DE OUTRO DIRETORIO*/
/* utilizada na abas do perfil do pet (divdir) pag. perfil/ mensagem */
    function esconderDivsPet(obj){     
            document.getElementById('dados').style.display="none";
            document.getElementById('editar').style.display="none";
            document.getElementById('excluir').style.display="none";
            document.getElementById('editarBts').style.display="none";
                    
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
         }
    } 
 /* utilizada nas divs das msgs recebidas*/
    function toggle(obj) { /* esconde conteudo das msgs*/
      var el = document.getElementById(obj);
       if ( el.style.display != 'none' ) {
        el.style.display = 'none';
       }else {
        el.style.display = '';
       }
    } 
     //Fazer uma função em javascript para pegar o nome do elemento que está
           //sendo clicado (das abas para alterar os dados)
           //e enviar esse nome no form para o controller sabe qual função de alteração
           //de dados chamar.
</script>
<script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>

<div class="container">
  <section>
  	<div class="geral clearfix">   
      
      <p class="pTitulo divHorizontal" align="center"><b>Perfil de {{ $usuario->nmUsuario }}</b></p><br>
  
      <div class="conteudo"> 
               
        <div class="dLeft"> 
           <img src="{{asset('image/pata_verde.png')}}" align="right" class="noteMsg" id="foto"><br>
          <div class="trocaDiv">
           <ul>
             <li class="trcLi1"><a href="#" id="perf" onClick="esconderPerfilMensagem(this);" tabindex="1">Principal</a></li>
            <li class="trcLi2"><a href="#" id="msg" onClick="esconderPerfilMensagem(this);" tabindex="2">Mensagens</a>&nbsp;<span align="right" id="" class="contMsgs">12</span></li><!-- span para exibir a cont das msgs recebidas-->
           </ul><br><br><br>
          </div>

          <div class="bordaPerfil">
          <form action="/editar-perfil" method='POST'  name='perfil' enctype="multipart/form-data" onsubmit="return btCadastrar()">
          {{csrf_field()}}
          <p>
           <img src="{{asset($usuario->imgUsuario)}}" class="imgsPerfil" id="foto">&nbsp;          
           <span class="campos2" style="padding:0;">{{$usuario->nmUsuario}}</span>
          </p>

          <hr class="line">
          <label class="campos2">E-mail </label>
          <p class="eco"> {{$usuario->nmEmail}} </p>

          <label class="campos2">CEP </label>
          <p class="eco">
              @if(!is_null($usuario->cdCep) OR !empty($usuario->cdCep))
                  {{$usuario->cdCep}}
              @else
                  Não informado
              @endif
          </p>

          <div id="todas">
            <div>
              <a href="campos" class="abrirCampos" tabindex="3">Alterar Senha</a>
              <hr class="line"><br>
              <span class="camposSpan">
                <label class="campos3">Senha Atual</label> &nbsp;
                <a href="/form-recuperar-senha" id="link" tabindex="4">(esqueci minha senha)</a><br>
                <input type="password"  name="tsenha" class="campCadPet tam" id="tsenha" title="Letras ou números,mínimo 6" pattern="^[a-zA-Zà-úÀ-Ú0-9]+$" autofocus maxlength="20" tabindex="5"/><br>

                <label class="campos3">Nova Senha</label><br> 
                <input type="password" name="tsenha" class="campCadPet tam" id="tsenha" title="Letras ou números,mínimo 6" pattern="^[a-zA-Zà-úÀ-Ú0-9]+$" maxlength="20" tabindex="6"/><br>

                 <label class="campos3">Confirmar Nova Senha</label><br>
                 <!-- acrescentar depois o oninput="check(this)" -->
                <<input type="password" name="tconfsenha" id="tconfsenha" oninput="check(this)" pattern="^[a-zA-Zà-úÀ-Ú0-9]+$" maxlength="20"  class="campCadPet tam" tabindex="7" /><br><br>
              </span>

              <div id="showHint"> </div> <!-- precisa de funcao para exibir as notificacoes sobre a troca de senha  --><br>
              <p align="center"><input type='submit' name='cmd' class='btAlterar' value='Salvar Alterações' tabindex="30"/></p>
            </div>

            <div>
              <a href="campos" class="abrirCampos" tabindex="8">Editar Perfil</a>
              <hr class="line"><br>
              <span class="camposSpan">
                <label class="campos3">Alterar Nome</label><br>
                <<input type="text" name="tnm_usuario" class="campCadPet cor3 tam" pattern="^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" autofocus maxlength="150" tabindex="9" value="{{$usuario->nmUsuario}}"/><br>

                <label class="campos3">Alterar CEP</label><br>
                @if(!is_null($usuario->cdCep) OR !empty($usuario->cdCep))
                  <input type='text' class="campCadPet cor3 tam" name='tcd_cep'
                 value="{{$usuario->cdCep}}" maxlength='9' title='Somente números' OnKeyPress="formata('#####-###', this)" pattern='^[0-9]{5}-[0-9]{3}$' tabindex="10"/><br>
                @else
                  <input type='text' class="campCadPet cor3 tam" name='tcd_cep'
                    value="Não informado" maxlength='9' title='Somente números' OnKeyPress="formata('#####-###', this)" pattern='^[0-9]{5}-[0-9]{3}$' tabindex="10"/><br>
                @endif
                 <!-- Não é possível deixar e-mail setado pois senão ele vai mudar toda vez que uma  alteração em algum outro dado ser feita -->
                <label class="campos3">Alterar E-mail</label><br>
                <input type="email" class="campCadPet cor3 tam" name="tnm_email" id="text2"  maxlength="70" tabindex="11" onblur="getEmail(this.value)" 
                value="{{$usuario->nmEmail}}"/><br>
                <label class="campos3">Alterar Foto</label><br>
                <input type="file" class="cor3 d" value="fileToUpload" name="fileToUpload" tabindex="15" id="imagemSub" size="35" accept="image/gif, image/jpeg, image/jpg, image/png" onchange="return is_img(this.id);"/><br><br>
                <p align="center"><input type='submit' name='cmd' class='btAlterar' value='Salvar Alterações' tabindex="30"/></p>
              </span>
            </div>
          </form>
             <div>
              <a href="campos" class="abrirCampos" tabindex="12">Cadastrar Novo Pet</a><br>
              <hr class="line"><br>
              <span class="camposSpan">
                <form id="formc" action="/cadastrar/usuario" name="cadastro" method="POST" enctype="multipart/form-data" onsubmit="return btCadastrar()"> 
                  {{csrf_field()}}
                  <label class="campos">Nome</label><br>
                            <input type="text" name="tnmpet" id="tnmpet" pattern="^[a-zA-Zà-úÀ-Ú0-9 -]+$" autofocus="autofocus" class="campCadPet tam" maxlength="125"  tabindex="14"/><br><br>
                        
                            <label class="campos">Tipo *</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" class="cor" name="tipo" tabindex="15" value="cao"/> Cão &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" class="cor" name="tipo" tabindex="16" value="gato"/> Gato <br><br>                   
                        
                           <label class="campos">Sexo *</label>&nbsp;&nbsp;
                           <input type="radio" class="cor" name="sexo" tabindex="17" value="f"/> Fêmea &nbsp;
                           <input type="radio" class="cor" name="sexo" tabindex="18" value="m"/> Macho  <br><br>
                       
                           <label class="campos">Porte *</label><br>
                           <select name="selporte" id="selporte" class="campCadPet tam" tabindex="19">
                                    <option selected value=""></option>
                                    <option value="Micro">Micro</option>
                                    <option value="Pequeno">Pequeno</option>
                                    <option value="Medio">Médio</option>
                                    <option value="Grande">Grande</option>
                                    <option value="Gigante">Gigante</option>
                                    <option value="naosei">Não Sei</option>
                            </select><br><br>
                                                
                           <label class="campos">Faixa Etária *</label><br>
                           <select name="dtnasc" id="dtnasc" class="campCadPet tam" tabindex="20">
                                   <option selected value=""></option>
                                   <option value="Filhote">Filhote</option>
                                   <option value="Adulto">Adulto</option>
                                   <option value="Senior/Idoso">Sênior / Idoso</option>
                                   <option value="naosei">Não Sei</option>
                                </select><br><br>
                                                
                           <label class="campos">Características</label><br>
                           <textarea rows="3"  name="asobre" cols="40" maxlength="1000" pattern="^[a-zA-Zà-úÀ-Ú0-9 -,./:;?!@()]+$" resize="none" class="campCadPet tam" tabindex="21"></textarea><br>
                           <label class="info">Outras informações que achar necessário</label><br><br>

                           <label class="campos">Imagens de até 2MB</label>
                             <div id="imgs">                               
                                <a href="#">
                                <img src="{{ asset('image/padrao.jpg')}}" class="imgsPet" id="foto" tabindex="22" >
                                <img src="{{ asset('image/padrao.jpg')}}" class="imgsPet" id="foto2" tabindex="23">
                                <img src="{{ asset('image/padrao.jpg')}}" class="imgsPet" id="foto3" tabindex="24">
                                <img src="{{ asset('image/padrao.jpg')}}" class="imgsPet" id="foto4" tabindex="25">
                                <img src="{{ asset('image/padrao.jpg')}}" class="imgsPet" id="foto5" tabindex="26">                                   
                                </a>
                              </div>
                              <div>
                                <input type="file" value="fileToUpload" class="cor2" name="fileToUpload"  id="imagemSub" size="35" accept="image/gif, image/jpeg, image/jpg, image/png" onchange="return is_img(this.id);"/>
                              </div><br>
                              <div id="hint"></div>

                               <p align="center">
                                 <input type="hidden" name="cdusuario" value="{{$usuario->cdUsuario}}">
                                 <button type="submit" name="cadastrar" id="btnfarejar" style="min-width:25%" tabindex="27">Cadastrar Pet</button>
                               </p> 
                            
                               <div id="hidden2"></div>
                  </form>                      
              </span>
             </div>

             <div>
              <a href="campos" class="abrirCampos" tabindex="13">Excluir Perfil</a><br>
              <hr class="line">
              <span id="span-excluir">
               <form action="/editar-perfil" method='POST'  name='perfil' enctype="multipart/form-data" onsubmit="return btCadastrar()">
                 {{csrf_field()}}
                <p align="center"><label class="dois d">
                   Tem certeza que deseja excluir seu perfil!<br>
                   Todos os seu pets cadastrados também <br>
                   serão excluídos!<br>
                 </label></p>
                 <p align="center"><input type='submit' onClick="ocultarDiv(this);" id="sair" name='cmd' class='btAlterar' style="min-width:25%;" value='Cancelar' tabindex="14"/> 
                 <p align="center"><input type='reset' id="btn-sair" name='cmd' class='btAlterar' style="min-width:25%;" value='Cancelar' tabindex="14"/>
                  <p align="center"> 
                 <input type='submit' name='cmd' id='btexcluir' style='min-width:25%' value='Excluir' tabindex="15"/></p>
                 <hr class="line">  
              </span>
              </form>    
             </div>
             <p align="center"><label class="dois d">
                   Atenção! Ao excluir seu perfil todos os pets<br>
                   cadastrados também serão excluídos!<br>
                  </label>
              </p>
             
             <hr class="line">
             <p align="center"><img src="{{asset('image/logo1.png')}}"></p>
         
          </form>
          </div>
          </div> <!-- fim div todas -->  
          </div><!-- fim div bordaPerfil --> 
       
        </div>  <!-- fim dLeft --> 
        <br><br><br><br><br>
        
        <!-- inicio divdir perfil -->
       <div id="perfil" class="divdir bordaPerfil abasDivs">
          <p class="paragrafos3" align="center">Meus pets cadastrados</p>
           <div class="trocaPet" >
            <ul>
             <li class="liInfoPet">Dta cadastro</li>
             <li class="liInfoPet"><a href="#" id="dds" onClick="esconderDivsPet(this);" tabindex="31">{{$pet->nmPet}}</a></li>
             <li class="liInfoPet"><a href="#" id="ed" onClick="esconderDivsPet(this);" tabindex="32">Editar pet</a></li>
             <li class="liInfoPet"><a href="#" id="exl" onClick="esconderDivsPet(this);" tabindex="33">Excluir pet</a></li>
            </ul><br>
           </div><!-- fim div trocaPet --> <br>

           <div id="fotoPet" style="float: left">
           <br> <div style="width: 100%"><img src="{{asset($pet->nmImgPet)}}" id='img' class='imgsPetEd2' tabindex='34'/></div><br>
                <img src="{{asset($pet->nmImgPet)}}" id='img' class='imgsPetEd' tabindex='35'/>
                <img src="{{asset($pet->nmImgPet)}}" id='img' class='imgsPetEd' tabindex='36'/>
                <img src="{{asset($pet->nmImgPet)}}" id='img' class='imgsPetEd' tabindex='37'/>
                <img src="{{asset($pet->nmImgPet)}}" id='img' class='imgsPetEd' tabindex='38'/>
           </div>     

          <div id="dados" class="abasPets" style="display: block">
            <br>
            <table style='min-width: 100%;font-size: 1.3em;'>
                    
                    <tr>
                      <td class='tabPret'><b>Nome : </b>&nbsp;
                      <label class="pets">{{$pet->nmPet}}</label></td>
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
                      <td class='tabPret'><b>Faixa Et&aacute;ria :</b>  &nbsp;
                      <label class="pets">{{$pet->nmFaixaEtariaPet}}</label></td>
                    </tr>

                    <tr>
                     <td class='tabPret'><b>Porte :</b> &nbsp;
                     <label class="pets">{{$pet->nmPortePet}}</label></td>
                    </tr>

                    <tr>
                     <td class='tabPret'><b>Adotado :</b> &nbsp;
                     <label class="pets">{{$pet->nmAdotado}} </label></td>
                    </tr>
                
                    <tr>
                     <td class='tabPret'><b>Detalhes :</b> &nbsp;
                     <label class="pets lbDet">{{$pet->descPet}}</td> 
                    </tr>
                   
                  </table>
          </div><!-- fim div dados --> 

          <div id="editar" class="abasPets">
           <form action="/editar-perfil" method='POST'  name='perfil' enctype="multipart/form-data" onsubmit="return btCadastrar()">
           {{csrf_field()}}
            <table class="tbEd">
            <tr>
              <td id="cor"><b>Nome: </b></td>
              <td><input type="text" name="tnm_pet" class="dadosPets" pattern="^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" maxlength="150" tabindex="39" value="{{pet->nmPet}}"/></td></tr>
            <tr>
              <td id="cor"><b>Sexo: </b></td>
              <td><input type="text" name="tsexo" class="dadosPets" pattern="^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" maxlength="150" tabindex="40" value="<{{pet->icSexoPet}}"/></td></tr>
            <tr>
              <td id="cor"><b>Faixa Etária: </b></td>
              <td><input type="text"  name="tfaixa" class="dadosPets" pattern="^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" maxlength="150" tabindex="41" value="{{pet->nmFaixaEtariaPet}}"/></td></tr>
            <tr>
              <td id="cor"><b>Porte: </b></td>
              <td><input type="text" name="tnm_tam" class="dadosPets" pattern="^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" maxlength="150" tabindex="42" value="{{pet->nmPortePet}}"/></td></tr>
            <tr>
              <td id="cor"><b>Detalhes: </b></td>
              <td><textarea rows="3" class="dadosPets1" name="ads" cols="43" maxlength="800" pattern="^[a-zA-Zà-úÀ-Ú0-9 -,./:;?!@()]+$" resize="none">{{pet->descPet}}></textarea></td></tr>
            <tr>
              <td id="cor"><b>Foi adotado: </b></td>
              <td>&nbsp;<input type="radio" id="cor" name="adotado" tabindex="44" value="sim"/><label id="cor"> Sim</label> &nbsp; &nbsp;
              <input type="radio" id="cor" name="adotado" tabindex="45" value="nao"/><label id="cor">Não</label>
              </td></tr>
           </table><br>
           </form>
          </div><!-- fim div editar -->
          
          <div id="excluir" class="abasPets">
            <p class="paragrafos3" align="center"><b>Motivo da exclusão</b></p>

           <input type="radio" id="cor" name="exclusao" tabindex="46" value="adotado"/><label class="cor"> Foi Adotado</label><br>
           <input type="radio" id="cor" name="exclusao" tabindex="47" value="desisti"/><label class="cor"> Desisti de Doar </label><br>
           <input type="radio" id="cor" name="exclusao" tabindex="48" value="outro"/><label class="cor"> Outro Motivo </label><br><br>
           <p align="center">
            <input type='submit' name='cmd' id='btexcluir' style="min-width:25%;" value='Excluir'  tabindex="49"/><br>
            <label class="campos5">Isto excluirá apenas o pet cadastrado, seu perfil se manterá ativo!</label>
            </p>
          </div><!-- fim div excluir -->

          <!-- div com os botoes de edicao de dados --> 
         <div id="editarBts" style="display: none;clear:both">
          <label class="campos3">Trocar Fotos</label>
          <input type='file' value="fileToUpload" class="cor2" name="fileToUpload" id="imagemSub" size="35" accept="image/gif, image/jpeg, image/jpg, image/png" onchange="return is_img(this.id);"/> <br>
          <p align='center'><input type='submit' name='cmd' class='btAlterar' value='Salvar Alterações' tabindex='50'/></p>
        </div><!-- fim editarBts -->  

       </div><!-- fim divdir perfil -->

       <!-- inicio divdir mensagem -->
       <div id="mensagem" class="divdir bordaPerfil abasDivs" style="display:none;"><br>

        <h3 align="center">CAIXA DE ENTRADA</h3></br>
        <form action="/editar-mensagem" method='POST'  name='perfil' enctype="multipart/form-data" onsubmit="return btCadastrar()">
           {{csrf_field()}}
          <div id="mens-group">
                @if <!-- SE O NUMERO DE MSGS RECEBIDAS FOR(<= 0) -->{
                    Caixa de mensagens vazia </br>                
                @else
                <!-- SE HOUVER MSGS:
                $i = 0;
                while ($linha = mysqli_fetch_assoc($result)) {
                    $row = $linha["cdMensagem"];
                -->  
           <p align="center"> <input type="submit" id="excluir" name="excAll" value="Excluir Selecionadas" class="btsMsgs"/></p>
           <br><br>
          </div> 

          <div class="mens-itself" style="min-width:40%">
                <input type="checkbox" id="check" name="checkm[]" value="">
                <button id="lixeira" class="btsMsgs" name="excluir" value="">Excluir</button>
                <a href="#" onclick="toggle('msgRecebida');" value="{{$mensagem->cdMensagem}}" class="mens" name="mensagem">{{usuario->nmUsuario}}</a>
          </div>  

          <div id="msgRecebida" align="center" value="{{$mensagem->cdMensagem}}" style="display:none">
            <br>
            
              <div class="imgRemetente">
               <img src="{{asset($usuario->imgUsuario)}}" class="imgsMsgs" id="foto">
              </div>
              
              <div id="infoMsgRec">
               <span class="campos3 usuarioRemt">{{$usuario->nmUsuario}}</span><br>
               <button id="btexcluir" name="excluir" style="min-width:20%;" value="{{$mensagem->cdMensagem}}">Excluir Mensagem</button> <br><br>
               <br>
                <p class="areaPet espMargins">{{$mensagem->dsMensagem}} </p>
                <br><hr class="lineMsg">
              </div><!-- fim div infoMsgRec-->
              
                <div id="msgDestinatario" >       
                   <br>
                   <textarea autofocus class="areaPet" name="ads" rows="4" cols="35" maxlength="800" placeholder="Digite aqui sua mensagem..." pattern="^[a-zA-Zà-úÀ-Ú0-9 -,./:;?!@()]+$" resize="none"  tabindex="51"></textarea>
                    <br>
                   <button align="right" id="env" name="enviar" tabindex="2" class="compartilhar" value="{{$usuario->cdUsuario}}">Enviar</button>
                </div> <!-- fim div msgDestinatario-->   

         </div> <!-- fim msgRecebida-->
         </form> <br>
        <p class="avisoUsuario">
          <b>ATENÇÃO:</b> O PetsLover não fornece dados de seus usuários. A troca de informações neste espaço, como endereço, telefone , etc., ocorrerá por conta e risco do usuário. Aconselhamos não fornecer informações pessoais nos primeiros contatos. Utilize a segurança desta área de mensagens até a concretização da doação / adoção.
        </p>
      </div> <!-- fim divdir mensagem -->   
    </div>
            
    </div>
    <form method="post" action="/logout">
        {{csrf_field()}}
        <button type="submit" name="logout">Sair</button>
    </form>
  </section>

<!--<script src={{ asset('js/showImage.js') }}></script> -->
@endsection
