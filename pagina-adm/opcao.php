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

//testa se não foi passado um ID de usuário para alteração
if (!isset($_GET["idUsu"])) {
  $idUsu = $idUsuLogin;

  //header("location:../pagina-adm/opcao.php?msg=Informe o ID do usuário a alterar.");
} else {

  $idUsu = $_GET["idUsu"];
}
//require_once '../model/DAO/UsuarioDAO.php';
//$usuarioDAO = new UsuarioDAO();

//$dados = $usuarioDAO->pesquisarUsuarioPorId($idUsu);
//if (!$dados) {
//    header("location:../pagina-adm/opcao.php?msg=Usuário não localizado para alteração.");
//}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet" />
  <link href="css/boot.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/opcao.css" />
  <title>PAGINA ADMINISTRADOR</title>
  <script  type="text/javascript">
    function newPopup(url, titulo){
      //varWindow = window.open (url, titulo, "width=800, height=600, top=100, left=400, scrollbars=no, location=no, menubar=no, toolbar=no, statusbar= no");
      varWindow = window.open(url, titulo, "width=800,height=600,top=100,left=400,scrollbars=no,location=no,menubar=no,toolbar=no,status=no");
    }
  </script>
</head>
</head>


<body>
  <!-- INICIO CABEÇALHO -->

  <header class="menu-principal">
    <main>
      <div class="header-1">
        <div class="logo">
          <a href="../view/mainpage.php"><img src="../IMG/logo.jpg" width="90px" height="70px" /></a>
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
          <li><a href="../controler/logOffController.php">LOGOFF </a></li>
        </ul>
      </div>

    </div>
  </main>

  <!-- FIM CABEÇALHO -->


  <main>
    <div>
      <section class="main_course">
        <header class="main_course_header"></header>
        <div class="ajust">


          <article class="dadosusuario">
            <h2>Cadastrar Usuário</h2>
            <header>
              <p>
                <a href="#" onclick=" newPopup('cadastrarUsuarioAdm.php', 'Cadastro de Usuário'); ">
                  <img src="../IMG/cadastrarUsu.png" alt="Cadastro" title="Cadastro" width="300" height="300" />
                </a>
              </p>
            </header>
          </article>

          <article class="dadosusuario">
            <h2>Listar Usuarios</h2>
            <header>
              <p>
                <a href="../view/listarUsuarios.php" target="iframe">
                  <img src="../IMG/alterarUsu.png" alt="Alterar Dados" title="Alterar Dados" width="300" height="300" />
                </a>
              </p>
            </header>
          </article>

          <article class="dadosusuario">
            <h2>Cadastrar Produtos </h2>
            <header>
              <p>
                <a href="#" onclick=" newPopup('../view/cadastrarProduto.php', 'Cadastro de Produto'); ">
                  <img src="../IMG/listar-dados.png" alt="Editar" title="Listar dados" width="300" height="300" />
                </a>
              </p>
            </header>
          </article>
          <article class="dadosusuario">
            <h2>Listar Produtos</h2>
            <header>
              <p>
                <a href="../view/listarProdutos.php" target="iframe">
                  <img src="../IMG/listar-produto.png" alt="Listar" title="Listar produtos" width="300" height="300" />
                </a>
              </p>
            </header>
          </article>
          <article class="dadosusuario">
            <h2>Listar Comentários</h2>
            <header>
              <p>
                <a href="../view/listarComentarios.php" target="iframe">
                  <img src="../IMG/20943930.png" alt="Listar Comentário" title="Listar comentários" width="300" height="300" />
                </a>
              </p>
            </header>
          </article>
        </div>
      </section>
    </div>
  </main>
  <iframe src="../view/listarUsuarios.php" name="iframe" height="400px" width="100%" title="lista"></iframe>
  <!-- FIM DOBRA RODAPÉ -->

</body>

</html>