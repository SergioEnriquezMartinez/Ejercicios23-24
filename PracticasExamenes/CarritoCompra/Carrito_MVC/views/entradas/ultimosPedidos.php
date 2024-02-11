<?php

use Manu\CarritoMvc\Config\Parameters;
echo "<div id='productos'>";
echo '<table border="1" class="tabla ">';
echo "<caption>Todos los pedidos de :" .$_SESSION["user"]["nombre"]." ".$_SESSION["user"]["apellido"]."</caption>";
echo '<thead>';
echo '<tr>';
echo '<th>idPedido</th>';
echo '<th>Fecha Pedido</th>';
echo '<th>Total</th>';
echo '<th>Detalles</th>';

echo '</tr>';
echo '</thead>';
echo '<tbody>';
$subtotal = 0;
foreach ($data["pedidos"] as $key => $pedido) {
    echo "<a>";
    echo '<tr>';
    echo '<td>' . $pedido['id'] . '</td>';
    echo '<td>' . $pedido['fecha_pedido'] . '</td>';
    echo '<td>' . $pedido['total_pedido'] . '</td>';
    echo '<td><a href="' . Parameters::$BASE_URL . 'Pedido/factura?id=' . $pedido['id'] .'">
    <button type="button">Ver más</button>
</a></td>';
    echo "</a>";
    
    
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo "</div>";
?>