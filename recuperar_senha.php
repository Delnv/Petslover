<?php
require_once("conexao.php");

$con=abreConexao();

if(isset($_GET['codigo'])){
	$codigo = $_GET['codigo'];
	$email_codigo = base64_decode($codigo);

	$selecionar = mysqli_query($con, "SELECT * FROM CODIGOS WHERE codigo = '".$codigo."' AND data > NOW()");
	if(mysqli_num_rows($selecionar) >= 1){
		if(isset($_POST['acao']) && $_POST['acao'] == 'mudar'){
			$nova_senha = md5($_POST['novasenha']);

			$atualizar = mysqli_query($con, "UPDATE LOGIN SET nmSenha = '".$nova_senha."' WHERE emailUsuario = '".$email_codigo."'");
			if($atualizar){
				$mudar = mysqli_query($con, "DELETE FROM CODIGOS WHERE codigo = '".$codigo."'");
				echo"<script> alert('A senha foi modificada com sucesso');</script>";
                                 header("Location: index.php");
			}
		}
?>

<h1>Digite a senha nova</h1>
<form  action="" method="post" enctype="multipart/form-data">
<input type="password" name="novasenha" value="" />
<input type="hidden" name="acao" value="mudar" />
<input type="submit" value="Mudar Senha" />


<?php
	}else{
		echo '<h1 style='color: red'>Desculpe mas este link já expirou!</h1>';
	}

}

?>
</form>
