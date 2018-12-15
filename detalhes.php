<!DOCTYPE>
<?php

    include("functions/main.php");

?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aneru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/css/main.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script type="text/javascript" src="js/main.js" async></script>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">     
</head>
<body>
    <div class="l-wrapper_3">
        <div class="l-header-top_3">
                <div class="redesSociais">
                        <ul class="listaRedes">
                            <li class="celulaListaRedes">
                                <a class="linkListaRedes" href="#">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="celulaListaRedes">
                                <a class="linkListaRedes" href="#">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="celulaListaRedes">
                                <a class="linkListaRedes" href="#">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            <li class="celulaListaRedes">
                                <a class="linkListaRedes" href="#">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li class="celulaListaRedes">
                                <a class="linkListaRedes" href="#">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
            <h1 class="nomeEmpresa"><a class="linkEmpresa" href="index.php">ANERU</a></h1>
            <div class="buscaBoxHeader" id="buscaBoxHeader">
                <form class="formPesquisaHeader" method="get" action="resultado.php" enctype="multipart/form-data">
                    <input class="pesquisaTxtHeader" type="text" name="" placeholder="Clique e pesquise">
                        <button class="pesquisaBtnHeader" type="submit" name="search">
                            <i class="fas fa-search"></i>
                        </button>
                </form>
            </div>    
        </div>
        <div class="l-header_3" id="headerSticky">
                <ul class="usuarioHeader">
                    <li class="celulaUsuaurioHeader"><a class="linkUsuaurioHeader" href=""><i class="fas fa-shopping-cart"></i></a></li>
                    <li id="btnModal" class="celulaUsuaurioHeader"><a class="linkUsuaurioHeader" href="#">Entrar</a></li>
                </ul>
                <ul class="menuHeader clearfix">
                    <li id="btnMenuHeader" class="celulaMenuHeader" onmouseover="javascript:mostra(); " onmouseout="javascript:esconde();" onclick="toggle_visibility('modalMenuHeader');"><a class="linkMenuHeader" href="#">Menu</a></li>
                    <li class="celulaMenuHeader"><a class="linkMenuHeader" href="comofuncionamos_2.php">Como Funcionamos</a></li>
                </ul>
                <div id="modalMenuHeader" class="modalMenuHeader" onmouseover="javascript:mostra(); " onmouseout="javascript:esconde();">
                    <div class="categoriasMenu">
                        <ul class="listaCategoriasMenu">
                            <?php buscarCategs(); ?>
                        </ul>
                        <div id='linkMenu_1' class='linkMenuGeral linkMenu_1' onmouseover='javascript:showMenu1(); ' onmouseout='javascript:hideMenu1();'>
                            <?php buscarSubCateg(1); ?>
                        </div>
                        <div id='linkMenu_2' class='linkMenuGeral linkMenu_2' onmouseover='javascript:showMenu2(); ' onmouseout='javascript:hideMenu2();'>
                            <?php buscarSubCateg(2); ?>
                        </div>
                        <div id='linkMenu_3' class='linkMenuGeral linkMenu_3' onmouseover='javascript:showMenu3(); ' onmouseout='javascript:hideMenu3();'>
                            <?php buscarSubCateg(3); ?>
                        </div>
                        <div id='linkMenu_4' class='linkMenuGeral linkMenu_4' onmouseover='javascript:showMenu4(); ' onmouseout='javascript:hideMenu4();'>
                            <?php buscarSubCateg(4); ?>
                        </div>
                        <div id='linkMenu_5' class='linkMenuGeral linkMenu_5' onmouseover='javascript:showMenu5(); ' onmouseout='javascript:hideMenu5();'>
                            <?php buscarSubCateg(5); ?>
                        </div>
                    </div>
                </div>
            <div class="after" id="after"></div>
            <div class="buscaBox" id="buscaBox">
                <form class="formPesquisa" method="get" action="resultado.php" enctype="multipart/form-data">
                    <input class="pesquisaTxt" type="text" name="" placeholder="Clique e pesquise">
                        <button class="pesquisaBtn" type="submit" name="search">
                            <i class="fas fa-search"></i>
                        </button>
                </form>
            </div>
                <div id="modal" class="modal">
                    <div class="modal-content">
                            <span id="buttonclose" class="close">&times;</span>
                            <h2 class="tituloLog">Log-in</h2>
                            <p class="accountTxt">Não fez registro ainda?<a id="btnRegistro" href="#"> Crie uma conta</a></p>
                            <form class="inputWithIcon" action="">
                                <input class="emailTxt" name="" type="text" placeholder=" E-mail">
                                <i class="fas fa-user"></i>
                                <input class="senhaLogTxt" name="" type="password" placeholder=" Senha">
                                <i class="fas fa-lock"></i>
                                <button class="btnForm" type="submit">Pronto!</button>
                            </form>
                            <p class="forgotTxt">Esqueceu sua senha?<a href="#"> Pegue-a de volta!</a></p>
                    </div>
                </div>
                <div id="myRegistro" class="modalRegistro">
                    <div class="modal-content-registro">
                        <span id="buttoncloseRegistro" class="closeReg">&times;</span>
                        <h2 class="tituloReg">Registro</h2>
                        <form class="inputWithIcon" action="">
                            <input class="nomeTxt" name="" type="text" placeholder=" Nome">
                            <input class="sobrenomeTxt" name="" type="text" placeholder=" Sobrenome">
                            <select class="genero" name="genero" id="selectGenero">
                                <option class="genero" value="" selected="selected" hidden>Gênero</option>
                                <option class="genero" value="Feminino">Feminino</option>
                                <option class="genero" value="Maculino">Masculino</option>
                            </select>
                            <input class="cpfTxt" name="" type="text" placeholder=" CPF">
                            <input class="telTxt" name="" type="text" placeholder=" Telefone">
                            <input class="emailRegTxt" name="" type="email" placeholder=" Insira seu email">
                            <input class="senhaRegTxt" name="" type="password" placeholder=" Senha">
                            <input class="senhaRegTxt" name="" type="password" placeholder=" Confirmar senha">
                            <button class="btnFormReg" type="submit">Cadastre!</button>
                            <p class="accountRegTxt">Já faz parte da família Aneru?<a id="btnVoltaLog" href="#"> Faça log-in!</a></p>
                        </form>
                    </div>
                </div>
            </div>
        <div class="l-main_3">
    <?php

    if(isset($_GET['id_prod'])) {

        $produto_id = $_GET['id_prod'];

        $busca_prod = "SELECT * FROM produtos WHERE produto_id = $produto_id";

        $run_prod = mysqli_query($con, $busca_prod);

        while ($row_prod = mysqli_fetch_array($run_prod)) {
            
            $prod_id = $row_prod['produto_id'];
            $prod_nome = $row_prod['produto_nome'];
            $prod_preco = $row_prod['produto_preco'];
            $prod_desc = $row_prod['produto_desc'];
            $prod_img = $row_prod['produto_img'];

            echo "<div class='produtoThumbDetalhe'>
            
                <h2 class='nomeProdutoDetalhe'>$prod_nome</h2>

                <img class='imagemThumbDetalhe' src='admin_area/imagens_produtos/$prod_img' width='500' height='500'>

                <p class='precoProdutoDetalhe'><b> R$ $prod_preco </b></p>

                <a class='linkbtnDet1' href='index.php?id_prod=$prod_id' style='float:right;'><button class='btnAddCartDetalhe'><i class='fas fa-cart-plus'></i> Adiconar</button></a>
                <a class='linkbtnDet2' href='#' style='float:right;'><button class='btnAddCartDetalhe'><i class='far fa-credit-card'></i> Comprar</button></a>
                <a class='linkbtnDet3' href='index.php' style='float:right;'><button class='btnAddCartDetalhe'><i class='fas fa-arrow-left'></i> Voltar</button></a>

            </div>
            <div class='productDescription'>
                <h3 class='nameDescription'>Descricao do Produto</h3>
                <p class='descriptionSelf'>$prod_desc</p>
            </div>";
        }
    }
    ?>
        </div>
        <div class="l-footer_3">

        </div>
    </div>
</body>
</body>
</html>