<?php

$con = mysqli_connect("localhost","root","senhadopedro","aneru");

if(mysqli_connect_errno()) {
    echo "ERRO: " . mysqli_connect_error();
    }

    function buscarCategs() {

        global $con;

        $buscar_categ = "SELECT * FROM categorias";

        $run_categ = mysqli_query($con, $buscar_categ);

        $i = 1;
        while ($row_categs = mysqli_fetch_array($run_categ)) {

            $categ_id = $row_categs['categ_id'];
            $categ_titulo = $row_categs['categ_titulo'];
                
            echo "<li class='celulaCategoriasMenu' onmouseover='javascript:showMenu$i(); ' onmouseout='javascript:hideMenu$i();'>$categ_titulo</li>";
    
            $i++;
    }
}

    function buscarMarca() {

        global $con;

        $buscar_marca = "SELECT * FROM marcas";

        $run_marca = mysqli_query($con, $buscar_marca);

        while ($row_marca = mysqli_fetch_array($run_marca)) {

            $marca_id = $row_marca['marca_id'];
            $marca_titulo = $row_marca['marca_titulo'];

            echo "<li class=''>$marca_titulo</li>";
        }
    }

    function buscarSubCateg($categ_id) {

        global $con;

        $buscar_subcateg = "SELECT * FROM subcateg WHERE categ_id = '$categ_id'";

        $run_subcateg = mysqli_query($con, $buscar_subcateg);

        $i=1;
        while ($row_subcateg = mysqli_fetch_array($run_subcateg)) {

            $subcateg_id = $row_subcateg['subcateg_id'];
            $subcateg_name = $row_subcateg['subcateg_name'];
            $tip = buscarTipos($subcateg_id);



            echo '<div class="sectionSub"><a class="linkSubCatergoria" href="produto/'.$subcateg_name.'.php">'.$subcateg_name.'</a><div class="sectionTipo"><a class="linkTipo" href="produto/'.$subcateg_name.'.php">'.$tip.'</a></div></div>';
            $i++;
        }
    }

    function buscarTipos($subcateg_id) {

        global $con;

        $buscar_tipo = "SELECT * FROM tipoprod WHERE subcateg_id = '$subcateg_id'";

        $run_tipo = mysqli_query($con, $buscar_tipo);
        $str = '';
        while ($row_tipo = mysqli_fetch_array($run_tipo)) {

            $tipo_id = $row_tipo['tipoprod_id'];
            $tipo_name = $row_tipo['tipoprod_name'];

            $str = $str."$tipo_name";

        }
        return $str;
    }

?>