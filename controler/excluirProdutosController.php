
<?php

require_once '../model/DTO/ProdutoDTO.php';
require_once '../model/DAO/ProdutoDAO.php';

error_reporting(0);

  $idPro = $_GET['idPro'];

  $produtoDAO = new ProdutoDAO();
  
  $sucesso = $produtoDAO->excluirProduto($idPro);

  if($perfilUsu !="Administrador"){
    $usuarioDAO = new UsuarioDAO();
    $sucesso = $usuarioDAO->excluirUsuario($idUsu);

    header("Location: ../view/listarProdutos.php");
  }else{
    echo "Operação Invalida";
  }


?>