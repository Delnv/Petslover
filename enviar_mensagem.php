<?php
session_start();
include 'verifica_sessao.php';
include 'conexao.php';
include_once 'includes/functions.php';

$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';
//Codigo do destinatario
$cdDestinatario = isset($_POST['cdpet']) ? $_POST['cdpet'] : '';

$conexao = abreConexao();
$sql = "SELECT cdPet, nmPet FROM PET WHERE cdUsuario =".$_SESSION['cdUsuario'];
if(!$conexao){
    die("Erro na conexão ".mysqli_errno($conexao));
}else{
    $result = mysqli_query($conexao, $sql);
    while($linha = mysqli_fetch_array($result)){
        $cdRemetente = $linha['cdPet'];
        $nmPet = $linha['nmPet'];
    }
}

$standMsg = $nmPet." está interessado(a) em você, mande uma mensagem para ele(a)!";

if($mensagem){
    insertMsgSQL($conexao, $mensagem, $standMsg, $cdDestinatario, $cdRemetente);
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
