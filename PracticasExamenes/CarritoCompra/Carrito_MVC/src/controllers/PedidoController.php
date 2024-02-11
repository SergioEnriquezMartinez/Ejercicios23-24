<?php

namespace Manu\CarritoMvc\Controllers;

use Manu\CarritoMvc\Models\PedidoModel;
use Manu\CarritoMvc\Config\Parameters;
use Manu\CarritoMvc\Models\DetallesPedidosModel;

class PedidoController
{
    public function crearPedido()
    {
        if (isset($_SESSION["cart"])) {
            $carro = $_SESSION["cart"];
            $usuario = $_SESSION["user"];
            $newPedido = new PedidoModel();
            var_dump($usuario["id"]);
            $consultaPedido = $newPedido->crearPedido($usuario["id"], $_GET["subtotal"]);
           $consultarIdPedido = $newPedido->ultimoPedido($usuario["id"]);
           $pedidoIdVal = intval($consultarIdPedido);
           //var_dump($consultarIdPedido);
            $productos = new PedidoModel();
            
            foreach ($carro as $producto) {
                $idProductos = $producto["id"];
                $cantidad = $producto["cantidad"];
                $precio = $producto["precio"];
                $resultadoProductos = $productos->detallesPedido($consultarIdPedido["id"],$idProductos,$cantidad, $precio);

            }
        }
        ViewController::show("views/entradas/pedidoRealizado.php",["numeroPedido"=>$consultarIdPedido["id"]]);
        
    }
    public function mostrarPedido(){
        if (isset($_SESSION["user"])){
            $usuario = new PedidoModel();
            $ultimosPedidos = $usuario->consultarPedidos($_SESSION["user"]["id"]);
            ViewController::show("views/entradas/ultimosPedidos.php",["pedidos"=>$ultimosPedidos]);
            
        }
    }
    public function factura(){
        if (isset($_SESSION["user"])){
            $usuario = new DetallesPedidosModel();
            $pedido = $usuario->nombreProductosPedido($_GET["id"]);
            ViewController::show("views/entradas/showDetallePedido.php",["pedidos"=>$pedido]);
            
        }
    }
}
