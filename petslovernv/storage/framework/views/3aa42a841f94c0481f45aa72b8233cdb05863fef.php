<?php $__env->startSection('content'); ?>
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
     <div align="center"><br><img src="<?php echo e(asset('image/ad/ad4.png')); ?>"> </div>
      </div><br><br>
      <div class="conteudo"> 

    <?php if(count($imgsPet) != 0): ?>
      <?php $__currentLoopData = $imgsPet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
      
      <div class='divesq' style='max-width: 31.666667%;margin-left: 1%;'>
        <a href='/perfil-cao/<?php echo e($img->cdPet); ?>' id='linkPets'>
             <div class="imgGaleria">
               <img src='<?php echo e(asset($img->nmImgPet)); ?>' class='imgPetGal'>
             </div>   
                <table class="tableGal" align="center">
                  <tr>
                     <td> <?php echo e($pet->nmPet); ?> </td>
                  </tr>
                
                  <tr>
                      <td> <?php if($pet->icSexoPet == 'f' OR $pet->icSexoPet== 'F' OR $pet->icSexoPet== 'fêmea' OR $pet->icSexoPet == 'Fêmea' OR $pet->icSexoPet == 'Femea' OR $pet->icSexoPet == 'femea'): ?>
                                Fêmea;
                           <?php elseif($pet->icSexoPet =='m' OR $pet->icSexoPet == 'M' OR $pet->icSexoPet == 'macho' OR $pet->icSexoPet == 'Macho'): ?>
                                Macho;
                           <?php endif; ?> </td>
                        <td>&nbsp; <?php echo e($pet->nmFaixaEtariaPet); ?></td>       
                  </tr>
                 
                  <tr>
                    <td align='center' class='verMais'> Ver mais </td>
                  </tr>
                </table>
                               
        </a>
      <br>

     </div>
     
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
      Não há nenhuma imagem.
    <?php endif; ?>   
  <br>
       <div align="center" class="divHorizontal">
        <br><img src="<?php echo e(asset('image/ad/ad5.png')); ?>"> 
       </div>
    </div>
   </div> 
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>