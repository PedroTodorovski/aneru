<!DOCTYPE>
<?php

    include("includes/conexao.php");

?>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Insrir Marca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/css/admin.css"/>
</head>
<body>

    <form class="formInserirProdutos" action="inserir_marca.php" method="post" enctype="multipart/form-data">

        <table width="auto" align="center" border="2">
            <tr align="center">
                <td colspan="8"><h2>Insira os dados aqui</h2></td>
            </tr>
            <tr>
                <td align="center"><b>Nome da marca:</b></td>
                <td><input type="text" name="nome_marca" size="60" required></td>
            </tr>
                <tr align="center">
                    <td colspan="8"><input type="submit" name="cadastrar_marca" value="Cadastrar"></td>
                </tr>
        </table>

    </form>
    
</body>
</html>
<?php

        if(isset($_POST['cadastrar_marca'])) {
        
            $nome_marca = $_POST['nome_marca'];

            $inserir_brand = "INSERT INTO marcas (marca_titulo) VALUES ('$nome_marca')";
        
            $inserir_marcas = mysqli_query($con, $inserir_brand);

                if($inserir_marcas) {
                    echo "<script>alert('A marca foi inserida com sucesso!')</script>";
                    echo "<script>window.open('admin_center.php','_self')</script>";
                }
        }

?>