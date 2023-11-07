<?php
if (isset($_GET["cantidad"])) {
    $cantidad = $_GET["cantidad"];
    for ($i = 0; $i < $cantidad; $i++) {
        $precio = rand(1, 100);
        $productos["producto" . $i] = $precio;
    }
} else {
    echo "<p>Error</p>";
}
?>