<?php

require_once '../model/DTO/ProdutoDTO.php';
require_once '../model/DAO/ProdutoDAO.php';

$produtoDAO = new ProdutoDAO();

$todos = $produtoDAO->listarProduto();

// echo '<pre>';
// var_dump($todos);
