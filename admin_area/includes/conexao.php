<?php   

    $con = mysqli_connect("localhost","root","senhadopedro","aneru");
    
    if (mysqli_connect_error()) {
        printf('Erro de conexão: %s', mysqli_connect_error());
        exit;
    }
    
    if (!mysqli_set_charset($con, 'utf8')) {
        printf('Error ao usar utf8: %s', mysqli_error($con));
        exit;
    }

?>