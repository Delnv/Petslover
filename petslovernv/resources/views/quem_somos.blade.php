@extends('template.template')
@section('content')
<div class="container">
<section>
  	<div class="geral clearfix" align="center">

  	  <p class="paragrafos" align="center">Quem Somos</p><br><br>

  		<div class="conteudo" align="center"> 

  		<div class="divesq">

  		 <p class="muitos" style="text-align:justify">O Pet’sLover é um site sem fins lucrativos composto por protetores e amigos de pet’s que tem o objetivo de facilitar o encontro de um novo lar para os nossos tão queridos companheiros. </br></br>No Brasil existem mais de 30 milhões de animais abandonados, segundo a OMS (Organização Mundial da Saúde). Essa é uma questão muito complexa e necessita de sensibilidade por parte das pessoas. Mas é difícil abordar esse problema em uma sociedade que se acostumou a ver homens, mulheres e crianças nas ruas. Frente aos milhares e milhares de animais nas ruas, tentamos através deste projeto retribuir o carinho e o amor que eles nos dão todos os dias. <br><br>
       </p>
      </div> 
      
       <div class="divdir">
       
        <p class="muitos" style="text-align:justify">O nosso intuito aqui é proporcionar um meio prático, confiável e de qualidade para que adotantes e doadores possam se encontrar e dar um destino melhor aos nossos amiguinhos do que as ruas. <br>
        </p> 
        <img src="{{ asset('image/equipe.png')}}" class="imgEq"> 
        <h4 align="center">Equipe Pet's Lover</h4>  
       </div>
      
        <div class="divHorizontal"><br><br>
        <img src="{{asset('image/ad/ad6.png')}}">
    </div>
  </div>
  </section>
</div>
@endsection