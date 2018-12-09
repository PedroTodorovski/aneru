<?php
    include("includes/conexao.php");

    $buscar_subcateg = 'SELECT * FROM subcateg WHERE categ_id = "'.$_POST['categoryId'].'" ORDER BY subcateg_name';
    $options = '<option>Selecione a subcategoria:</option>';

    $run_subcateg = mysqli_query($con, $buscar_subcateg);
    while ($row_subcateg = mysqli_fetch_array($run_subcateg)) {
        $subcateg_id = $row_subcateg['subcateg_id'];
        $subcateg_name = $row_subcateg['subcateg_name'];
        
        $options .= '<option value="'.$subcateg_id.'">'.$subcateg_name.'</option>';
    }
    
    echo $options;
?>