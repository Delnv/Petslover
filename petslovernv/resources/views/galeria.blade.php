@extends('template.template')
@section('content')
  <section>
  	<div class="geral clearfix" style="">
               
       <div style="clear:both;width:97.25722758%;">
         <p class="paragrafo" align="center" style="font-size: 1.8em;color: #4169E1"><b>Encontre seu Pet </b></p>
         <div class="pesquisa" align="center" style="">          
              <br>  <select name="" id="" class="selpesquisa" tabindex="1">
                    <option selected value="">Tipo</option>
                    <option value="cao">Cão</option>
                    <option value="gato">Gato</option>
                </select> &nbsp;
               
                <select name="" id="" class="selpesquisa" tabindex="2">
                    <option selected value="">Sexo</option>
                    <option value="f">Fêmea</option>
                    <option value="m">Macho</option>
                </select> &nbsp;
                
                <select name="" id="" class="selpesquisa" tabindex="3">
                    <option selected value="">Faixa Etária</option>
                    <option value="filhote">Filhote</option>
                    <option value="adulto">Adulto</option>
                    <option value="idoso">Idoso / Sênior</option>
                </select> &nbsp;

                <select name="" id="" class="selpesquisa" tabindex="4">
                    <option selected value="">Porte</option>
                    <option value="micro">Micro</option>
                    <option value="pequeno">Pequeno</option>
                    <option value="medio">Médio</option>
                    <option value="grande">Grande</option>
                    <option value="gigante">Gigante</option>
                </select> &nbsp;
                <input type="submit"  name="btpesquisa" type="button" id="scad" tabindex="5" value="Pesquisar"/><br><br>
</div>
<div align="center"><br><img src="img/ad/ad4.png"> </div>
      </div><br><br>
      <div class="conteudo" style=''> <!-- 1312/1349-->    
    @if (count($imgsPet) != 0)
      @foreach($imgsPet as $img)
      <div class='divesq' style='max-width: 31.666667%;margin-left: 1%;'> <!-- 30.487805% 400/1312-->
        <a href='/perfil-cao/{{ $img->cdPet }}' id='linkPets'>
             
               <img src='{{ asset($img->nmImgPet) }}' style='height: 350px;border:2px solid black;' class="galeria">
                  
                <table border="0" style="max-width:100%;font-size:1.3em;" align="center">
                 
                </table>
        </a>
      <br>

     </div>
      @endforeach
    @else
      Não há nenhuma imagem.
    @endif  
  <br>
  <div align="center" style="clear:both;width:97.25722758%;">
     <br><img src="img/ad/ad5.png"> 
  </div>
   </div>
   </div> 
  </section>
</div>
@endsection