<?php

$entradas = $data["entradas"] ?? NULL;
$categoria = $data["categoria"] ?? NULL;
use Manu\CarritoMvc\Config\Parameters;

echo "<h2 class='tituloEntrada'>Todos los productos de la sección: " . $categoria["nombre"] . "</h2>";
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
echo '<th>Add</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
$subtotal = 0;
foreach ($entradas as  $producto) {

    echo '<tr>';
    echo '<td>' . $producto['nombre'] . '</td>';
    echo '<td>' . $categoria['nombre'] . '</td>';
    echo '<td>' . $producto['descripcion'] . '</td>';
    echo '<td>' . $producto['precio'] . ' $</td>';
    echo '<td>' . $producto['precio'] * Parameters::$IVA . ' $</td>';

    echo '<td><a href="' . Parameters::$BASE_URL . 'Cart/AddToCart?id=' . $producto['id'] . '&categoria=' . $producto['categoria_id'] . '">
    <button type="button">Add to Cart</button>
</a></td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo "</div>";
