<?php
include_once 'encabezado.html';
include_once 'preparaCompra.php';

echo "<h2>Lista de la compra</h2>";
echo "<>";

foreach ($productos as $nombreProducto => $precio) {
    echo "<li>$nombreProducto - Precio: $precio €</li>";
}
echo "</ul>";

include_once 'footer.html';
?>