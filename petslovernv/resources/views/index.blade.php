@extends('template.template')
@section('content')

<div class="container">

<section>
  	<div class="geral clearfix">
      	<br><br>	    
      <div class="conteudo">  
         
         <div class="divhome">
           <img src="{{asset('image/capa.png')}}">
         </div>      
               <div class="divdoar">
                            
                      <a href="/cadastrar">
                        <input type="submit" name="farejar" id="doar" value="Quero Doar" tabindex="1" /> 
                      </a><br>
                      <a href="/galeria">
                        <input type="submit" name="farejar" id="adotar" value="Quero Adotar" tabindex="2" /
                      </a>
                              
              </div>                  
         </div>
     
      </div>
      
    </div>  
</section>
</div>

@endsection


