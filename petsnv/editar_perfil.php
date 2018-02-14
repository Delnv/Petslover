<?php
include("includes/tags_inicio.php");
include_once 'includes/tratarErro.php';
include_once 'includes/functions.php';
?>

<div class="container" style="">
<?php include './includes/header.php';?>

<section>
    <div class="geral clearfix">
        
        <p class="paragrafos" align="center">Seu Perfil</p><br>

        <div class="conteudo" style=''>
            <?php
            require_once("conexao.php");

            $con = abreConexao();


            if ($_POST["cmd"] == "Excluir") {

                $sql = "DELETE FROM USUARIO WHERE cdUsuario =" . $cd;
                session_start();
                session_destroy();
                //header("Location: index.php");
            } elseif ($_POST["cmd"] == "Salvar Alterações") {

                $nmusuario = $_POST["tnm_usuario"];
                $email = $_POST["tnm_email"];
                $cep = $_POST["tcd_cep"];
                $nm_pet = $_POST["tnm_pet"];
                $faixa = $_POST["selfaixa"];
                $sexo = $_POST["tsexo"];
                $porte = $_POST["tnm_tam"];
                $tipo = $_POST["tnm_tipo"];
                $ds = $_POST["ads"];

                $sql = "UPDATE PET p, USUARIO u SET  p.nmPet='" . $nm_pet . "',
             p.nmFaixaEtariaPet='" . $faixa . "',
             p.nmTipoPet='" . $tipo . "',p.descPet='" . $ds . "',p.nmPortePet='" . $porte . "',
             p.icSexoPet='" . $sexo . "',u.nmUsuario='" . $nmusuario . "',u.cdCep='" . $cep . "'
           WHERE
              u.cdUsuario=p.cdUsuario and u.cdUsuario='" . $cd . "'";
            } elseif ($_POST["cmd"] == "Salvar Alterações") {
                $img = "img3";
                $imgAntiga = $_POST['imgA'];
                $nImg = isImage($img);
                if (!$nImg) {
                    echo "Não é imagem";
                    exit();
                } else {
                    $imgAtual = moveImage($img);
                    if ($imgAtual) {
                        $sql = "UPDATE IMAGEM_PET i, PET pe, USUARIO u SET i.imgPet1 ='".$imgAtual."' WHERE i.cdPet = pe.cdPet AND u.cdUsuario = pe.cdUsuario AND u.cdUsuario=".$cd;
                        unlink("imagem/".$imgAntiga); 
                        /*  $sql = "UPDATE USUARIO SET imgUsuario ='".$imgAtual."' WHERE u.cdUsuario=".$cd;
                        unlink("imagem/".$imgAntiga); para alterar a img do usuario */
                    }
                }
            }
            
           $res = mysqli_query($con, $sql);
            if (!$con) {
                echo "Erro de conexão com o banco! " . mysqli_connect_error();
            } else {
                header("Location: perfil.php");
            }
            
            mysqli_close($con);
            
            ?>
        </div>
    </div>
</section>
<?php include("includes/footer.php"); ?>
</div>
</body>
</html>
