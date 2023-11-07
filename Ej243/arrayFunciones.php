<?php
require_once 'biblioteca.php';

$funciones = get_defined_functions()['user'];

if (isset($_GET["num1"]) && isset($_GET["num2"])) {
    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];


    foreach ($funciones as $f) {
        $f($num1, $num2);
    }
} else {
    echo "<p>Introduce los números correctamente</p>";
}
?>