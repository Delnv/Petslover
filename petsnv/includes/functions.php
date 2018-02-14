<?php
require_once("tratarErro.php");

function moveImage($imgName) {
    $fileTmp = $_FILES[$imgName]["tmp_name"];
    $extension = isImage($imgName);
    $dir = "imagem/";
    $new_name = md5(uniqid(time())) . "." . $extension;
    if (move_uploaded_file($fileTmp, $dir . $new_name)) {
        return $new_name;
    }
}

//$cdPet = ultimo id da conexão, para relacionar esta imagem com o ultimo pet.
function insertImgSQL($connection, $img,  $cdPet) {
    $sql = "INSERT INTO IMAGEM_PET (cdImagem, imgPet1, cdPet) VALUES ('', '$img', ' $cdPet')";
    mysqli_query($connection, $sql);
}

function insertUsuarioSQL($connection, $nome, $cep) {
    $sql = "INSERT INTO USUARIO (cdUsuario, nmUsuario, cdCep) VALUES ('', '$nome', '$cep' )";
    mysqli_query($connection, $sql);
}

function insertPetSQL($connection, $nomePet, $sexo, $faixa, $tipo, $porte, $desc, $cdUsuario) {
    $query = "INSERT INTO PET (cdPet, nmPet, icSexoPet, nmFaixaEtariaPet, nmTipoPet, nmPortePet, descPet, cdUsuario) VALUES ('', '$nomePet', '$sexo', '$faixa', '$tipo', '$porte', '$desc', $cdUsuario)";
    mysqli_query($connection, $query);
}

function insertLoginSQL($connection, $email, $senha, $cdUsuario) {
    $query = "INSERT INTO LOGIN (emailUsuario, nmSenha, cdUsuario) VALUES ('$email', '$senha', $cdUsuario)";
    mysqli_query($connection, $query);
}

function insertMsgSQL($connection, $descricao, $mensagem, $cdDestinatario, $cdRemetente){
    $query = "INSERT INTO MENSAGEM (cdMensagem, descMensagem, statusMensagem, cdDestinatario, cdRemetente) VALUES ('', '$descricao', '$mensagem',  '$cdDestinatario', '$cdRemetente')";
    mysqli_query($connection, $query);
}

function deleteMsgSQL($connection, $cdMsg){
    $query = "DELETE FROM MENSAGEM WHERE cdMensagem=".$cdMsg;
    mysqli_query($connection, $query);
}
