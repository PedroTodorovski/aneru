<?php

$con = mysqli_connect("localhost","root","senhadopedro","aneru");

if(mysqli_connect_errno()) {
    echo "ERRO: " . mysqli_connect_error();
    }

    function busca_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
     
        return $ipaddress;
    }

    function carrinho() {
        if(isset($_GET['add_carrinho'])) {
            
            global $con;

            $ip = busca_ip();

            $pro_id = $_GET['add_carrinho'];

            $check_pro = "SELECT * FROM carrinho WHERE end_ip='$ip' AND id_pro='$pro_id'";

            $run_check = mysqli_query($con, $check_pro);

            if(mysqli_num_rows($run_check)>0) {
                echo "";
            } else {
                $insere_pro = "INSERT INTO carrinho (id_pro,end_ip) VALUES ('$pro_id','$ip')";

                $run_pro = mysqli_query($con, $insere_pro);

                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    }

    function total_itens() {
        
        if(isset($_GET['add_carrinho'])) {
            
            global $con;

            $ip = busca_ip();

            $busca_itens = "SELECT * FROM carrinho WHERE end_ip='$ip'";

            $run_itens = mysqli_query($con, $busca_itens);

            $conta_itens = mysqli_num_rows($run_itens);
        } else {

            global $con;

            $ip = busca_ip();

            $busca_itens = "SELECT * FROM carrinho WHERE end_ip='$ip'";

            $run_itens = mysqli_query($con, $busca_itens);

            $conta_itens = mysqli_num_rows($run_itens);
        }

        echo "$conta_itens";
    }

    function preco_total() {

        $total = 0;

        global $con;

        $ip = busca_ip();

        $preco_select = "SELECT * FROM carrinho WHERE end_ip='$ip'";

        $run_preco = mysqli_query($con, $preco_select);

        while($p_preco=mysqli_fetch_array($run_preco)) {

            $pro_id = $p_preco['id_pro'];

            $preco_pro = "SELECT * FROM produtos WHERE produto_id='$pro_id'";

            $run_pro_preco = mysqli_query($con, $preco_pro);

            while($pp_preco=mysqli_fetch_array($run_pro_preco)) {

                $preco_produto = array($pp_preco['produto_preco']);

                $valores = array_sum($preco_produto);

                $total +=$valores;
        }
    }

        echo "R$".$total;
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



            echo '<div class="sectionSub"><a class="linkSubCatergoria" href="subcategorias.php?subcateg='.$subcateg_id.'">'.$subcateg_name.'</a><div class="sectionTipo">'.$tip.'</div></div>';
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

            $str = $str."<a class='linkTipo' href='tipos.php?tipo=".$tipo_id."'>".$tipo_name."</a>";

        }
        return $str;
    }

    function buscaPro() {

        if(!isset($_GET['subcateg'])) {
            if(!isset($_GET['tipo'])) {

    

        global $con;

        $busca_prod = "SELECT * FROM produtos ORDER BY RAND() LIMIT 0,12";

        $run_prod = mysqli_query($con, $busca_prod);
    
        while ($row_prod = mysqli_fetch_array($run_prod)) {
            
            $prod_id = $row_prod['produto_id'];
            $prod_nome = $row_prod['produto_nome'];
            $prod_preco = $row_prod['produto_preco'];
            $prod_img = $row_prod['produto_img'];

            echo "<div class='produto_thumb'>
            
                <img class='imagemThumb' src='admin_area/imagens_produtos/$prod_img' width='180' height='180'>
                <h4 class='nomeProduto'>$prod_nome</h4>
                <p class='precoProduto'>R$ $prod_preco</p>

                <a href='detalhes.php?id_prod=$prod_id' style='float:left;' class='linkDetalhes'>Detalhes</a>
                <a class='linkBtnAddCart' href='index.php?add_carrinho=$prod_id' style='float:right;'><button class='btnAddCart'><i class='fas fa-cart-plus'></i></button></a>

            </div>";
        }
        }
    }
    }

    function buscaPro2() {

        if(!isset($_GET['subcateg'])) {
            if(!isset($_GET['tipo'])) {

    

        global $con;

        $busca_prod = "SELECT * FROM produtos WHERE produto_subcateg = 9 ORDER BY RAND() LIMIT 0,12";

        $run_prod = mysqli_query($con, $busca_prod);
    
        while ($row_prod = mysqli_fetch_array($run_prod)) {
            
            $prod_id = $row_prod['produto_id'];
            $prod_nome = $row_prod['produto_nome'];
            $prod_preco = $row_prod['produto_preco'];
            $prod_img = $row_prod['produto_img'];

            echo "<div class='produto_thumb'>
            
                <img class='imagemThumb' src='admin_area/imagens_produtos/$prod_img' width='180' height='180'>
                <h4 class='nomeProduto'>$prod_nome</h4>
                <p class='precoProduto'>R$ $prod_preco</p>

                <a href='detalhes.php?id_prod=$prod_id' style='float:left;' class='linkDetalhes'>Detalhes</a>
                <a class='linkBtnAddCart' href='index.php?add_carrinho=$prod_id' style='float:right;'><button class='btnAddCart'><i class='fas fa-cart-plus'></i></button></a>

            </div>";
        }
        }
    }
    }

?>