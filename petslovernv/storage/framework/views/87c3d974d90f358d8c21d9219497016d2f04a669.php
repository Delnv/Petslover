<?php $__env->startSection('content'); ?>

<div class="container">

<section>
  	<div class="geral clearfix">
      	<br><br>	    
      <div class="conteudo">  
         
         <div class="divhome">
           <img src="<?php echo e(asset('image/capa.png')); ?>">
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

<?php $__env->stopSection(); ?>



<?php echo $__env->make('template.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>