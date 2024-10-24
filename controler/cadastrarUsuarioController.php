<?php
session_start();

$perfilUsuLogin = "";
if (isset($_SESSION["idUsu"])) {
    $perfilUsuLogin = $_SESSION["perfilUsu"];
}

require_once '../model/DAO/UsuarioDAO.php';
require_once '../model/DTO/UsuarioDTO.php';


//////////////////////////////////////
//receber os dados do formulario
$nomeUsu = strip_tags($_POST["nomeUsu"]);
$emailUsu = strip_tags($_POST["emailUsu"]);
$senhaUsu = MD5($_POST["senhaUsu"]);
$telefoneUsu = $_POST["telefoneUsu"];
$situacaoUsu =  $_POST["situacaoUsu"];
$perfilUsu =  $_POST["perfilUsu"];

//print_r($_POST);


//criar o objeto DTO para armazenar os dados do formulario
$usuarioDTO = new UsuarioDTO();

$usuarioDTO->setNomeUsu($nomeUsu);
$usuarioDTO->setEmailUsu($emailUsu);
$usuarioDTO->setTelefoneUsu($telefoneUsu);
$usuarioDTO->setSenhaUsu($senhaUsu);
$usuarioDTO->setSituacaoUsu($situacaoUsu);
$usuarioDTO->setPerfilUsu($perfilUsu);
//echo "<pre>";
//var_dump($usuarioDTO);
//echo "</pre>";


//criar o objeto que gravará os dados no banco
$usuarioDAO = new UsuarioDAO();

$sucesso = $usuarioDAO->salvarUsuario($usuarioDTO);

if ($sucesso) {
    $msg = "Cadastro realizado";
    if ($perfilUsuLogin == "Administrador") {
        header("location:../view/mainpage.php?msg=$msg");
    } else {
        header("location:../view/login.php?msg=$msg");
    }
} else {
    $msg = "Cadastro não realizado";
}
