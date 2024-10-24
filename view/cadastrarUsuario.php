<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../CSS/cadastrostyle.css">
    <style>
        innnput {
            display: block;
            height: 22px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 4px 10px;
        }
    </style>
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
    <title>Cadastrar Usuário</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="../controler/cadastrarUsuarioController.php" method="POST">
                <h1>Crie sua conta</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>Ou use seu email para se registrar</span>
                <input type="text" placeholder="Nome" name="nomeUsu">
                <input type="email" placeholder="Email" name="emailUsu">
                <input type="tel" id="phone" placeholder="Telefone" name="telefoneUsu" maxlength="15" onkeyup="handlePhone(event)">
                <input type="password" placeholder="Senha" name="senhaUsu">
                <input type="hidden" name="perfilUsu" value="Cliente">
                <input type="hidden" name="situacaoUsu" value="Ativo">
                <input type="submit" value="Cadastrar">
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Comece por aqui!</h1>
                    <p>Registre suas informações para obter tudo do nosso site</p>

                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Bem vindo!</h1>
                    <p>Cadastre-se para ter acesso a tudo de nosso site!</p>
                    <button class="hidden" id="register">Começar cadastro</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>