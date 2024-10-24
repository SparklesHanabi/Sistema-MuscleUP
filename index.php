<?php

session_start();

$idUsuLogin = "";
if (isset($_SESSION["idUsu"])) {
    $idUsuLogin = $_SESSION["idUsu"];
    $nomeUsuLogin = $_SESSION["nomeUsu"];
    $emailUsuLogin = $_SESSION["emailUsu"];
    $situacaoUsuLogin = $_SESSION["situacaoUsu"];
    $perfilUsuLogin = $_SESSION["perfilUsu"];
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Muscle.Up</title>
</head>

<body>
    <section>
        <div class="circle"></div>
        <header>
            <a href="#"><img src="img/logo.png" alt="" class="logo"></a>
            <nav class="navegation">
                <ul>
                    <li><a href="view/mainpage.php">Home</a></li>
                    <li><a href="view/login.php">Entrar</a></li>
                    <li><a href="view/cadastrarUsuario.php">Cadastre-se</a></li>
                </ul>
            </nav>
        </header>
        <div class="content">
            <div class="text">
                <h2> MUSCLE <br><span>UP!</span></h2>
                <p>Somos uma plataforma de reviews de suplementos e outros acessórios de academia. Temos o intuito de
                    ajudar você a fazer a melhor escolha possível para melhorar sua experiência fitness!</p>
                <a href="">Nossas redes sociais</a>
            </div>
        </div>
        <ul class="icons">
            <li><a href="#"><img src="img/facebook.png" alt=""></a></li>
            <li><a href="https://x.com/MuscleUp_OFC"><img src="img/twitter.png" alt=""></a></li>
            <li><a href="https://www.instagram.com/muscleup_oficial/"><img src="img/instagram.png" alt=""></a></li>
        </ul>

    </section>
</body>

</html>