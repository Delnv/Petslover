<?php
include("includes/tags_inicio.php");
include("includes/header.php");
include ("conexao.php");

//Verifica se o usuario esta logado, caso contrario redirecionara para a pagina principal
if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'NAO') {
    header("Location: index.php");
    exit();
}
$conexao = abreConexao();

//Recebe o codigo do usuario logado
$cdUsuario = $_SESSION["cdUsuario"];
//Aqui ira selecionar quantas mensagens existem para aquele pretendente
//cd_destinario  o pet que recebe a mensagem.
$sql1 = "SELECT cdPet FROM PET WHERE cdUsuario=".$cdUsuario;
if(!$conexao){
    die("Erro de conexão ".mysqli_errno($conexao));
}else{
    $resultado = mysqli_query($conexao, $sql1);
    while($row = mysqli_fetch_array($resultado)){
        $cdPet = $row['cdPet'];
    }
}
$sql = "SELECT m.descMensagem, p.nmPet, m.cdMensagem 
            FROM MENSAGEM m, PET p 
            WHERE m.cdRemetente = p.cdPet AND m.cdDestinatario=" . $cdPet;

if (!$conexao) {
    die("Erro de conexão com o banco" . mysqli_errno($conexao));
} else {
    $result = mysqli_query($conexao, $sql);
}
?>
<section>
    <div align="center" class="geral clearfix" style="">
        </br></br><h3 align="center">CAIXA DE ENTRADA</h3></br></br>
        <form align="center" action="editar_mensagem.php" method="POST">
            <input type="submit" id="excluir" name="excAll" value="Excluir Selecionadas" class="btsMsgs"/>
            <!--<input type="submit" id="spam" name="spam" value="Denunciar Abuso"/>-->
	<table align="center">
		<tr>
  		<td colspan="2" align="center">
            </br></br><div id="mens-group">
                <?php
                if (mysqli_num_rows($result) <= 0) {
                    $mensagem = "Caixa de mensagens vazia</br>
                    Encontre novos pretendentes!";?><a href="galeria.php" style="color:blue; text-decoration:none"/>
                

                <div id="mens-itself"><?php echo $mensagem; ?></div>
                <?php }else{
                $i = 0;
                while ($linha = mysqli_fetch_assoc($result)) {
                    $row = $linha["cdMensagem"];
                    ?>
                    <div class="mens-itself" max-width="40%">

                        <input type="checkbox" id="check" name="checkm[]" value=<?php echo $row; ?>>
                        <button id="lixeira" class="btsMsgs" name="excluir" value=<?php echo $row; ?>>Excluir</button>
                        <a href="ver_mensagem.php?men=<?php echo $row; ?>" class="mens" name="mensagem" onclick="javascript : location.href='ver_mensagem.php'"><?php echo   "&nbsp &nbsp &nbsp  ".$linha["nm_pet"] .
              "&nbsp"."<b style='font-size:1.6em'>.</b>"."&nbsp" .$linha["descMensagem"] . "&nbsp &nbsp &nbsp";
                    ?></a>
                    </div>
                    <?php
                    $i++;
                }}
                ?>
            </div>
		</td>
		 <td></td>
		</tr>
	  </table>
        </form>
    </div>
</section>


<?php include("includes/footer.php");


