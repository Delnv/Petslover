<?php
session_start();

require_once("conexao.php");
require_once("includes/functions.php");
require_once ("includes/tratarErro.php");

//Verifica se o usuario esta logado - se estiver manda para a pagina principal
if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'SIM'):
    header("Location: index.php");
endif;

//Recebe os dados enviados
$nmpet = isset($_POST["tnmpet"]) ? $_POST["tnmpet"] : '';

$raca = isset($_POST["traca"]) ? $_POST['traca'] : '';
$sexo = isset($_POST["sexo"]) ? $_POST['sexo'] : '';
$porte = isset($_POST["selporte"]) ? $_POST['selporte'] : '';
$faixa = isset($_POST["dtnasc"]) ? $_POST['dtnasc'] : '';
$tipo = isset($_POST["tipo"]) ? $_POST['tipo'] : '';
$nmusuario = isset($_POST["tnmprot"]) ? $_POST['tnmprot'] : '';
$cep = isset($_POST["tcep"]) ? $_POST['tcep'] : '';
$email = isset($_POST["temail"]) ? $_POST['temail'] : '';
$desc = isset($_POST["asobre"]) ? $_POST['asobre'] : '';
$senha = isset($_POST["tsenha"]) ? ($_POST['tsenha']) : '';
$senhaCrip = md5($senha);



//Abre a conexão com o banco.    
$con = abreConexao();

//Valida formato de e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $retorno = array('codigo' => 0, 'mensagem' => 'Formato de e-mail inválido');
    echo json_encode($retorno);
    exit();
}

//Valida os dados de e-mail com o banco.
$query = "SELECT cdUsuario FROM LOGIN WHERE nmUsuario='" . $email . "'";
if (!$con) {
    die("Erro de conexão com o banco: " . mysqli_error($con));
} else {
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $retorno = array('codigo' => 0, 'mensagem' => 'E-mail já cadastrado, por favor insira outro e-mail');
        echo json_encode($retorno);
        exit();
    }
}

//Valida a imagem
$imgArray = "fileToUpload"; //Pega os nomes dos input files
$imgTrat = isImage($imgArray);
if (!$imgTrat) {
    $retorno = array('codigo' => 0, 'mensagem' => 'O arquivo não é válido');
    echo json_encode($retorno);
    exit();
}


//Variáveis de confirmação.
$ok = FALSE;
$ok2 = FALSE;
$ok3 = FALSE;
$count = FALSE;

//Envia os dados para o banco.
if (mysqli_connect_errno()) {
    echo "Erro de conexão com o banco: " . mysqli_connect_error();
} else {
    insertUsuarioSQL($con, $nmusuario, $cep);
    $cdUsuario = mysqli_insert_id($con);
    insertPetSQL($con, $nmpet, $raca, $sexo, $faixa, $tipo, $porte, $desc, $cdUsuario);
    $cdPet = mysqli_insert_id($con);
    insertLoginSQL($con, $email, $senhaCrip, $cdUsuario);
    mysqli_close($con);
    $ok = TRUE;
}

$img = moveImage($imgArray);
if ($img) {
    $conn = abreConexao();
    if (mysqli_connect_errno()) {
        echo "Erro na  conexão: " . mysqli_connect_error();
    } else {
        insertImgSQL($conn, $img, $cdPet);
        mysqli_close($conn);
        $ok2 = TRUE;
    }
} else {
    $ok3 = TRUE;
    $count = TRUE;
}

//Grava a imagem padrao no banco, caso nao hajam imagens gravadas
if ($count == TRUE) {
    $conexao = abreConexao();
    $imgStand = "padrao.jpg";
    insertImgSQL($conexao, $imgStand, $cdPet);
    mysqli_close($conexao);
    $ok3 = TRUE;
}

//Envia a mensagem
if ($ok == TRUE && ($ok2 || $ok3 == TRUE)) {
    echo "<script>alert('Cadastrado com sucesso!'); window.location.href='login.php';</script>";
    exit();
} else {
    echo "<script>alert('Um erro ocorreu! Por favor, contate o administrador');</script>";
    exit();
}
mysqli_close($conn);
