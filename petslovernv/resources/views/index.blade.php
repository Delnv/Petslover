@extends('template.template')
@section('content')

<div class="container" style="">

<section>
  	<div class="geral clearfix" style="">
      	<br><br>	    
      <div class="conteudo" style=''>  
         
         <div class="divhome" style="">
           <img src="{{asset('image/capa.png')}}">
         </div>      
               <div class="divdoar" style="">
                            
                              <a href="/cadastrar" style="">
                                <input type="submit" name="farejar" id="doar" value="Quero Doar" tabindex="1" /> 
                              </a><br>
                              <a href="/galeria">
                              <input type="submit" name="farejar" id="adotar" style="" value="Quero Adotar" tabindex="2" /> 
                              </a>
              </div>                  
         </div>
     
      </div>
      
    </div>  
</section>
<!--<?php //include("includes/footer.php");?>-->
</div>

@endsection


