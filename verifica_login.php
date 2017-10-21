<?php
session_start();

require_once("conexao.php");

//Verifica se a origem da requisicao é do mesmo da aplicação - MEDIDA DE SEGURANçA 1
if (isset($_SESSION['HTTP_REFERER']) && $_SESSION['HTTP_REFERER'] != "http://www.petslover.com.br/login.php"):
    $retorno = array('codigo' => 0, 'mensagem' => 'Origem da requisição não autorizada');
    echo json_encode($retorno);
    exit();
endif;

//Abre conexao com o banco de dados
$con = abreConexao();

//Recebe os dados do formulario
$login = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

//Verifica se o e-mail e a senha foram preenchidos
if (empty($login)):
    $retorno = array('codigo' => 0, 'mensagem' => 'Preencha seu e-mail');
    echo json_encode($retorno);
    exit();
endif;

if (empty($senha)):
    $retorno = array('codigo' => 0, 'mensagem' => 'Preencha sua senha!');
    echo json_encode($retorno);
    exit();
endif;

//Verifica se o formato de e-mail e valido.
if (!filter_var($login, FILTER_VALIDATE_EMAIL)):
    $retorno = array('codigo' => 0, 'mensagem' => 'Formato de e-mail inválido');
    echo json_encode($retorno);
    exit();
endif;

//Valida os dados do usuario com o banco.
$sql = 'SELECT u.cdUsuario, u.nmUsuario, l.emailUsuario, l.nmSenha FROM USUARIO u, LOGIN l WHERE u.cdUsuario = l.cdUsuario AND l.emailUsuario = ? LIMIT 1';
$stmt = mysqli_prepare($con, $sql);
if ($stmt):
    mysqli_stmt_bind_param($stmt, "s", $login);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $cdUsuario, $nmUsuario, $emailUsuario, $nmSenha);
    while (mysqli_stmt_fetch($stmt)) {
        $retorno = array(
            "cdUsuario" => $cdUsuario,
            "nmUsuario" => $nmUsuario,
            "emailUsuario" => $emailUsuario,
            "nmSenha" => $nmSenha
        );
    }
endif;

//Valida a senha utilizando o Hash MD5
if(!empty($retorno) && md5($senha) == $retorno["nmSenha"]):
    $_SESSION['cdUsuario'] = $retorno["cdUsuario"];
    $_SESSION['nmUsuario'] = $retorno["nmUsuario"];
    $_SESSION['emailUsuario'] = $retorno["emailUsuario"];
    $_SESSION['logado'] = 'SIM';
else:
    $_SESSION['logado'] = 'NAO';
endif;

//Se logado retorna mensagem 1, senao retorna mensagem de erro.
if ($_SESSION['logado'] == 'SIM'):
    $retorno = array('codigo' => 1, 'mensagem' => 'Logado com sucesso!');
    echo json_encode($retorno);
    exit();
else:
    $retorno = array('codigo' => '0', 'mensagem' => 'Por favor digite um e-mail ou senha válidos!');
    echo json_encode($retorno);
    exit();
endif;
  
