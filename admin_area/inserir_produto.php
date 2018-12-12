<!DOCTYPE>
<?php

    include("includes/conexao.php");

?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Insrir Produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/css/admin.css"/>
</head>
<body class="body_inserirProdutos">
    <form class="formInserirProdutos" action="inserir_produto.php" method="post" enctype="multipart/form-data">
                <table width="auto" align="center" border="2">

                    <tr align="center">
                        <td colspan="8"><h2>Insira os dados aqui</h2></td>
                    </tr>
                    <tr>
                        <td align="center"><b>Título do produto:</b></td>
                        <td><input type="text" name="nome_produto" size="60" required></td>
                    </tr>
                    <tr>
                    <td align="center"><b>Marca do produto:</b></td>
                    <td>
                        <select name="marca_produto" id="">
                                <option>Selecione a marca:</option>
                                <?php
                                
                                $buscar_marca = "SELECT * FROM marcas";

                                $run_marca = mysqli_query($con, $buscar_marca);

                                while ($row_marca = mysqli_fetch_array($run_marca)) {

                                    $marca_id = $row_marca['marca_id'];
                                    $marca_titulo = $row_marca['marca_titulo'];

                                    echo "<option value='$marca_id'>$marca_titulo</option>";
                                }

                                ?>
                            </select>
                    </td>
                    </tr>
                    <tr>
                        <td align="center"><b>Categoria do produto:</b></td>
                        <td>
                            <select name="categoria_produto" id="product_category">
                            <option>Selecione a categoria:</option>
                            <?php
                                
                                $buscar_categ = "SELECT * FROM categorias";

                                $run_categ = mysqli_query($con, $buscar_categ);

                                while ($row_categs = mysqli_fetch_array($run_categ)) {

                                    $categ_id = $row_categs['categ_id'];
                                    $categ_titulo = $row_categs['categ_titulo'];

                                    echo "<option value='$categ_id'>$categ_titulo</option>";
                                }

                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    <td align="center"><b>Subcategoria do produto:</b></td>
                    <td>
                        <select name="subcateg_produto" id="product_subcategory">
                            <option>Selecione a subcategoria:</option>
                        </select>
                    </td>
                    </tr>
                    <tr>
                    <td align="center"><b>Tipo do produto:</b></td>
                    <td>
                        <select name="tipo_produto" id="product_type">
                            <option>Selecione o tipo:</option>
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td align="center"><b>Imagem do produto:</b></td>
                        <td><input type="file" name="imagem_produto" required></td>
                    </tr>
                    <tr>
                        <td align="center"><b>Preço do produto:</b></td>
                        <td><input type="text" name="preco_produto" size="60" required></td>
                    </tr>
                    <tr>
                        <td align="center"><b>Descrição do produto:</b></td>
                        <td><textarea name="descricao_produto" cols="30" rows="10"></textarea></td>
                    </tr>
                    <tr>
                        <td align="center"><b>Keywords do produto:</b></td>
                        <td><input type="text" name="keywords_produto" size="60" required></td>
                    </tr>
                    <tr align="center">
                        <td colspan="8"><input type="submit" name="cadastrar_produto" value="Cadastrar"></td>
                    </tr>
                </table>
            </form>
    <script type="text/javascript">
        jQuery('body').on('change', '#product_category', function(e){
            e.preventDefault();
            var categoryId = jQuery(this).val();
            // send ajax to the return ajax file
            jQuery.ajax({
                url: 'return_subcateg_ajax.php',
                data: {'categoryId':categoryId},
                type: 'POST',
            }).done(function(data){
                jQuery('#product_subcategory').html(data);
            });
        });
    </script>
    <script type="text/javascript">
        jQuery('body').on('change', '#product_subcategory', function(e){
            e.preventDefault();
            var subcategoryId = jQuery(this).val();
            // send ajax to the return ajax file
            jQuery.ajax({
                url: 'return_tipo_ajax.php',
                data: {'subcategoryId':subcategoryId},
                type: 'POST',
            }).done(function(data){
                jQuery('#product_type').html(data);
            });
        });
    </script>
</body>
</html>
<?php

    if(isset($_POST['cadastrar_produto'])) {

        $nome_produto = $_POST['nome_produto'];
        $marca_produto = $_POST['marca_produto'];
        $categoria_produto = $_POST['categoria_produto'];
        $subcategoria_produto = $_POST['subcateg_produto'];
        $tipo_produto = $_POST['tipo_produto'];
        $preco_produto = $_POST['preco_produto'];
        $descricao_produto = $_POST['descricao_produto'];
        $keywords_produto = $_POST['keywords_produto'];

        $imagem_produto = $_FILES['imagem_produto']['name'];
        $imagem_produto_tmp = $_FILES['imagem_produto']['tmp_name'];

        move_uploaded_file($imagem_produto_tmp, "imagens_produtos/$imagem_produto");

        $inserir_produto = "INSERT INTO produtos (produto_nome, produto_marca, produto_cat, produto_subcateg, produto_tipo, produto_preco, produto_desc, produto_keywords, produto_img) 
        VALUES ('$nome_produto', '$marca_produto', '$categoria_produto', '$subcategoria_produto', '$tipo_produto', '$preco_produto', '$descricao_produto', '$keywords_produto', '$imagem_produto')";

        $inserir_pro = mysqli_query($con, $inserir_produto);

            if($inserir_pro) {
                echo "<script>alert('O produto foi inserido com sucesso!')</script>";
                echo "<script>window.open('admin_center.php','_self')</script>";
            }
}

?>