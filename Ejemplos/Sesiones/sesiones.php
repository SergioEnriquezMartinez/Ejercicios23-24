<?php
    session_start();
    
    $datos = array();

    if (isset($_SESSION['datos'])) {
        $datos = $_SESSION['datos'];
    }
    
    $datos[] = rand(1000, 9999);

?>