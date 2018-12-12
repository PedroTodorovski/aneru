<!DOCTYPE>
<?php

    include("includes/conexao.php");

?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Insrir Tipo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/css/admin.css"/>
</head>
<body>

    <form class="formInserirProdutos" action="inserir_tipo.php" method="post" enctype="multipart/form-data">

        <table width="auto" align="center" border="2">
            <tr align="center">
                <td colspan="8"><h2>Insira os dados aqui</h2></td>
            </tr>
            <tr>
                <td align="center"><b>Nome do Tipo:</b></td>
                <td><input type="text" name="tipoprod_name" size="60" required></td>
            </tr>
            <tr>
                <td align="center"><b>Subcategoria do produto:</b></td>
                <td>
                    <select name="subcateg_name" id="">
                        <option>Selecione a subcategoria:</option>
                        <?php
                                
                            $buscar_subcateg = "SELECT * FROM subcateg";

                            $run_subcateg = mysqli_query($con, $buscar_subcateg);

                            while ($row_subcateg = mysqli_fetch_array($run_subcateg)) {

                                $subcateg_id = $row_subcateg['subcateg_id'];
                                $subcateg_name = $row_subcateg['subcateg_name'];

                                echo "<option value='$subcateg_id'>$subcateg_name</option>";
                            }

                        ?>
                    </select>
                </td>
                <tr align="center">
                    <td colspan="8"><input type="submit" name="cadastrar_tipo" value="Cadastrar"></td>
                </tr>
            </tr>
        </table>

    </form>

</body>
</html>
<?php

        if(isset($_POST['cadastrar_tipo'])) {
        
            $tipoprod_name = $_POST['tipoprod_name'];
            $subcateg_name = $_POST['subcateg_name'];

            $inserir_tipo = "INSERT INTO tipoprod (tipoprod_name, subcateg_id) VALUES ('$tipoprod_name', '$subcateg_name')";
        
            $inserir_type = mysqli_query($con, $inserir_tipo);

                if($inserir_type) {
                    echo "<script>alert('O tipo foi inserida com sucesso!')</script>";
                    echo "<script>window.open('admin_center.php','_self')</script>";
                }
        }

?>