<?php
    include_once "inc/header.php";

    echo "<p>".$_GET["nombre"]."</p>";
    echo "<p>".$_GET["email"]."</p>";
    echo "<p>".$_GET["pass1"]."</p>";
    echo "<p>".$_GET["pass2"]."</p>";
    echo "<p>".$_GET["fecha"]."</p>";
    echo "<p>".$_GET["telf"]."</p>";
    echo "<p>".$_GET["cp"]."</p>";
    echo "<p>".$_GET["opciones"]."</p>";

    include_once "inc/footer.php";
?>