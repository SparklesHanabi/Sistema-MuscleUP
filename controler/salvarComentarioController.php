<?php

require_once '../model/DTO/ComentarioDTO.php';
require_once '../model/DAO/ComentarioDAO.PHP';


//print_r($_POST);
//exit;

if (empty($_POST["estrelas"])) {
    $estrelas = '1';
} else {
    $estrelas = $_POST["estrelas"];
}
$comentarioPro = $_POST["comentarioPro"];
$usuario_idUsu = $_POST["usuario_idUsu"];
$produto_idPro = $_POST["produto_idPro"];
$situacaoComentarioPro = "Ativo";

//var_dump($comentarioPro);

//montar o objeto

$comentarioDTO = new ComentarioDTO();

$comentarioDTO->setUsuario_idUsu($usuario_idUsu);
$comentarioDTO->setProduto_idPro($produto_idPro);
$comentarioDTO->setEstrelas($estrelas);
$comentarioDTO->setComentarioPro($comentarioPro);
$comentarioDTO->setSituacaoComentarioPro($situacaoComentarioPro);
//echo "<pre>";

//var_dump($comentarioDTO);

$comentarioDAO = new ComentarioDAO();

$sucesso = $comentarioDAO->salvarComentario($comentarioDTO);

if ($sucesso) {
    header('Location:../view/mainpage.php?msg=Comentário Cadstrado com Sucesso!');
}
