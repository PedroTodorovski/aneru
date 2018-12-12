<!DOCTYPE>
<?php

    include("includes/conexao.php");

?>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Insrir Categoria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/css/admin.css"/>
</head>
<body>

    <form class="formInserirProdutos" action="inserir_categ.php" method="post" enctype="multipart/form-data">

        <table width="auto" align="center" border="2">
            <tr align="center">
                <td colspan="8"><h2>Insira os dados aqui</h2></td>
            </tr>
            <tr>
                <td align="center"><b>Nome da categoria:</b></td>
                <td><input type="text" name="nome_categoria" size="60" required></td>
            </tr>
                <tr align="center">
                    <td colspan="8"><input type="submit" name="cadastrar_categ" value="Cadastrar"></td>
                </tr>
        </table>

    </form>
    
</body>
</html>
<?php

        if(isset($_POST['cadastrar_categ'])) {
        
            $nome_categoria = $_POST['nome_categoria'];

            $inserir_categoria = "INSERT INTO categorias (categ_titulo) VALUES ('$nome_categoria')";
        
            $inserir_categ = mysqli_query($con, $inserir_categoria);

                if($inserir_categ) {
                    echo "<script>alert('A categoria foi inserida com sucesso!')</script>";
                    echo "<script>window.open('admin_center.php','_self')</script>";
                }
        }

?>