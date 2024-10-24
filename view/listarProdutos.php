<?php
require_once '../controler/listarProdutosController.php';
//require_once '../controler/excluirUsuarioController.php';

//echo '<pre>';
//var_dump($todos);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Produtos</title>
</head>

<body>
    <a href="../pagina-adm/opcao.php"><h2>Voltar</h2></a>
    <h1>Produtos Cadastrados</h1>
    <table border="2">
        <tr style="background-color:#00BFFF">
            <th>ID</th>
            <th>Nome Produto</th>
            <th>Valor</th>
            <th>Imagem</th>
            <th>Marca</th>
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
            <td><?php echo $t['idPro']; ?></td>

            <td><?php echo $t['nomePro']; ?></td>
            </td>

            <td><?php echo $t['valorPro']; ?></td>

            <td><img src="../uploadArq/<?php echo $t['imagemPro']; ?>" width="80px"> </td>

            <td><?php echo $t['marcaPro']; ?></td>

            <!-- Link para editar o usuário -->
            <td><a href=" alterarProduto.php?idPro=<?php echo $t['idPro']; ?>">&#9998;</a></td>

            <!-- Link para excluir o usuário -->
            <td><a href="../controler/excluirProdutosController.php?idPro=<?php echo $t['idPro']; ?>"> &#10008;</a></td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>