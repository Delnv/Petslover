
<?php
include("includes/tags_inicio.php");
?> 

<div class="container" style="">
<?php include './includes/header.php';?>
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
<?php
    require_once("conexao.php");

    $con = abreConexao();

       // $sql="SELECT cd_pet,nm_pet,nm_raca_pet,dt_nascimento_pet,nm_tipo_pet,ds_pet,ic_sexo_macho_femea FROM PET";
        //$sql2="SELECT cd_pet,im_pet,cd_imagem_pet from IMAGEM_PET";
    $sql= "SELECT p.cdPet, p.nmPet,p.icSexoPet,p.nmFaixaEtariaPet,i.imgPet1,i.cdImagem FROM PET AS p INNER JOIN IMAGEM_PET AS i ON p.cdPet = i.cdPet ";

        //$result = mysqli_query($con, $sql2);
    $res = mysqli_query($con,$sql);

    if ($res==false) {
      echo "Erro de conexão com o banco: " . mysqli_connect_error();
    } else {

      while(($linha = mysqli_fetch_object($res))){
?>     
    
      <div class='divesq' style='max-width: 31.666667%;margin-left: 1%;'> <!-- 30.487805% 400/1312-->
        <a href='pet.php?n=<?php echo $linha->cdPet; ?>' id='linkPets'>
             
               <img src='imagem/<?php echo $linha->imgPet1; ?>' style='height: 350px;border:2px solid black;' class="galeria">
                  
                 <table border="0" style="max-width:100%;font-size:1.3em;" align="center"> <!-- 390/390-->
                
                 <tr>
                     <td><?php echo "$linha->nmPet"; ?></td>
                 </tr>
                
                 <tr>
                      <td><?php if($linha->icSexoPet == 'f' OR $linha->icSexoPet== 'F' OR $linha->icSexoPet== 'fêmea' OR $linha->icSexoPet == 'Fêmea' OR $linha->icSexoPet == 'Femea' OR $linha->icSexoPet == 'femea'){
                               echo "Fêmea";
                              } elseif($linha->icSexoPet =='m' OR $linha->icSexoPet == 'M' OR $linha->icSexoPet == 'macho' OR $linha->icSexoPet == 'Macho'){
                               echo "Macho";
                              } ?></td>
                        <td>&nbsp; <?php echo "$linha->nmFaixaEtariaPet"; ?></td>       
                 </tr>
                 
                 <tr>
                    <td align='center' style='font-size:0.9em;color:#808080'> Ver mais </td>
                 </tr>
                    </table></a> 
      <br>

     </div> 
<?php
      }
}
      mysqli_close($con);
?>
  <br>
  <div align="center" style="clear:both;width:97.25722758%;">
     <br><img src="img/ad/ad5.png"> 
  </div>
   </div>
   </div> 
  </section>
  
<?php include("includes/footer.php");?>
</div>
</body>
</html>


