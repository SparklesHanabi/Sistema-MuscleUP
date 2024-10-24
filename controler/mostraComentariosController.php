<?php

require_once "../model/DAO/ComentarioDAO.php";

    //chamar o metodo listarTodosComentarios

    $comentarioDAO = new ComentarioDAO();

    $todos = $comentarioDAO->listarTodosComentarios();

    //var_dump($todos);

?>