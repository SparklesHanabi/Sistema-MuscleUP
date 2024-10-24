<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../CSS/cadastroUsuAdm.css">
    <title>Cadastrar Usuário</title>
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

        <form action="../controler/cadastrarUsuarioController.php" method="POST">
            <h1>Cadastrar usuário</h1>


            <input type="text" placeholder="Nome" name="nomeUsu">
            <input type="email" placeholder="Email" name="emailUsu">
            <input type="password" placeholder="Senha" name="senhaUsu">
            <input type="tel" id="phone" placeholder="Telefone" name="telefoneUsu" maxlength="15" onkeyup="handlePhone(event)">

            <section class="usuariotipo">
                <div>
                    Selecione tipo de perfil
                    <select placeholder="Perfil" name="perfilUsu">
                        <option value="Administrador">Administrador</option>
                        <option value="Funcionário">Funcionário</option>
                        <option value="Cliente">Cliente</option>
                    </select>
                </div>


                <div>
                    Selecione tipo de situação
                    <select placeholder="Situação" name="situacaoUsu">
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                    </select>
                </div>
            </section>

            <input type="submit" value="Cadastrar">
        </form>
    </div>


    </div>

    <script src="script.js"></script>
</body>

</html>