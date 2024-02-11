<?php

use Manu\CarritoMvc\Config\Parameters;

echo "<div id='productos'>";
echo '<table border="1" class="tabla ">';
$pedio = $data["pedidos"];
echo "<caption>Pedido numero " . $pedio[0]["id_pedido"] . " Con fecha " . $pedio[0]["fechaPedido"] . " Realizado por: " . $_SESSION["user"]["nombre"] . " " . $_SESSION["user"]["apellido"] . "</caption>";
echo '<thead>';
echo '<tr>';
echo '<th>idPedido</th>';
echo '<th>Nombre Producto</th>';
echo '<th>Cantidad</th>';
echo '<th>Precio Unidad</th>';

echo '</tr>';
echo '</thead>';
echo '<tbody>';
$subtotal = 0;
foreach ($data["pedidos"] as $key => $pedido) {
    $subtotal += (floatval($pedido['precio_unitario']) * Parameters::$IVA) * $pedido["cantidad"];

    echo "<a>";
    echo '<tr>';
    echo '<td>' . $pedido['id_pedido'] . '</td>';
    echo '<td>' . $pedido['nombreProducto'] . '</td>';
    echo '<td>' . $pedido['cantidad'] . '</td>';
    echo '<td>' . $pedido['precio_unitario'] . '$</td>';



    echo '</tr>';
}
echo "<tr>";
echo '<td> </td>';
echo '<td></td>';
echo '<td>Subtotal IVA 21% </td>';
echo '<td>' . round($subtotal, 2) . '$</td>';
echo '</tbody>';
echo '</table>';
echo "</div>";
