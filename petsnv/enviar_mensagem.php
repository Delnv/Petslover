<?php
//session_start(); ja iniciada na pag verifica_sessao.php
include 'verifica_sessao.php';
include 'conexao.php';
include_once 'includes/functions.php';

$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';
//Codigo do destinatario
$cdDestinatario = isset($_POST['cdpet']) ? $_POST['cdpet'] : '';
$descMsg= isset($_POST['descmsg']) ? $_POST['descmsg'] : '';

$conexao = abreConexao();
$sql = "SELECT p.cdPet, p.nmPet, m.descMensagem FROM PET p, MENSAGEM m WHERE p.cdPet = m.cdPet AND cdUsuario =".$_SESSION['cdUsuario'];
if(!$conexao){
    die("Erro na conexão ".mysqli_errno($conexao));
}else{
    $result = mysqli_query($conexao, $sql);
    while($linha = mysqli_fetch_array($result)){
        $cdRemetente = $linha['cdPet'];
        $nmPet = $linha['nmPet'];
        $descMsg = $linha['descMensagem'];
    }
}

$standMsg = $nmPet." está interessado(a) em você, mande uma mensagem para ele(a)!";

if($mensagem){
    insertMsgSQL($conexao, $mensagem, $standMsg, $cdDestinatario, $cdRemetente, $descMsg);
    $retorno = array("codigo" => true, "mensagem" => "Mensagem enviada com sucesso!");
    echo json_encode($retorno);
    mysqli_close($conexao);
    exit();
}else{
    $retorno = array("codigo" => false, "mensagem" => "Houve um erro e sua mensagem não foi enviada!");
    echo json_encode($retorno);
    mysqli_close($conexao);
    exit();
}
