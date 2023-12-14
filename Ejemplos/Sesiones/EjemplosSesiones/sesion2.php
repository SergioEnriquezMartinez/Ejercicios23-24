<?php
session_start();
$instituto = $_SESSION["ies"]; // recuperación
echo "Otra vez, en el $instituto ";

$_SESSION["nombre"] = "Javi";
$_SESSION["rol"] = "Profesor";
?>

<a href="sesion3.php">Y luego</a>