@extends('template.template')
@section('content')
  <section>
  	<div class="geral clearfix"><br><br>
               
       <div class="divHorizontal">
         <p class="pTitulo" align="center"><b>Encontre seu Pet </b></p>
         <div class="pesquisa" align="center">          
                <select name="" id="" class="selpesquisa" tabindex="1">
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
     <div align="center"><br><img src="{{asset('image/ad/ad4.png')}}"> </div>
      </div><br><br>
      <div class="conteudo"> 

    @if (count($imgsPet) != 0)
      @foreach($imgsPet as $img) 
      
      <div class='divesq' style='max-width: 31.666667%;margin-left: 1%;'>
        <a href='/perfil-cao/{{ $img->cdPet }}' id='linkPets'>
             <div class="imgGaleria">
               <img src='{{ asset($img->nmImgPet) }}' class='imgPetGal'>
             </div>   
                <table class="tableGal" align="center">
                  <tr>
                     <td> {{ $pet->nmPet }} </td>
                  </tr>
                
                  <tr>
                      <td> @if($pet->icSexoPet == 'f' OR $pet->icSexoPet== 'F' OR $pet->icSexoPet== 'fêmea' OR $pet->icSexoPet == 'Fêmea' OR $pet->icSexoPet == 'Femea' OR $pet->icSexoPet == 'femea')
                                Fêmea;
                           @elseif($pet->icSexoPet =='m' OR $pet->icSexoPet == 'M' OR $pet->icSexoPet == 'macho' OR $pet->icSexoPet == 'Macho')
                                Macho;
                           @endif </td>
                        <td>&nbsp; {{ $pet->nmFaixaEtariaPet }}</td>       
                  </tr>
                 
                  <tr>
                    <td align='center' class='verMais'> Ver mais </td>
                  </tr>
                </table>
                               
        </a>
      <br>

     </div>
     
      @endforeach
    @else
      Não há nenhuma imagem.
    @endif   
  <br>
       <div align="center" class="divHorizontal">
        <br><img src="{{asset('image/ad/ad5.png')}}"> 
       </div>
    </div>
   </div> 
  </section>
</div>
@endsection