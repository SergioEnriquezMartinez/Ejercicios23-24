<?php

?>
<?php

use Manu\CarritoMvc\Config\Parameters;

echo "<div id='productos'>";
if (isset($_SESSION["cart"])) {
    echo "<div>";
    echo "<h2>Carrito</h2>";
    echo "</div>";
    echo '<table border="1" class="tabla ">';
    echo "<caption>Todos los productos</caption>";
    echo '<thead>';
    echo '<tr>';
    echo '<th>Categoria</th>';
    echo '<th>Producto</th>';
    echo '<th>Descripcion</th>';
    echo '<th>Cantidad</th>';
    echo '<th>Precio (sin IVA)</th>';
    echo '<th>Precio (con IVA)</th>';
    echo '<th>Delete</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    $subtotal = 0;
    foreach ($_SESSION["cart"] as  $producto) {
        $subtotal += (floatval($producto['precio']) * Parameters::$IVA) * $producto["cantidad"];
        echo '<tr>';
        echo '<td>' . $producto['nombre'] . '</td>';
        echo '<td>' . $producto['categoria_id'] . '</td>';
        echo '<td>' . $producto['descripcion'] . '</td>';
        echo '<td>' . $producto['cantidad'] . '</td>';
        echo '<td>' . $producto['precio'] . ' $</td>';
        echo '<td>' . ($producto['precio'] * Parameters::$IVA) * $producto["cantidad"] . ' $</td>';
        echo '<td><a href="' . Parameters::$BASE_URL . 'Cart/delete?id=' . $producto['id'] . '">
        <button type="button">Delete</button>
        </a></td>';
        echo '</tr>';
    }

    echo "<tr>";
    echo '<td> </td>';
    echo '<td></td>';
    echo '<td>Subtotal </td>';
    echo '<td>' . round($subtotal, 2) . '$</td>';
    echo '<td><a href="' . Parameters::$BASE_URL . 'Cart/vaciarCarro">
    <button type="button">Vaciar Carro</button>
    </a></td>';
    if (isset($_SESSION["user"])) {

        echo '<td><a href="' . Parameters::$BASE_URL . 'Pedido/crearPedido?subtotal=' . $subtotal .   '">
        <button type="button">Realizar Pedido</button>
        </a></td>';
    }
    echo "</tr>";
    echo '</tbody>';
    echo '</table>';
    echo "</div>";
    echo "<div id='acciones'>";
    echo "<br>";
} else {
    echo "<p>El carro está vacio</p>";
}
echo "</div>";
?>