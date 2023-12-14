<?php
session_start(); // Creamos la sesion
$_SESSION["ies"] = "IES Alonso Madrigal"; // asignación
$instituto = $_SESSION["ies"]; // recuperación
echo "Estamos en el $instituto ";
?>
<br />
<a href="sesion2.php">Y luego</a>