
<?php
include("includes/tags_inicio.php");
include("includes/header.php");
?> 

  <section>
  	<div class="geral clearfix" style="background-color:white;opacity:0.95;filter:alpha(opacity=60);border-radius:0px">
    
      <p class="paragrafos" align="center">Pets para Adoção</p><br>
       
       <div style="clear:both;width:97.25722758%;">
         <p class="pesquisa" align="center" style="font-size: 1.6em;">Encontre um  Pet </p>
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
      </div><br><br>
      <div class="conteudo" style=''> <!-- 1312/1349-->
<?php
    require_once("conexao.php");

    $con = abreConexao();

      
    $sql= "SELECT p.cdPet, p.nmPet,p.nmRacaPet,p.icSexoPet,i.imgPet1,i.cdImagem FROM PET AS p INNER JOIN IMAGEM_PET AS i ON p.cdPet = i.cdPet ";

        
    $res = mysqli_query($con,$sql);

    if ($res==false) {
      echo "Erro de conexão com o banco: " . mysqli_connect_error();
    } else {

      while(($linha = mysqli_fetch_object($res))){
?>     
    
      <div class='divesq' style='max-width: 28.963415%; '> <!-- 380/1312-->
        <a href='pet.php?n=<?php echo $linha->cdPet; ?>' id='linkPets'>
             
                <img src='imagem/<?php echo $linha->imgPet1; ?>' style='height:auto;border:2px solid black;'>
                  
                 <table border="0" style="max-width:100%;font-size:1.3em;" align="center"> <!-- 390/390-->
                
                 <tr>
                     <td><b>Nome &nbsp;</b></td><td><?php echo "$linha->nmPet"; ?></td>
                 </tr>
                
                 <tr>
                     <td><b>Raça &nbsp;</b></td> <td><?php echo "$linha->nmRacaPet"; ?></td>
                 </tr>
                
                 <tr>
                     <td><b>Sexo &nbsp;</b></td>
                     <td><?php if($linha->icSexoPet == 'f' OR $linha->icSexoPet== 'F' OR $linha->icSexoPet== 'fêmea' OR $linha->icSexoPet == 'Fêmea' OR $linha->icSexoPet == 'Femea' OR $linha->icSexoPet == 'femea'){
                               echo "Fêmea";
                              } elseif($linha->icSexoPet =='m' OR $linha->icSexoPet == 'M' OR $linha->icSexoPet == 'macho' OR $linha->icSexoPet == 'Macho'){
                               echo "Macho";
                              } ?></td>
                 </tr>
               
                 <tr>
                    <td colspan='2' align='center' style='font-size:0.9em;color:#808080'> Ver mais </td>
                 </tr>
                    </table></a> 
      <br>
     </div> 
<?php
      }
}
      mysqli_close($con);
?>
   </div>
   </div> 
  </section>
<?php include("includes/footer.php");?>
