<h2>Pedido Realizado con éxito</h2>
<?php
use Manu\CarritoMvc\Config\Parameters;
echo "<h4>Felicidades ".$_SESSION["user"]["nombre"]. " Su pedido con número: ".$data["numeroPedido"]." ha sido registrado con éxito</h4>";

$_SESSION["cart"]=null;
echo '<td><a href="' . Parameters::$BASE_URL . 'Pedido/mostrarPedido">
        <button type="button">Consultar Pedidos</button>
        </a></td>';