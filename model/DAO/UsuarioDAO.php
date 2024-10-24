<?php
require_once 'Conexao.php';
require_once '../model/DTO/UsuarioDTO.php';
class UsuarioDAO
{
    public $pdo = null;

    public function __construct()
    {
        $this->pdo = Conexao::getInstance();
    }
    public function salvarUsuario(UsuarioDTO $usuarioDTO)
    {

        try {
            $nomeUsu = $usuarioDTO->getNomeUsu();
            $senhaUsu = $usuarioDTO->getSenhaUsu();
            $telefoneUsu = $usuarioDTO->getTelefoneUsu();
            $emailUsu = $usuarioDTO->getEmailUsu();
            $perfilUsu = $usuarioDTO->getPerfilUsu();
            $situacaoUsu = $usuarioDTO->getsituacaoUsu();


            $sql = "INSERT INTO usuario (nomeUsu, senhaUsu, telefoneUsu, emailUsu, perfilUsu, situacaoUsu) 
                    VALUES ('{$nomeUsu}','{$senhaUsu}','{$telefoneUsu}','{$emailUsu}','{$perfilUsu}','{$situacaoUsu}');";

            $stmt = $this->pdo->prepare($sql);

            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function validarLogin($emailUsu, $senhaUsu)
    {
        //echo "{$emailUsu}";
        //echo "{$senhaUsu}";
        try {
            $sql = "SELECT * FROM usuario WHERE emailUsu = '{$emailUsu}' AND
             senhaUsu = '{$senhaUsu}'; ";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    //LISTAR USUÁRIOS
    public function listarUsuarios()
    {
        try {
            $sql = "SELECT * FROM usuario ";
            $stmt = $this->pdo->prepare($sql);


            $stmt->execute();

            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    //excluir usuários
    public function excluirUsuario($idUsuario)
    {
        try {
            $sql = "DELETE FROM usuario
            WHERE idUsu = ?";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idUsuario);


            $retorno = $stmt->execute();

            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    //ALTERAR
    public function alterarUsuario(UsuarioDTO $usuarioDTO)
    {

        try {

            $idUsu = $usuarioDTO->getIdUsu();
            $nomeUsu = $usuarioDTO->getNomeUsu();
            $telefoneUsu = $usuarioDTO->getTelefoneUsu();
            $emailUsu = $usuarioDTO->getEmailUsu();
            $senhaUsu = $usuarioDTO->getSenhaUsu();
            $perfilUsu = $usuarioDTO->getPerfilUsu();
            $situacaoUsu = $usuarioDTO->getSituacaoUsu();

            $sql = "UPDATE `usuario` SET `nomeUsu`='{$nomeUsu}',`telefoneUsu`='{$telefoneUsu}',
               `emailUsu`='{$emailUsu}',`senhaUsu`='{$senhaUsu}',`perfilUsu`='{$perfilUsu}',
               `situacaoUsu`='{$situacaoUsu}'
            WHERE idUsu= '{$idUsu}';";
            $stmt = $this->pdo->prepare($sql);

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
    public function pesquisarUsuarioPorId($idUsuario)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE idUsu = {$idUsuario}; ";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
