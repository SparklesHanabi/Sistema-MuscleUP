<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="../CSS/cadastroprod.css">
        <title>Cadastrar Produto</title>
    </head>

 <body>
       <div class="container" id="container">
            <form action="../controler/cadastrarProdutoController.php"
             method="POST" enctype="multipart/form-data"> 
                <h1>Cadastro produto</h1>
               
                
                <input type="text" placeholder="Nome do produto" name="nomePro">
                <input type="text" placeholder="Valor médio" name="valorPro">
                <input type="file" placeholder="Imagem" name="imagemPro">
                <input type="text" placeholder="Marca do fornecedor" name="marcaPro">
                
                <input type="submit" value="Cadastrar">
            </form>
        </div>

        <script src="script.js"></script>
 </body>

</html>