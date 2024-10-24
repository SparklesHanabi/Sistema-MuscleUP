<?php
require_once '../controler/listarUsuariosController.php';
//require_once '../controler/excluirUsuarioController.php';

//echo '<pre>';
//var_dump($todos);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Usuários</title>

</head>

<body>
    <a href="../pagina-adm/opcao.php">
        <h2>Voltar</h2>
    </a>
    <h1>Usuarios cadastrados</h1>
    <table border="2">
        <tr style="background-color:#00BFFF">
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Perfil</th>
            <th>Situação</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        <?php
        $i = 0;
        foreach ($todos as $t) {
            if ($i == 1) {
                echo '<tr style="background-color:#ADD8E6">';
                $i = 0;
            } else {
                echo '<tr style="background-color:#F0F8FF">';
                $i++;
            }   ?>
        <!-- Exibir o nome do usuário -->
        <td><?php echo $t['idUsu']; ?></td>

        <td><?php echo $t['nomeUsu']; ?></td>
        </td>

        <td><?php echo $t['emailUsu']; ?></td>

        <td><?php echo $t['perfilUsu']; ?></td>

        <td><?php echo $t['situacaoUsu']; ?></td>

        <!-- Link para editar o usuário -->
        <td><a href=" alterarUsuario.php?idUsu=<?php echo $t['idUsu']; ?>">&#9998;</a></td>

        <!-- Link para excluir o usuário -->
        <td><a href="../controler/excluirUsuarioController.php?idUsu= <?php echo $t['idUsu']; ?> " onclick="return confirm('excluir usuario ?')"> &#10008;</a></td>
        </tr>
        <?php } ?>
    </table>

</body>

</html>