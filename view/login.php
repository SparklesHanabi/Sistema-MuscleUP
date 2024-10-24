<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../CSS/loginstyle.css">
    <title>Entrar</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="../controler/logincontroller.php" method="POST">
                <h1>Entrar</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>Ou use seu email para se registrar</span>

                <input type="email" placeholder="Email" name="emailUsu">
                <input type="password" placeholder="Senha" name="senhaUsu">
                <input type="submit" value="Entrar">
                <a class="cadastro" href="../view/cadastrarUsuario.php"> Não tem uma conta? Cadastrar</a>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bem vindo de volta!</h1>
                    <p>Registre suas informações para obter tudo do nosso site</p>
                    <button class="hidden" id="login">Logar</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Bem vindo de volta!</h1>
                    <p>Faça login para utilizar nosso site ao máximo!</p>
                    <button class="hidden" id="register">Login</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>