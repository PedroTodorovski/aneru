<?php
    include("includes/conexao.php");

    $buscar_tipoprod = 'SELECT * FROM tipoprod WHERE subcateg_id = "'.$_POST['subcategoryId'].'" ORDER BY tipoprod_name';
    $options1 = '<option>Selecione o tipo:</option>';

    $run_tipoprod = mysqli_query($con, $buscar_tipoprod);
    while ($row_tipoprod = mysqli_fetch_array($run_tipoprod)) {
        $tipoprod_id = $row_tipoprod['tipoprod_id'];
        $tipoprod_name = $row_tipoprod['tipoprod_name'];
        
        $options1 .= '<option value="'.$tipoprod_id.'">'.$tipoprod_name.'</option>';
    }
    
    echo $options1;
?>