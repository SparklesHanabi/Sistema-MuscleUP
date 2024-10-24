<?php
require_once '../model/DTO/usuarioDTO.php';
require_once '../model/DAO/usuarioDAO.php';

$idUsu =  $_POST["idUsu"];
$nomeUsu =  $_POST["nomeUsu"];
$telefoneUsu = $_POST["telefoneUsu"];
$emailUsu =  $_POST["emailUsu"];
$situacaoUsu =  $_POST["situacaoUsu"];
$perfilUsu =  $_POST["perfilUsu"];

$senhaUsuOriginal =  $_POST["senhaUsuOriginal"];
$senhaUsu =  $_POST["senhaUsu"];

if (empty($senhaUsu)) {
  $senhaUsu = $senhaUsuOriginal;
} else {
  $senhaUsu =  MD5($_POST["senhaUsu"]);
}


$usuarioDTO = new UsuarioDTO;
$usuarioDTO->setIdUsu($idUsu);
$usuarioDTO->setNomeUsu($nomeUsu);
$usuarioDTO->setEmailUsu($emailUsu);
$usuarioDTO->setTelefoneUsu($telefoneUsu);
$usuarioDTO->setSenhaUsu($senhaUsu);
$usuarioDTO->setPerfilUsu($perfilUsu);
$usuarioDTO->setSituacaoUsu($situacaoUsu);
//var_dump($usuarioDTO);

$usuarioDAO = new UsuarioDAO();

$sucesso = $usuarioDAO->alterarUsuario($usuarioDTO);

if ($sucesso) {
  $msg = "Dados alterados com sucesso.";
} else {
  $msg = "Aconteceu um problema na alteração de dados." . $sucesso;
}

header("location:../pagina-adm/opcao.php?msg=$msg");
