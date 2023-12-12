<!--
    Un ejercicio para almacenar numeros aleatorios cada vez que actualicemos la pagina
    siempre y cuando las cookies esten activadas.
    Debe mostrarnos también lo que tiene almacenado.
-->

<?php
    
    $datos = array();

    if (isset($_COOKIE['datos'])) {
        $datos = json_decode($_COOKIE['datos']);
    }
    
    $datos[] = rand(1000, 9999);


    setcookie('datos', json_encode($datos), time() + 3600);
    echo "<p>Números aleatorios: </p>";
    echo "<ul>";
    foreach ($datos as $numero) {
        echo "<li>$numero</li>";
    }
    echo "</ul>";

?>