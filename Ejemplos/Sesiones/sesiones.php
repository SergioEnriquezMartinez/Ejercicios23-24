<!--
    Creación de sesiones

    El mismo ejercicio que el de Cookies pero utilizando sesiones. 
-->


<?php
    session_start();
    
    if (isset($_SESSION['datos'])) {
        $datos = $_SESSION['datos'];    
    }

    $datos[] = rand(1000, 9999);
    $_SESSION['datos'] = $datos;

    echo "<p>Números aleatorios: </p>";
    echo "<ul>";
    foreach ($datos as $numero) {
        echo "<li>$numero</li>";
    }
    echo "</ul>";

?>