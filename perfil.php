<?php
include './includes/tags_inicio.php';


if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'NAO') {
    header("Location: index.php");
    exit();
}
include("includes/header.php");
?>

<script src="includes/validacao_js.js"></script>
<section>
    <div class="geral clearfix" style="background-color:white;opacity:0.94;filter:alpha(opacity=60);border-radius:0px">
        
        <p class="paragrafos" align="center">Seu Perfil</p><br>
        
        <div class='conteudo'>
            <form action="editar_perfil.php" method='POST' name='perfil' enctype="multipart/form-data" onsubmit="return btCadastrar()">
                
                <div class='divesq' style=''>
                    <?php
                    require_once("conexao.php");
                    require_once ("includes/tratarErro.php");

                    $con = abreConexao();
                    $cd = $_SESSION['cdUsuario'];

                    $sql = "SELECT p.cdPet,p.nmPet,p.nmRacaPet,p.nmFaixaEtariaPet,p.nmTipoPet,p.descPet,
              p.nmPortePet,p.icSexoPet,u.nmUsuario,u.cdCep,l.emailUsuario
              FROM PET p, USUARIO u, LOGIN l
              WHERE  u.cdUsuario=l.cdUsuario
              and u.cdUsuario=p.cdUsuario and u.cdUsuario='" . $cd . "'";
                    $sql2 = "SELECT i.imgPet1 FROM PET pe, USUARIO u, IMAGEM_PET i WHERE pe.cdPet = i.cdPet
                   AND pe.cdUsuario = u.cdUsuario AND u.cdUsuario=" . $cd;

                    $result = mysqli_query($con, $sql2);
                    $res = mysqli_query($con, $sql);
                    if ($res == FALSE || $result == FALSE) {
                        echo "Erro de conexão com o banco: " . mysqli_connect_error();
                    } else {

                        while ($img = mysqli_fetch_object($result)) {
             ?>
                    <br/><br/><br/><br/><br/><p align='center'style='font-size:12px;color:black'><img src='imagem/<?php echo $img->imgPet1; ?>' style='border:2px solid black'  name='img' width='400' height='auto' id='img' value='img'/></p>
                    <input type="hidden" name='imgA' id='imgA'value='<?php echo $img->imgPet1; ?>'> <br/>
                            <p align='center'style='font-size:13px;color:black;'><input type='file' name="img3" value="img3" id='imagemSub' accept='image/gif, image/jpeg, image/jpg, image/png' tabindex="13"/></p>
    <?php } ?>
                        
                    </div>
                    <div class='divdir' style=''>
    <?php
    while ($linha = mysqli_fetch_object($res)) {
        $linha->cdPet;
        ?>
                            <label class="campos">Nome </label><br/>
                            <input type='text' name='tnm_pet' value='<?php echo $linha->nmPet ?>' maxlength='115'size='34' autofocus pattern="^[a-zA-Zà-úÀ-Ú0-9 -]+$" tabindex="1" /><br/><br>
                            
                            <label class="campos">Raça </label><br/>
                            <input type='text' name='tnm_raca'  maxlength='50' pattern="^[a-zA-Zà-úÀ-Ú0-9 -]+$" value='<?php echo $linha->nmRacaPet ?>' size='34'  maxlength='37'tabindex="2"/><br/><br>
                            
                            <label class="campos">Faixa Etária </label><br/>
                            <input type='text'name='selano' size='34'value='<?php echo $linha->nmFaixaEtariaPet ?>' maxlength='13' tabindex="3"/><br/><br>
                            
                            <label class="campos">Sexo </label><br/>
                            <input type='text' name='tsexo' value='<?php if($linha->icSexoPet == 'f' OR $linha->icSexoPet == 'F' OR $linha->icSexoPet == 'fêmea' OR $linha->icSexoPet == 'Fêmea' OR $linha->icSexoPet == 'Femea' OR $linha->icSexoPet == 'femea'){echo 'Fêmea';}else{echo 'Macho';}?>' title='Preencha com f/F ou m/M ou Macho/macho ou fêmea/Fêmea' pattern='^[f/m/F/M/Fêmea/Macho/macho/fêmea/femea/Femea]+$' maxlength='5'size='34' tabindex="4" /><br/><br>
                           
                            <label class="campos">Porte </label><br/>
                            <input type='text' name='tnm_tam' value='<?php echo $linha->nmPortePet ?>' pattern='^[a-zA-Z- -ã-Ã-ç-Ç-á-à-À-Á-ó-Ó-é-É-è-È-í-Í-ú-Ú]+$' maxlength='9'size='34' tabindex="5"/><br/><br>
                            
                            <label class="campos">Descrição </label><br/>
                            <textarea rows='5' name='ads' cols='34'  style="width: 350px;" maxlength='1000' resize='none' tabindex="9" value="<?php echo $linha->descPet ?>" ></textarea><br/><br>

                            <label class="campos">Responsável </label><br/>
                            <input type='text' name='tnm_protetor' value='<?php echo $linha->nmUsuario ?>' pattern="^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ -]+$" title="Campo Protetor não aceita números" maxlength='150'size='34' tabindex="10"/><br/><br>
                           
                            <label class="campos">E-mail </label><br/>
                            <label class="campos" style="color:black"><?php echo $linha->emailUsuario ?></label><br/><br>
                            
                            <label class="campos">CEP </label><br/>
                            <input type='text' name='tcd_cep' value='<?php echo $linha->cdCep ?>' maxlength='9' title='Somente números' OnKeyPress="formata('#####-###', this)" pattern='^[0-9]{5}-[0-9]{3}$'size='34' tabindex="11"/><br/><br>
                        <?php } ?>

                       
                    <?php
                    }
                    mysqli_close($con);
                    ?>

                </div>
                  
        </div>

        <div style="clear:both;width:97.25722758%;">
           <br> <p align='center'><input type='submit' name='cmd' id='btnfarejar' style="min-width:28.96341463%" value='Alterar Foto' tabindex="14"/> &nbsp;
                             <input type='submit' name='cmd' id='btnfarejar' style="min-width:28.96341463%;background-color: #87bdd8;border: 2px solid #87bdd8;" value='Alterar Dados' tabindex="12"/> &nbsp;
                             <input type='submit' name='cmd' id='btexcluir' style='min-width:28.96341463%' value='Excluir Cadastro' tabindex="15"/></p>          
        </div>

       
        </form>
    </div>
    <script src="includes/showImage.js"></script>
</section>
<?php include("includes/footer.php"); ?>

