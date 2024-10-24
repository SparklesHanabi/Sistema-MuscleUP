<?php
session_start(); // Iniciar a sessão

if (!isset($_GET["idPro"])) {
    header("location:../view/mainpage.php?msg=Código de Produto não informado!");
}

$idPro = $_GET["idPro"];

$idUsuLogin = "";
if (isset($_SESSION["idUsu"])) {
    $idUsuLogin = $_SESSION["idUsu"];
    $nomeUsuLogin = $_SESSION["nomeUsu"];
    $emailUsuLogin = $_SESSION["emailUsu"];
    $situacaoUsuLogin = $_SESSION["situacaoUsu"];
    $perfilUsuLogin = $_SESSION["perfilUsu"];
}

require_once '../model/DAO/ComentarioDAO.php';
require_once '../model/DAO/ProdutoDAO.php';
$produtoDAO = new ProdutoDAO();
$comentarioDAO = new ComentarioDAO();

$produto = $produtoDAO->pesquisarProdutoPor($idPro);

//var_dump($todos);

if (!$produto) {
    header("location:../view/mainpage.php?msg=Código de Produto não localizado!");
}

//Calcula a média de estrelas do produto
$mediaEstrelas = $comentarioDAO->calcularMediaEstrelasPorIdPro($idPro);

if (!$mediaEstrelas) {
    $Media_Estrelas = 0;
} else {
    $Media_Estrelas = number_format($mediaEstrelas["MediaEstrelas"], 1);
}
$usuario = $_SESSION["nomeUsu"];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../CSS/reset.css" />
    <link href="../CSS/produtostyle.css" rel="stylesheet" />
    <link rel="stylesheet" href="../CSS/avaliacao.css">
</head>

