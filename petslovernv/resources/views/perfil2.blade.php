@extends('template.template')
@section('content')
<script>
          function esconderPerfilMensagem(obj){
            document.getElementById('mensagem').style.display="none";
            
            switch(obj.id){
             case 'msg':
             document.getElementById('mensagem').style.display="block";
             document.getElementById('perfil').style.display="none";
             break;
             case 'perf':
             document.getElementById('mensagem').style.display="none";
             document.getElementById('perfil').style.display="block"; 
             break;
          }
            
          function esconderDivsPet(obj){
            document.getElementById('dados').style.display="block";
            document.getElementById('editar').style.display="none";
            document.getElementById('excluir').style.display="none";
            document.getElementById('adotado').style.display="none";
           
            switch(obj.id){
             
             case 'adt':
             document.getElementById('adotado').style.display="block";
             
             break;
             case 'ed':
             document.getElementById('editar').style.display="block";
             
             break;
             case 'exl':
             document.getElementById('excluir').style.display="block";
             
             break;
           }
</script>

<div class="container" style="">
  <section>
  	<div class="geral clearfix">
       
      
      <div align="center" style="clear:both;width:97.25722758%;margin:auto;">
      <p class="paragrafos" style="color:  #0000CD" align="center"><b>Perfil {{ $usuario->nmUsuario }}</b></p><br>
      </div>
      <div class="conteudo" style=''> <!-- 1200/1349-->
               
        <div class="divesq" style=""> <!-- 600 / 1312-->
         
          <div class="trocaDiv">
           <ul>
            <li style="background-color: #1E90FF;border:1px solid #1E90FF;"><a href="#" id="perf" onClick="esconderPerfilMensagem(this);" tabindex="1">Principal</a></li>
            <li style="background-color: #0000CD; border:1px solid #0000CD;"><a href="#" id="msg" onClick="esconderPerfilMensagem(this);" tabindex="2">Mensagens</a></li>
           </ul><br><br>
          </div>
          <div class="bordaPerfil">
          <form action="editar_perfil.php" method='POST'  name='perfil' enctype="multipart/form-data" onsubmit="return btCadastrar()">
         
          <p>
           <img src="{{asset('image/user_photo/photo_padrao.png')}}" class="imgsPerfil" id="foto">&nbsp;
           <label class="campos2" style="padding:0;">{{$usuario->nmUsuario}}</label>
          </p>

          <hr class="line">
          <label class="campos2">E-mail </label>
          <p class="eco"> E-mail do usuário </p>

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
              <span style="margin-left: 19px;">
                <label class="campos3">Senha Atual</label> &nbsp;
                <a href="#recuperar-senha" id="link" tabindex="4">(esqueci minha senha)</a><br>
                <input type="password"  name="tsenha" size="29" id="tsenha" title="Letras ou números,mínimo 6" pattern="^[a-zA-Zà-úÀ-Ú0-9]+$" maxlength="20" tabindex="5"/><br>

                <label class="campos3">Nova Senha</label><br> 
                <input type="password" name="tsenha" size="29" id="tsenha" title="Letras ou números,mínimo 6" pattern="^[a-zA-Zà-úÀ-Ú0-9]+$" maxlength="20" tabindex="6"/><br>

                 <label class="campos3">Confirmar Nova Senha</label><br>
                <input type="password" name="tconfsenha" id="tconfsenha" oninput="check(this)" pattern="^[a-zA-Zà-úÀ-Ú0-9]+$" maxlength="20"  size="29" tabindex="7" /><br><br>
              </span>
            </div>

            <div>
              <a href="campos" class="abrirCampos" tabindex="8">Editar Perfil</a>
              <hr class="line"><br>
              <span style=" margin-left: 19px;">
                <label class="campos3">Alterar Nome</label><br>
                <input type="text" style="color:#708090" name="tnm_usuario" size="29" pattern="^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" maxlength="150" tabindex="9" value="{{$usuario->nmUsuario}}"/><br>

                <label class="campos3">Alterar CEP</label><br>
                <input type='text' style="color:#708090" name='tcd_cep'
                 value="Usar o if do laravel" maxlength='9' title='Somente números' OnKeyPress="formata('#####-###', this)" pattern='^[0-9]{5}-[0-9]{3}$' size="29" tabindex="10"/><br>

                <label class="campos3">Alterar E-mail</label><br>
                <input type="email" style="color:#708090" name="tnm_email" id="text2" size="29" maxlength="70" tabindex="11" onblur="getEmail(this.value)" value="Email do usuário"/><br>
                <label class="campos3">Alterar Foto</label><br>
                <input type="file" style="color:#708090" value="fileToUpload" style="font-size:1.1em" name="fileToUpload" tabindex="15" id="imagemSub" size="35" accept="image/gif, image/jpeg, image/jpg, image/png" onchange="return is_img(this.id);"/><br><br>
              </span>
            </div>

             <div>
              <a href="#cadastrar-pet" class="abrirCampos" tabindex="12">Cadastrar Novo Pet</a><br>
              <hr class="line"><br>
              <span>
                
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
                  <p align="center"><input type='submit' onClick="ocultarDiv(this);" id="sair" name='cmd' class='btAlterar' style="min-width:25%;" value='Cancelar' tabindex="14"/> 
                 <input type='submit' name='cmd' id='btexcluir' style='min-width:25%' value='Excluir' tabindex="15"/></p><!-- 150/600-->
                 <hr class="line">  
              </span>
                
             </div>
             <p align="center"><label class="dois" style="font-size: 1em">
                   Atenção! Ao excluir seu perfil todos os pets<br>
                   cadastrados também serão excluídos!<br>
                  </label></p>
             <p align="center"><input type='submit' name='cmd' class='btAlterar' style='min-width:25%' value='Salvar Alterações' tabindex="16"/></p>
             <hr class="line">
             <p align="center"><img src="{{asset('image/logo1.png')}}"></p>
         
          </form>
          </div>    
          </div><!-- fim div todas --> 
       
        </div>  <!-- fim divesq --> 
        
        <!-- inicio divdir perfil -->
       <div id="perfil" align="left" class="divdir bordaPerfil" style="max-width: 60%;padding-right:0">
          <p class="paragrafo" align="center" style="font-size: 1.7em;">Meus pets cadastrados</p>
           <div class="trocaPet" >
            <ul>
             <li style="background-color: #E0FFFF;border:1px solid #E0FFFF;">&nbsp;</li>
             <li style="background-color: #E0FFFF	;border:1px solid #E0FFFF;"><a href="#" id="adt" onClick="esconderDivsPet(this);" tabindex="1">Pet adotado</a></li>
             <li style="background-color: #E0FFFF	; border:1px solid #E0FFFF;"><a href="#" id="ed" onClick="esconderDivsPet(this);" tabindex="2">Editar pet</a></li>
             <li style="background-color: #E0FFFF	; border:1px solid #E0FFFF;"><a href="#" id="exl" onClick="esconderDivsPet(this);" tabindex="2">Excluir pet</a></li>
            </ul><br>
           </div><!-- fim div trocaDiv --> <br>
           <img src="{{asset('image/pet/padrao.jpg')}}" id='img' style='border:2px solid black; height: 93px; width: 100px;'/>

          <div id="dados" style="float: right;display:block;">
           Dados pet
          </div><!-- fim div adotado --> 

          <div id="adotado" style="float: right;display:none;">
           Adotado
          </div><!-- fim div adotado --> 

          <div id="editar" style="float: right;display:none;">
           Editar
          </div><!-- fim div editar -->
          
          <div id="excluir" style="float: right;display:none;">
           Excluir
          </div><!-- fim div excluir --> 

       </div><!-- fim divdir perfil -->

       <!-- inicio divdir mensagem -->
       <div id="mensagem" class="divdir" style="padding-right: 0;display:none;max-width: 53%;border:1px solid black"><br><br>

        <p class="avisoUsuario">
          <b>ATENÇÃO:</b> O PetsLover não fornece dados de seus usuários. A troca de informações neste espaço, como endereço, telefone , etc., ocorrerá por conta e risco do usuário. Aconselhamos não fornecer informações pessoais nos primeiros contatos. Utilize a segurança desta área de mensagens até a concretização da doação / adoção.
        </p>
        
        <p>
           <img src="{{asset('image/user_photo/photo_padrao.png')}}" align="left" class="imgsPerfil" id="foto">&nbsp;<label class="usuario" style=""></label>&nbsp; 
           <label class="usuario" align="right" style=""></label><img src="{{asset('image/user_photo/photo_padrao.png')}}" align="right" class="imgsPerfil" style='margin-right:17px;margin-left: 0' id="foto"> 
        </p><br>

        
       </div> <!-- fim divdir mensagem -->   
      </div>
            
    </div>

  </section>

<script src="includes/showImage.js"></script>
</div>
@endsection
