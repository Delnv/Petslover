<?php
session_start();
include ("conexao.php");
include ("verifica_sessao.php");
include ("includes/functions.php");

//Verifica se a origem da requisição é da mesma do site - MEDIDA DE SEGURANÇA.
if (isset($_SESSION["HTTP_REFERER"]) && $_SESSION["HTTP_REFERER"] != "http://localhost/petsloverv10.3/mensagem.php"):
    $retorno = array('codigo' => 0, 'mensagem' => 'Origem da requisição não autorizada.');
    echo json_encode($retorno);
    header("Location: index.php");
    exit();
endif;

$conexao = abreConexao();

$excAll = isset($_POST['excAll']) ? $_POST['excAll'] : '';
$denunciar = isset($_POST['spam']) ? $_POST['spam'] : '';
$excluir = isset($_POST['excluir']) ? $_POST['excluir'] : '';
$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';
$arr = isset($_POST['checkm']) ? $_POST['checkm'] : '';
$cdPet = isset($_POST['enviar']) ? $_POST['enviar'] : '';

if(isset($_SESSION['logado']) && $_SESSION['logado'] == 'SIM'){
    $sql = "SELECT cdPet FROM PET WHERE cdUsuario=".$_SESSION['cdUsuario'];
    $result = mysqli_query($conexao, $sql);
    while($row = mysqli_fetch_array($result)){
        $cd = $row['cdPet'];
    }
}


/* Excluir selecionadas:
  Pega o codigo da mensagem atraves do checkbox selecionado e exclui a mensagem. */
if ($excAll):
    if ($arr):
        if (!$conexao):
            die("Erro de conexão " . mysqli_errno($conexao));
        else:
            foreach ($arr as $i):
                deleteMsgSQL($conexao, $i);
            endforeach;
            header("Location: mensagem.php");
            exit();
        endif;
    else:
        header("Location: mensagem.php");
        exit();
    endif;
endif;

//Excluir:
//Exclui a mensagem atraves do botao excluir
if ($excluir) {
    if (!$conexao) {
        die("Erro de conexão " . mysqli_errno($conexao));
    } else {
        deleteMsgSQL($conexao, $excluir);
        header("Location: mensagem.php");
        exit();
    }
}

//Grava a mensagem de resposta no banco.
if ($mensagem) {
    if (!$conexao) {
        die("Erro de conexão " . mysqli_errno($conexao));
    } else {
        $assunto = "Resposta";
        insertMsgSQL($conexao, $descricao, $mensagem, $cdPet, $cd);
    echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='mensagem.php';</script>";
        exit();
    }
}
