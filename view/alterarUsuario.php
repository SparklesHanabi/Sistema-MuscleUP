<?php
//alterar
session_start();

$idUsuLogin = "";
if (isset($_SESSION["idUsu"])) {
    $idUsuLogin = $_SESSION["idUsu"];
    $nomeUsuLogin = $_SESSION["nomeUsu"];
    $emailUsuLogin = $_SESSION["emailUsu"];
    $situacaoUsuLogin = $_SESSION["situacaoUsu"];
    $perfilUsuLogin = $_SESSION["perfilUsu"];
}

//testa se não foi passado um ID de usuário para alteração
if (!isset($_GET["idUsu"])) {
    header("location:../pagina-adm/opcao.php?msg=Informe o ID do usuário a alterar.");
}

$idUsu = $_GET["idUsu"];

require_once '../model/DAO/UsuarioDAO.php';
$usuarioDAO = new UsuarioDAO();

$dados = $usuarioDAO->pesquisarUsuarioPorId($idUsu);
if (!$dados) {
    header("location:../pagina-adm/opcao.php?msg=Usuário não localizado para alteração.");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../CSS/cadastroUsuAdm.css">
    <title>Alterar Usuário</title>
    <script>
        const handlePhone = (event) => {
            let input = event.target
            input.value = phoneMask(input.value)
        }

        const phoneMask = (value) => {
            if (!value) return ""
            value = value.replace(/\D/g, '')
            value = value.replace(/(\d{2})(\d)/, "($1) $2")
            value = value.replace(/(\d)(\d{4})$/, "$1-$2")
            return value
        }
    </script>

</head>

<body>

    <div class="container" id="container">

        <form action="../controler/alterarUsuarioController.php" method="POST">
            <h1>Alterar usuário</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <input type="hidden" name="idUsu" value="<?php echo $dados["idUsu"]; ?>">
            <input type="text" placeholder="Nome" name="nomeUsu" value="<?php echo $dados["nomeUsu"]; ?>">
            <input type="text" placeholder="Telefone" name="telefoneUsu" value="<?php echo $dados['telefoneUsu']; ?>" maxlength="15" onkeyup="handlePhone(event)"">
                <input type=" email" placeholder="Email" name="emailUsu" value="<?php echo $dados["emailUsu"]; ?>">
            <br>Deixe a senha em branco se não for alterá-la
            <input type="hidden" name="senhaUsuOriginal" value="<?php echo $dados["senhaUsu"]; ?>">
            <input type="password" placeholder="Senha" name="senhaUsu" value="">

            <?php
            if ($perfilUsuLogin == "Administrador") {
            ?>
                <label>Perfil do Usuário:</label>
                <select name="perfilUsu" required>
                    <option value="Administrador">Administrador</option>
                    <option value="Funcionário">Funcionário</option>
                    <option value="Cliente">Cliente</option>
                </select>

                <label>Situação do Usuário:</label>
                <select name="situacaoUsu" required>
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>
            <?php
            } else {
                //a alteração é do próprio cliente      
            ?>
                <input type="hidden" name="perfilUsu" value="Cliente" value="<?php echo $dados["nomeUsu"]; ?>">
                <input type="hidden" name="situacaoUsu" value="Ativo">
            <?php } ?>
            <input type="submit" value="Salvar">
        </form>
    </div>


    </div>

    <script src="script.js"></script>
</body>

</html>