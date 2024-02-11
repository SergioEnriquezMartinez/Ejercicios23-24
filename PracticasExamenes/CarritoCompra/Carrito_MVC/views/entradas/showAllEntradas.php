<?php

use Manu\CarritoMvc\Config\Parameters;
echo "<div id='productos'>";
echo '<table border="1" class="tabla ">';
echo "<caption>Todos los productos</caption>";
echo '<thead>';
echo '<tr>';
echo '<th>Categoria</th>';
echo '<th>Producto</th>';
echo '<th>Descripcion</th>';
echo '<th>Precio (sin IVA)</th>';
echo '<th>Precio (con IVA)</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
$subtotal = 0;
foreach ($data["entradas"] as $key => $producto) {

    echo '<tr>';
    echo '<td>' . $producto['nombre'] . '</td>';
    echo '<td>' . $producto['nombreCategoria'] . '</td>';
    echo '<td>' . $producto['descripcion'] . '</td>';
    echo '<td>' . $producto['precio'] . ' $</td>';
    echo '<td>' . $producto['precio'] * Parameters::$IVA . ' $</td>';
    
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo "</div>";
?>