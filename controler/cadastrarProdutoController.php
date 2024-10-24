<?php
require_once '../model/DTO/ProdutoDTO.php';
require_once '../model/DAO/ProdutoDAO.php';

print_r($_POST);
echo "<hr>";
print_r($_FILES);


//receber os dados do formulario
$nomePro = strip_tags($_POST["nomePro"]);
$valorPro = strip_tags($_POST["valorPro"]);
//UPLOAD DA IMAGEM
//upload da imagem da foto
$Arquivo = "";

if(isset($_FILES["imagemPro"])){
  $Arquivo = $_FILES["imagemPro"]["name"];
  $pastaDestino = "../uploadArq";  //pasta criada no Projeto para upload
  $Arquivo = uniqid()."_".$Arquivo; //novo nome do arquivo
  $arqDestino = $pastaDestino.'/'.$Arquivo;
  move_uploaded_file($_FILES["imagemPro"]["tmp_name"],$arqDestino);
}

$imagemPro = $Arquivo;

//criar o objeto DTO para armazenar os dados do formulario
$produtoDTO = new ProdutoDTO();

$produtoDTO->setNomePro($nomePro);
$produtoDTO->setValorPro($valorPro);
$produtoDTO->setImagemPro($imagemPro);
$produtoDTO->setMarcaPro($marcaPro);

//echo "<pre>";
//var_dump($usuarioDTO);
//echo "</pre>";


//criar o objeto que gravará os dados no banco
$produtoDAO = new ProdutoDAO();

$sucesso = $produtoDAO->salvarProduto($produtoDTO);

if ($sucesso) {
    $msg = "Cadastro realizado";
   
} else {
    $msg = "Cadastro não realizado";
}
header("location:../view/mainpage.php?msg=$msg");


?>