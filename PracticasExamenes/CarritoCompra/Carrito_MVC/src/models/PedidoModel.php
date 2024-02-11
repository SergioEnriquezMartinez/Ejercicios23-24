<?php

namespace Manu\CarritoMvc\Models;

use Manu\Blog\Config\Parameters;
use Manu\Blog\Entities\EntradaEntity;

class PedidoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabla = "pedidos";
    }
    public function crearPedido($usuario_id, $precioTotal)
    {
        try {
            $consulta = "insert into pedidos(usuario_id, fecha_pedido, total_pedido)
        values (:usuario_id, curdate(), :totalPedido)";
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->bindParam(':usuario_id', $usuario_id);
            $sentencia->bindParam(':totalPedido', $precioTotal);
            return $sentencia->execute();
        } catch (\PDOException $e) {
            echo "<p>Fallo en la conexión" . $e->getMessage() . "</p>";
            return null;
        }
    }
    public function ultimoPedido($idCliente, )
    {
        try {
            $consulta = "SELECT id
            FROM pedidos
            WHERE usuario_id = :id_cliente
            ORDER BY id DESC
            LIMIT 1";
            
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->bindParam(':id_cliente', $idCliente);
            $sentencia->setFetchMode(\PDO::FETCH_ASSOC);
            $sentencia->execute();
            return $sentencia->fetch();
        } catch (\PDOException $e) {
            echo "<p>Fallo en la conexión" . $e->getMessage() . "</p>";
            return null;
        }
    }
    public function detallesPedido($id_pedido, $producto_id, $cantidad, $precio){
        try{
            $consulta = "insert into detalles_pedidos(id_pedido, producto_id, cantidad, precio_unitario)
        values (:id_pedido, :id_producto , :cantidad, :precio_unitario)";
            $sentencia = $this->conn->prepare($consulta);
            $idPedio = intval($id_pedido);
            $sentencia->bindParam(':id_pedido', $idPedio);
            $sentencia->bindParam(':id_producto', $producto_id);
            $sentencia->bindParam(':cantidad', $cantidad);
            $sentencia->bindParam(':precio_unitario', $precio);
            return $sentencia->execute();
        }catch(\PDOException $e){
            echo "<p>Fallo en la conexión" . $e->getMessage() . "</p>";
            return null;
        }
    }
    public function consultarPedidos($id_usuario){
        try{
            $consulta = "select * from pedidos where usuario_id = :idusuario";
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->bindParam(':idusuario', $id_usuario);
            $sentencia->setFetchMode(\PDO::FETCH_ASSOC);
            $sentencia->execute();
            return $sentencia->fetchAll();
            
        }catch(\PDOException $e){
            echo "<p>Fallo en la conexión" . $e->getMessage() . "</p>";
            return null;

        }
    }
}
