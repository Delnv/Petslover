<?php
include './includes/header.php';
include './includes/tags_inicio.php';
include 'conexao.php';

//Verifica se a origem da requisição é da mesma origem do site
if (isset($_SESSION["HTTP_REFERER"]) && $_SESSION["HTTP_REFERER"] != "http://www.petslover.com.br/petslover/mensagem.php"):
    $retorno = array('codigo' => 0, 'mensagem' => 'Origem da requisição não autorizada.');
    echo json_encode($retorno);
    header("Location: index.php");
    exit();
endif;

//Se o usuário não estiver logado é redirecionado para a página principal
if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'NAO') {
    header("Location: index.php");
    exit();
}

$conexao = abreConexao();

$cdMensagem = isset($_GET['men']) ? $_GET['men'] : '';

$sql = "SELECT i.imPet1, p.cdPet, p.nmPet, m.descMensagem, m.statusMensagem 
    FROM IMAGEM_PET i, PET p, MENSAGEM m 
    WHERE i.cdPet = p.cdPet AND p.cd_pet = m.cdRemetente 
    AND m.cdMensagem=" . $cdMensagem;

if (!$conexao) {
    die("Erro na conexão " . mysqli_errno($conexao));
} else {
    $result = mysqli_query($conexao, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $pet = $row['nmPet'];
        $descricao = $row['descMensagem'];
        $mensagem = $row['statusMensagem'];
        $img = $row['imgPet1'];
        $cdPet = $row['cdPet'];
    }
}
?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
    
    <div align="center" class="geral clearfix" style="background-color:white;opacity:0.94;filter:alpha(opacity=60);border-radius:0px">
        <div align="center" id="mens-group">
            <form align="center" action="editar_mensagem.php" method="POST"><br><br>
                <table align="center" width="520">
                    <tr>
                        <td align="center">
                            <img src="imagem/<?php echo $img; ?>" height="110" style='border:2px solid black' width="120"/>
                        </td>
                        <td align="center">
                            <strong><?php echo $pet ?></strong><br>
                            <strong><?php echo $descricao;?></strong><br><br>
                            <button id="exc" class="btsMsgs" name="excluir" value="<?php echo $cdMensagem; ?>">Excluir Mensagem</button>
                        </td>
                        </tr>
                    <tr>
                        <td colspan="2">
                           <br/>
                            <table align="center" width="450"id="mens-itself">
                               <tr><td align="center" colspan="2"> <?php echo $mensagem; ?><td></tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center">
                           <br>
                            <label class="campos" style="">Digite uma mensagem de resposta</label></td><tr></br>
                    <tr>
                        <td colspan="2">
                           <br>
                            <textarea style="font-align:justify;width:490px" tabindex="1" id="mensagem" name="mensagem" cols="65" rows="7" maxlength="1000" autofocus>
                            </textarea></td><tr>
                    <tr>
                        <td colspan="2">
                            <p class="dois" style="">OBS: O Pet'sLover não divulga e-mail e dados animais de seus clientes.</br>
                                No entando, o que for digitado no campo de mensagens será enviado ao  </br>
                                pretendente sem interferência do Pet'sLover. Envio de dado pessoal:   </br>
                                e-mail, telefone e endereço, neste espaço, ocorre sob responsabilidade</br>
                                do usuário. Evite a troca deste tipo de informação no primeiro contato.
                                </p></td></tr><br>
                    <tr>
                        <td colspan="2" align="center">
                           <br><br>      
                            <button align="center" id="env" name="enviar" tabindex="2" class="btsMsgs" value="<?php echo $cdPet; ?>">Enviar Resposta</button></td></tr>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <?php include './includes/footer.php'; ?>

