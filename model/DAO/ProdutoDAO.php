<?php
require_once 'Conexao.php';
require_once '../model/DTO/ProdutoDTO.php';
class ProdutoDAO
{
    public $pdo = null;

    public function __construct()
    {
        $this->pdo = Conexao::getInstance();
    }
    public function salvarProduto(ProdutoDTO $produtoDTO)
    {

        try {
            $sql = "INSERT INTO `produto`( `nomePro`, `valorPro`, `imagemPro`, `marcaPro`) 
            VALUES (?,?,?,?)";

            $stmt = $this->pdo->prepare($sql);

            $nomePro = $produtoDTO->getNomePro();
            $valorPro = $produtoDTO->getValorPro();
            $valorPro = str_replace(',','.',$valorPro);
            $imagemPro = $produtoDTO->getImagemPro();
            $marcaPro = $produtoDTO->getMarcaPro();
 
            $stmt->bindValue(1, $nomePro);
            $stmt->bindValue(2, $valorPro);
            $stmt->bindValue(3, $imagemPro);
            $stmt->bindValue(4, $marcaPro);
            //print_r($stmt);
            //exit;
            $retorno = $stmt->execute();
            return $retorno;

        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }

    }

    public function pesquisarProdutoPor($idPro) {
        //echo "{$emailUsu}";
        //echo "{$senhaUsu}";
        try {
            $sql = "SELECT * FROM produto WHERE idPro = '{$idPro}'; ";
            $stmt = $this->pdo->prepare($sql);
            
            $stmt->execute();
              $retorno = $stmt->fetch(PDO::FETCH_ASSOC); 
            return $retorno;
         } catch (PDOException $exc) {
            echo $exc->getMessage();  
         }
      }

      public function listarProduto() {
        //echo "{$emailUsu}";
        //echo "{$senhaUsu}";
        try {
            $sql = "SELECT * FROM `produto` ORDER BY idPro; ";
            $stmt = $this->pdo->prepare($sql);
            
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $retorno;
         } catch (PDOException $exc) {
            echo $exc->getMessage();  
         }
      }
     
      //EXCLUIR PRODUTOS
     public function excluirProduto($idPro) {
        try {
            $sql = "DELETE FROM produto
            WHERE idPro = ?";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idPro);

            
            $retorno = $stmt->execute();
           
            return $retorno;
         } catch (PDOException $exc) {
            echo $exc->getMessage();
            
         }
      }

}

?>