<body>
    <header class="menu-principal">
        <main>
            <div class="header-1">
                <div class="logo">
                    <a href="mainpage.php"><img src="../IMG/logo.jpg" width="90px" height="70px" /></href></a>
                </div>
                <div class="redes-sociais">
                    <ul>
                        <li>
                            <a href=""><img src="../IMG/rss.png" /></a>
                        </li>
                        <li>
                            <a href=""><img src="../IMG/face.png" /></a>
                        </li>
                        <li>
                            <a href=""><img src="../IMG/tw.png" /></a>
                        </li>
                        <li>
                            <a href=""><img src="../IMG/linkedin.png" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </header>
    <main class="col-100 menu-urls">
        <div class="header-2">
            <div class="menu">
                <ul>


                    <li><a href="">LANÇAMENTOS</a></li>
                    <li><a href="">WHEY PROTEIN</a></li>
                    <li><a href="">CREATINA </a></li>
                    <li><a href=""> PRÉ-TREINO</a></li>
                    <li><a href=""> ACESSORIOS</a></li>
                    <li><a href="../controler/logOffController.php">SAIR </a></li>
                </ul>
            </div>
            <div class="busca">
                <input placeholder="Pesquise algo" type="text" />
            </div>
        </div>
    </main>
    <section class="main_tutor">
        <div class="main_tutor_content">
            <article>
                <header>
                    <p> <img src="../uploadArq/<?php echo $produto['imagemPro'] ?>" width="200" alt="Imagem Produto" title="Imagem Produto" /></p>
                    <p><?php echo $produto['nomePro']; ?></p>
                    <p><?php echo $produto['marcaPro'] . " - Preço médio: R$ " . $produto['valorPro']; ?></p>
                    <p><?php
                        if ($mediaEstrelas > 0) {
                            echo '<img src="../IMG/star.png" width="20">' . $Media_Estrelas;
                        } else {
                            echo "### Sem avaiiação ###";
                        }

                        ?></p>
                </header>

                <form action="../controler/salvarComentarioController.php" method="post">
                    <div class="estrelas">

                        <input type="hidden" name="produto_idPro" value="<?php echo $idPro; ?>">
                        <input type="hidden" name="usuario_idUsu" value="<?php echo $idUsuLogin; ?>">
                        <input type="radio" name="estrelas" id="vazio" value="" checked>

                        <!-- Opção para selecionar 1 estrela -->
                        <label for="estrela_um"><i class="opcao fa"></i></label>
                        <input type="radio" name="estrelas" id="estrela_um" title="Insatisfeito" id="vazio" value="1">

                        <!-- Opção para selecionar 2 estrela -->
                        <label for="estrela_dois"><i class="opcao fa"></i></label>
                        <input type="radio" name="estrelas" id="estrela_dois" id="vazio" value="2">

                        <!-- Opção para selecionar 3 estrela -->
                        <label for="estrela_tres"><i class="opcao fa"></i></label>
                        <input type="radio" name="estrelas" id="estrela_tres" id="vazio" value="3">

                        <!-- Opção para selecionar 4 estrela -->
                        <label for="estrela_quatro"><i class="opcao fa"></i></label>
                        <input type="radio" name="estrelas" id="estrela_quatro" id="vazio" value="4">

                        <!-- Opção para selecionar 5 estrela -->
                        <label for="estrela_cinco"><i class="opcao fa"></i></label>
                        <input type="radio" name="estrelas" id="estrela_cinco" id="vazio" value="5">
                        <p>1 estrela: Muito insatisfeito 2 estrelas: Insatisfeito<br>
                            3 estrelas: Neutro 4 estrelas: Satisfeito<br>
                            5 estrelas: Muito satisfeito</p><br>
                    </div>
                    Comentário: <input type="text" name="comentarioPro" size="50" required>
                    <input type="submit" value="Enviar">
                </form>
            </article>
        </div>
        <div class="estrelas">

            <h1>Comentários Cadastrados</h1>

            <?php
            
            $todos = $comentarioDAO->listarTodosComentariosPorIdPro($idPro);

            //var_dump($todos); die;

            //require_once "../controler/mostraComentariosController.php";

            foreach ($todos as $t) { ?>

                <p>
                    <?php
                    echo "<div class='comentarioprod'>";
                    echo "<div class='comentario_estrela_prod'>";
                    
                    if ($t['estrelas'] > 0) {
                        for ($x = 1; $x <= $t['estrelas']; $x++) {
                            echo '<img src="../IMG/star.png" width="20">';
                        }
                        echo "<div class= 'comentarioprod_usuario'>";
                        echo $t['nomeUsu'];
                        echo "</div>";
                        echo "</div>";
                    } else {
                        echo "### PRODUTO NÃO AVALIADO ###";
                    }
                    ?>


                    <?php echo " {$t['comentarioPro']} "; 
                    echo "</div>";
                    ?>
                    
                </p>

            <?php } ?>
        </div>
    </section>
    <!-- Fim dobra tutor -->
    </main>

    <!-- INICIO DOBRA RODAPÉ -->

    <section class="main_footer">
        <header>
            <h1>Quer saber mais?</h1>
        </header>

        <article class="main_footer_our_pages">
            <header>
                <h2>Nossas Páginas</h2>
            </header>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </article>

        <article class="main_footer_links">
            <header>
                <h2>Links Úteis</h2>
            </header>
            <ul>
                <li><a href="#">Política de Privacidade</a></li>
                <li><a href="#">Aviso Legal</a></li>
                <li><a href="#">Termos de Uso</a></li>
            </ul>
        </article>

        <article class="main_footer_about">
            <header>
                <h2>Sobre o Projeto</h2>
            </header>
            <p>
                Aprenda sobre suplementos conosco e dê sua opinião!
            </p>
        </article>
    </section>

    <footer class="main_footer_rights">
        <p class="bazinga">MuscleUP - Todos os direitos reservados.</p>
    </footer>
    <!-- FIM DOBRA RODAPÉ -->
</body>
<script>
    // Seleciona o link e a janela modal
    var link = document.querySelector(".modal-link");
    var modal = document.querySelector(".modal");
    var overlay = document.querySelector(".overlay");

    // Adiciona um listener de evento para o link
    link.addEventListener("click", function(event) {
        event.preventDefault(); // previne o comportamento padrão do link (navegar para outra página)

        overlay.style.display = "block"; // exibe a camada escura
        modal.style.display = "block"; // exibe a janela modal
    });

    // Adiciona um listener de evento para a camada escura
    overlay.addEventListener("click", function() {
        overlay.style.display = "none"; // oculta a camada escura
        modal.style.display = "none"; // oculta a janela modal
    });
</script>

</html>