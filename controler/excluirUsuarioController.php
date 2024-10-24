<?php

require_once '../model/DTO/UsuarioDTO.php';
require_once '../model/DAO/UsuarioDAO.php';

error_reporting(0);

$idUsu = $_GET['idUsu'];

$usuarioDAO = new UsuarioDAO();

$sucesso = $usuarioDAO->excluirUsuario($idUsu);


if($perfilUsu !="Administrador"){
  $usuarioDAO = new UsuarioDAO();
  $sucesso = $usuarioDAO->excluirUsuario($idUsu);

  header("Location: ../view/listarUsuarios.php");
}else{
  echo "Operação Invalida";
}


//header("location: ../view/listarUsuarios.php?msg=$msg");
