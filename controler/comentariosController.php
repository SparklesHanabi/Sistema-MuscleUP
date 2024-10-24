<?php
require_once "../model/DAO/ComentarioDAO.php";
require_once "../model/DTO/ComentarioDTO.php";

if(isset($_GET['func'])){
    $func = $_GET['func'];
    switch ($func) {
        case 'ex':
            $idCom = $_GET['idCom'];
            $comentarioDAO = new  ComentarioDAO();
            $comentarioDAO->excluirComentario($idCom);
            break;
        case 'in':
            $comentarioDTO = new  ComentarioDTO();
            if (empty($_POST["estrelas"])) {
                $comentarioDTO->setEstrelas('1');
            } else {
                $comentarioDTO->setEstrelas($_POST["estrelas"]);
            }
            $comentarioDTO->setComentarioPro($_POST["comentarioPro"]);
            $comentarioDTO->setUsuario_idUsu($_POST["usuario_idUsu"]);
            $comentarioDTO->setProduto_idPro($_POST["produto_idPro"]);
            $comentarioDTO->setSituacaoComentarioPro("Ativo");
            $comentarioDAO->salvarComentario($comentarioDTO);
            break;
        case 'list':
            $comentarioDAO->listarTodosComentarios();
            break;
        case 'listidpro':
                $idPro = $_GET['idPro'];
                $comentarioDAO->listarTodosComentariosPorIdPro($idPro);
                break;
        default:
            break;
    }
}



