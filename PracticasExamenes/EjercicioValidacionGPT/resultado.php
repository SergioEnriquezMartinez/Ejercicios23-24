<?php
    include_once "includes/header.php";

    echo "<p>".$_GET["nombre"]."</p>";
    echo "<p>".$_GET["email"]."</p>";
    echo "<p>".$_GET["pass1"]."</p>";
    echo "<p>".$_GET["pass2"]."</p>";
    echo "<p>".$_GET["date"]."</p>";

    include_once "includes/footer.php";
?>