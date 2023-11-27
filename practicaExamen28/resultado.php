<?php
include_once "inc/header.php";
require_once "autoload.php";
if (isset($_POST["objeto"]) && isset($_POST["nombre"])) {
    $figuraDeserializada = unserialize(urldecode($_POST["objeto"]));
    $toHtml = $figuraDeserializada->dibujarFigura();
    $nombre = $_POST["nombre"];
    echo "<h1>Hola usuario $nombre, aqui tu figura</h1>";
    echo "<p>";
    echo $toHtml;
    echo "</p>";
} else echo "<p>Error, <a href='index.php'>Volver</p>";

include_once "inc/footer.php";
