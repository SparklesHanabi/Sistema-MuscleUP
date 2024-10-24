<?php

require_once "Conexao.php";
require_once "../model/DTO/ComentarioDTO.php";

class ComentarioDAO
{

    public $pdo = null;
    public function __construct()
    {
        $this->pdo = Conexao::getInstance();
    }
    // INSERT
    public function salvarComentario(ComentarioDTO $comentarioDTO)
    {

        try {
            $sql = "INSERT INTO comentario(usuario_idUsu, produto_idPro, estrelas,comentarioPro, situacaoComentarioPro) 
            VALUES (?,?,?,?,?);";
            $stmt = $this->pdo->prepare($sql);

            $usuario_idUsu = $comentarioDTO->getUsuario_idUsu();
            $produto_idPro = $comentarioDTO->getProduto_idPro();
            $estrelas = $comentarioDTO->getEstrelas();
            $comentarioPro = $comentarioDTO->getComentarioPro();
            $situacaoComentarioPro = $comentarioDTO->getSituacaoComentarioPro();

            //var_dump($dtNascimentoUsu);

            $stmt->bindValue(1, $usuario_idUsu);
            $stmt->bindValue(2, $produto_idPro);
            $stmt->bindValue(3, $estrelas);
            $stmt->bindValue(4, $comentarioPro);
            $stmt->bindValue(5, $situacaoComentarioPro);

            $retorno = $stmt->execute();
            //  var_dump($retorno);

            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


    //LISTAR COMENTARIOS
    public function listarTodosComentarios()
    {
        try {
            $sql = "SELECT * FROM comentario 
            INNER JOIN usuario ON usuario_idUsu = idUsu
            INNER JOIN produto ON produto_idPro = idPro
            WHERE situacaoComentarioPro='Ativo' 
            ORDER BY idCom ASC;";
            $stmt = $this->pdo->prepare($sql);


            $stmt->execute();

            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    //MOSTRAR TODOS OS COMENTÁRIOS DE UM PRODUTO (poridPro)
    public function listarTodosComentariosPorIdPro($idPro)
    {
        try {
            //$sql = "SELECT * FROM comentario WHERE 
            //produto_idPro = '{$idPro}' AND situacaoComentarioPro='Ativo' 
            //ORDER BY idCom DESC;";

$sql = "SELECT u.nomeUsu, c.comentarioPro, c.estrelas 
FROM comentario AS c INNER JOIN usuario as u ON c.usuario_idUsu = u.idUsu 
WHERE c.produto_idPro = '{$idPro}' AND c.situacaoComentarioPro='Ativo'
ORDER BY idCom DESC;";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    //Calcula a Média de Estreilas de um produto
    public function calcularMediaEstrelasPorIdPro($idPro)
    {
        try {
            $sql = "SELECT avg(estrelas) 'MediaEstrelas' FROM comentario WHERE 
        produto_idPro = '{$idPro}' AND situacaoComentarioPro='Ativo' ";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


    //excluir usuários
    public function excluirComentario($idCom)
    {
        try {
            $sql = "DELETE FROM comentario
                WHERE idCom = ?";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idCom);


            $retorno = $stmt->execute();

            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


    public function alterarComentario(comentarioDTO $comentariosDTO)
    {

        try {
            $sql = "UPDATE comentario1 SET comentarioPro=?
            WHERE idCom= ?";
            $stmt = $this->pdo->prepare($sql);

            $idCom = $comentariosDTO->getIdcom();
            $comentarioPro = $comentariosDTO->getComentarioPro();



            $stmt->bindValue(1, $idCom);
            $stmt->bindValue(2, $comentarioPro);

            $retorno =  $stmt->execute();

            if ($retorno) {
                echo "Sucesso";
            } else {
                echo "erro";
            }

            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    //PesquisarUsuarioPorId
    public function pesquisarComentarioPorId($idCom)
    {
        try {
            $sql = "SELECT * FROM Comentarios WHERE idCom = {$idCom}; ";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
