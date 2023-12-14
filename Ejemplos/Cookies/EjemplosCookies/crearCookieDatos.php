<?php

echo "<pre>";print_r($_COOKIE); echo "</pre>";

$datos = array();

if (isset($_COOKIE['datos'])) { 
    $datos = json_decode($_COOKIE['datos']);
}

$datos[] = rand(1000, 9999);

// 1) explode - implode
// 2) json_encode - json_decode
setcookie('datos', json_encode($datos), time()+3600); 

echo "<p> Números aleatorios </p>";
echo "<ul>";
foreach($datos as $d){
    echo "<li>$d</li>";
}
echo "</ul>";

?>

<p><a href="crearCookieDatos.php">Volver a cargar</a></p>

