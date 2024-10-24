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

require_once '../model/DAO/ProdutoDAO.php';
$produtoDAO = new ProdutoDAO();

$todos = $produtoDAO->listarProduto();

?>

<html>

<head>
    <link href="../CSS/fontion.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Jersey+25&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="../CSS/reset.css" />
    <link rel="stylesheet" href="../CSS/main.css">

    <title>Muscle UP</title>
</head>

<body>
    <div class="container">
        <header class="menu-principal">
            <main>
                <div>

                    <div class="logo">
                        <a href="mainpage.php"><img src="../IMG/logo.jpg" width="90px" height="70px"> </a>

                    </div>
                </div>

                <div class="nome-usuario">
                    Bem vindo,
                    <?php echo $nomeUsuLogin; ?>

                </div>

            </main>
        </header>
        <main class="col-100 menu-urls">
            <div class="header-2">
                <div class="menu">
                    <ul>


                        <?php

                        if ($perfilUsuLogin == 'Administrador') { ?>
                        <li><a href="../pagina-adm/opcao.php">MENU ADMINISTRADOR</a></li>
                        <?php
                        } ?>

                        <?php
                        if ($perfilUsuLogin == 'Funcionário') { ?>

                        <li><a href="../view/cadastrarProduto.php">CADASTRAR PRODUTO</a></li>

                        <?php } ?>


                        <li><a href="">LANÇAMENTOS</a></li>
                        <li><a href="">WHEY PROTEIN</a></li>
                        <li><a href="">CREATINA </a></li>
                        <li><a href=""> PRÉ-TREINO</a></li>
                        <li><a href=""> ACESSORIOS</a></li>
                        <li> <a href="../controler/logOffController.php" onclick=" return confirm('Quer deslogar?')"
                                title="Deslogar">SAIR</a>
                        </li>

                    </ul>
                </div>

                <div class="busca">
                    <input placeholder="Pesquise algo" type="text" />
                </div>
            </div>
        </main>
        <div class="col-100">
            <div class="slider-principal">
                <img src="../IMG/young.png" />
                <img src="../IMG/BLACKIMAGE.jpg" />
                <img src="../IMG/REDIMAGE.png" />
                <img src="../IMG/VIDA+.jpg" />
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js">
        </script>
        <script type="text/javascript" src="../JS/main.js"></script>
        <section class="main_blog">
            <header class="main_blog_header">
                <h1 class="icon-blog"><img src="../IMG/gabigol.png" alt="caneta" title="caneta" height="26px" /> Artigos
                    com as
                    melhores avaliações!</h1>
                <p class="blog_2">
                    <br>
                    Aqui você encontra os artigos necessários para auxiliar nos seus
                    treinos.
                </p>
            </header>

            <?php
            foreach ($todos as $t) { ?>

            <article>
                <a href="produto.php?idPro=<?php echo $t['idPro'] ?>">
                    <img src="../uploadArq/<?php echo $t['imagemPro'] ?>" width="200" alt="Imagem post"
                        title="Imagem Post" />


                    <h2>
                        <span class="title">
                            <p><?php echo $t['nomePro'] ?></p>
                        </span>
                    </h2>
                </a>

            </article>

            <?php } ?>


        </section>
        <div class="main_course_fullwidth" id="ancora">
            <div class="main_course_ratting_content">
                <article class="main_course_rating_title">
                    <header>
                        <h2 class="new_the_girl">
                            Melhores feedbacks da semana
                        </h2>
                    </header>
                    <img src="../IMG/star.png" alt="Estrela" title="Estrela" />
                    <img src="../IMG/star.png" alt="Estrela" title="Estrela" />
                    <img src="../IMG/star.png" alt="Estrela" title="Estrela" />
                    <img src="../IMG/star.png" alt="Estrela" title="Estrela" />
                    <img src="../IMG/star.png" alt="Estrela" title="Estrela" />
                </article>

                <section class="main_course_ratting_content_comment">
                    <header>
                        <h2 class="just_like">Veja o que estão falando sobre os suplementos do mercado</h2>
                    </header>
                    <article>
                        <header>
                            <h3>Guilherme Koplin <img src="../IMG/Verificado.png" alt="Verificado" title="Verificado" />
                            </h3>
                            <p>16/03/2023</p>
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                        </header>
                        <p>
                            Este suplemento é incrível! Excelente qualidade pelo preço.
                            Tenho visto resultados notáveis em minha energia e resistência nos treinos,
                            e o custo é muito justo.
                        </p>
                    </article>

                    <article>
                        <header>
                            <h3>João Lucas <img src="../IMG/Verificado.png" alt="verificado" title="verificado" /></h3>
                            <p>22/03/2023</p>
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                        </header>
                        <p>
                            Estes comprimidos de creatina são incríveis! A qualidade é top de linha e o preço é muito
                            justo.
                            Eles têm sido fundamentais para aumentar minha força e resistência nos treinos.
                        </p>
                    </article>

                    <article>
                        <header>
                            <h3>Gabriel Estevão <img src="../IMG/Verificado.png" alt="verificado" title="verificado" />
                            </h3>
                            <p>14/03/2023</p>
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                        </header>
                        <p>
                            Comprei este suplemento de colágeno para melhorar a saúde da minha pele e articulações.
                            A qualidade é excepcional e o preço é muito acessível, especialmente considerando os
                            benefícios
                            que proporciona.
                        </p>
                    </article>

                    <article>
                        <header>
                            <h3>Guilherme Messias <img src="../IMG/Verificado.png" alt="verificado"
                                    title="verificado" />
                            </h3>
                            <p>03/04/2023</p>
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                        </header>
                        <p>
                            Essas barras de proteína são deliciosas e nutritivas.
                            A qualidade dos ingredientes é excelente e o preço por unidade é bastante justo.
                            São perfeitas para um lanche rápido e saudável após o treino.
                        </p>
                    </article>

                    <article>
                        <header>
                            <h3>Ronaldo Fernandes<img src="../IMG/Verificado.png" alt="verificado" title="verificado" />
                            </h3>
                            <p>03/03/2023</p>
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                        </header>
                        <p>
                            Adquiri este multivitamínico para complementar minha dieta e estou muito satisfeito.
                            A qualidade dos ingredientes é excelente e o preço é competitivo em relação a outras
                            opções no mercado.
                        </p>
                    </article>

                    <article>
                        <header>
                            <h3>Hially Vaguetti <img src="../IMG/Verificado.png" alt="verificado" title="verificado" />
                            </h3>
                            <p>02/03/2023</p>
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                            <img src="../IMG/star.png" alt="Imagem" title="Imagem" />
                        </header>
                        <p>
                            Comprei este pré-treino recentemente e estou impressionado com a qualidade.
                            Ele realmente me dá o impulso extra que preciso para meus treinos intensos,
                            e o preço é muito mais razoável do que outras marcas.
                        </p>
                    </article>
                </section>
            </div>
        </div>
        </section>
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

    </div>
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



</body>

</html>