<?php
    require_once '../model/DAO/ComentarioDAO.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem Comentários</title>
</head>

<body>
    <h2>Produtos Comentários</h2>
    <?php
        $comentarioDAO = new ComentarioDAO();
        $comentarios = $comentarioDAO->listarTodosComentarios();
        //var_dump($comentarios);die;
    ?>

    <table border="2">
            <tr style="background-color:#00BFFF">
                <th>ID</th>
                <th>NOME USUARIO</th>
                <th>PRODUTO</th>
                <th>COMENTARIO</th>
                <th>ESTRELAS</th>
                <th>Excluir</th>
            </tr>
            <?php
            $i = 0;
            foreach ($comentarios as $t) {
                if ($i == 1) {
                    echo '<tr style="background-color:#ADD8E6">';
                    $i = 0;
                } else {
                    echo '<tr style="background-color:#F0F8FF">';
                    $i++;
                }   ?>
                <!-- Exibir o nome do usuário -->
                <td><?php echo $t['idCom']; ?></td>

                <td><?php echo $t['nomeUsu']; ?></td>
                </td>

                <td><?php echo $t['nomePro']; ?></td>

                <td><?php echo $t['comentarioPro']; ?></td>

                <td><?php echo $t['estrelas']; ?></td>

                <!-- Link para excluir o usuário -->
                <td><a href="../controler/comentariosController.php?func=ex&idCom=<?php echo $t['idCom']; ?>"> &#10008;</a></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>