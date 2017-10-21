<?php
include("includes/tags_inicio.php");
include("includes/header.php");
include_once 'includes/tratarErro.php';
include_once 'includes/functions.php';
?>
<section>
    <div class="geral clearfix" style="background-color:white;opacity:0.9;filter:alpha(opacity=60);border-radius:0px">
        
        <p class="paragrafos" align="center">Seu Perfil</p><br>

        <div style='min-height:950px;border:1px solid black;width:735px;'>
            <?php
            require_once("conexao.php");

            $con = abreConexao();


            if ($_POST["cmd"] == "Excluir Cadastro") {

                $sql = "DELETE FROM USUARIO WHERE cdUsuario =" . $cd;
                session_start();
                session_destroy();
                //header("Location: index.php");
            } elseif ($_POST["cmd"] == "Alterar Dados") {

                $nmusuario = $_POST["tnm_protetor"];
                //$email = $_POST["tnm_email"];
                $cep = $_POST["tcd_cep"];
                $nm_pet = $_POST["tnm_pet"];
                $raca = $_POST["tnm_raca"];
                $faixa = $_POST["selano"];
                $sexo = $_POST["tsexo"];
                $porte = $_POST["tnm_tam"];
                //$cor = $_POST["tnm_cor"];
                //$ped = $_POST["tped"];
                $tipo = $_POST["ttipo"];
                $ds = $_POST["ads"];

                $sql = "UPDATE PET p, USUARIO u SET  p.nmPet='" . $nm_pet . "',p.nmRacaPet='" . $raca . "',
             p.nmFaixaEtariaPet='" . $faixa . "',
             p.nmTipoPet='" . $tipo . "',p.descPet='" . $ds . "',p.nmPortePet='" . $porte . "',
             p.icSexoPet='" . $sexo . "',u.nmUsuario='" . $nmusuario . "',u.cdCep='" . $cep . "'
           WHERE
              u.cdUsuario=p.cdUsuario and u.cdUsuario='" . $cd . "'";
            } elseif ($_POST["cmd"] == "Alterar Foto") {
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
