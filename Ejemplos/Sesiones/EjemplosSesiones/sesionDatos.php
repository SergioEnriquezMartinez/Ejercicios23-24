<?php
session_start();
echo "<pre>";print_r($_SESSION); echo "</pre>";

$datos = array();
if (isset($_SESSION['datos'])) { 
    $datos = $_SESSION['datos'];
}

$datos[] = rand(1000, 9999);
$_SESSION['datos'] = $datos;

echo "<p> Números aleatorios </p>";
echo "<ul>";
foreach($datos as $d){
    echo "<li>$d</li>";
}
echo "</ul>";

?>

<p><a href="sesionDatos.php">Volver a cargar</a></p>
