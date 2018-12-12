<!DOCTYPE html>
<?php

    include("includes/conexao.php");

?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Centro Administrativo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="../style/css/admin.css"/>
    <script type="text/javascript" src="../js/admin.js" async></script>
    <script src="../js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet"> 
</head>
<body>
    
    <div class="l-wrapper">
        <header class="l-header">
        
        </header>
        <section class="l-menu">
            <h1 class="tituloAdminPage">Admstr</h1>
        <ul class="listaTrocaPagina">
            <li class="celulaTrocaPagina" onclick="carregar('inserir_produto.php');"><a class="linkTrocaPagina" href="#">Inserir Produtos</a></li>
            <li class="celulaTrocaPagina" onclick="carregar('inserir_categ.php');"><a class="linkTrocaPagina" href="#">Inserir Categoria</a></li>
            <li class="celulaTrocaPagina" onclick="carregar('inserir_subcateg.php');"><a class="linkTrocaPagina" href="#">Inserir Subcategoria</a></li>
            <li class="celulaTrocaPagina" onclick="carregar('inserir_tipo.php');"><a class="linkTrocaPagina" href="#">Inserir Tipo</a></li>
            <li class="celulaTrocaPagina" onclick="carregar('inserir_marca.php');"><a class="linkTrocaPagina" href="#">Inserir Marca</a></li>
        </ul>
        </section>
        <section id="conteudo" class="l-main">
            
        </section>
        <footer class="l-footer">

        </footer>
    </div>

</body>
</html>