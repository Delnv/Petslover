
<?php
 $raca=$_GET['selraca'];
 $sexo=$_GET['sexo'];
if ($raca =="" and $sexo==""){
   header("Location:galeria.php");      
}

include("includes/header.php");
include("includes/tags_inicio.php");
?>
  <section>
  	<div class="geral clearfix" style="background-color:white;opacity:0.9;filter:alpha(opacity=60);border-radius:0px">
     <h4 align="center">De Acordo com a sua Pesquisa Esses São os Resultados</h4><br/>

<?php
      require_once("conexao.php");
    
     $con = abreConexao();
     //$sql= "SELECT p.cd_pet, p.nm_pet,p.nm_raca_pet,p.dt_nascimento_pet,p.nm_tipo_pet,p.ds_pet,p.ic_pedigree_sim_nao,p.nm_cor_pet,p.ic_sexo_macho_femea,p.nm_tamanho_pet,i.im_pet,i.cd_imagem_pet FROM PET AS p INNER JOIN IMAGEM_PET AS i ON p.cd_pet = i.cd_pet WHERE p.nm_raca_pet='".$raca."' AND p.ic_sexo_macho_femea='".$sexo."' ORDER BY p.nm_pet" ";
     
        $sql="SELECT cd_pet,nm_pet,nm_raca_pet,dt_nascimento_pet,nm_tipo_pet,ds_pet FROM PET
             WHERE nm_raca_pet='".$raca."' AND ic_sexo_macho_femea='".$sexo."' ORDER BY nm_pet" ;
        $sql2 = "SELECT p.cd_pet,i.cd_pet,i.im_pet,i.cd_imagem_pet FROM IMAGEM_PET i,PET p WHERE p.nm_raca_pet='".$raca."'
                 AND p.ic_sexo_macho_femea='".$sexo."' AND p.cd_pet=i.cd_pet ORDER BY p.nm_pet ";
        $sql3="SELECT cd_pet,nm_pet,nm_raca_pet,dt_nascimento_pet,nm_tipo_pet,ds_pet FROM PET
             WHERE nm_raca_pet='".$raca."' OR ic_sexo_macho_femea='".$sexo."'ORDER BY nm_pet";
        $sql4 = "SELECT p.cd_pet,i.cd_pet,i.im_pet,i.cd_imagem_pet FROM IMAGEM_PET i,PET p WHERE
                  p.ic_sexo_macho_femea='".$sexo."' AND p.cd_pet=i.cd_pet ORDER BY p.nm_pet ";
        $sql5 = "SELECT p.cd_pet,i.cd_pet,i.im_pet,i.cd_imagem_pet FROM IMAGEM_PET i,PET p WHERE p.nm_raca_pet='".$raca."'
                  AND p.cd_pet=i.cd_pet ORDER BY p.nm_pet ";

        if($raca !="" and $sexo!=""){
          $res = mysqli_query($con,$sql);
          $result = mysqli_query($con, $sql2);
        }else if($sexo!=""){
          $res = mysqli_query($con,$sql3);
          $result = mysqli_query($con, $sql4);
        }else if($raca !="" ){
          $res = mysqli_query($con,$sql3);
          $result = mysqli_query($con, $sql5);
        } 
          $count = mysqli_num_rows($res);
          if ($count==false){
          echo "<table align='center'><tr><td>Desculpe,sua pesquisa n&atilde;o retornou pretendentes!</td></tr><tr><td>&nbsp;</td></tr>
                                      <tr><td>Por favor fa&ccedil;a <a href='index.php' id='link' style='font-size:16px'> outra busca</a> .</td></tr>
                                      <td>&nbsp;</td></tr>
                                      <tr><td> Ou acesse a lista no link abaixo: </td></tr></table>";
          }

if ($res==false|| $result==false) {
    echo "Erro de conexão com o banco: " . mysqli_connect_error();
}else {

      while(($img = mysqli_fetch_object($result)) && ($linha = mysqli_fetch_object($res))){
          echo
             "<table border='0'width='300' align='center'>" ;
          echo
              "<tr><td colspan='2'><img src='imagem/".$img->im_pet."'width='300' style='border:2px solid black'height='auto'/></td></tr>";
          echo
             "</table><table border='0'min-width='300' max-width='500' align='center'>" ;
          echo
               "<tr><td width='100'><b>Me chamo &nbsp;</b></td><td>".$linha->nm_pet."</td></tr>".
               "<tr><td width='100'><b>Sou da ra&ccedil;a &nbsp;</b></td><td>".$linha->nm_raca_pet."</td></tr>";
          echo
               "<tr><td colspan='2' align='center'><a href='pet.php?n=$linha->cd_pet&im=$img->cd_pet'id='link'>Ver mais </a></td></tr></table><br/>";
      }

}
      mysqli_close($con);
?>
<p align="center"><a href="galeria.php" id="link">Lista Completa dos Pets para Adoção</a></p>
    </div>
  </section>
<?php include("includes/footer.php");?>
</body>
</html>
