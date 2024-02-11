<?php

namespace Manu\CarritoMvc\Models;

use Manu\Blog\Config\Parameters;
use Manu\Blog\Entities\EntradaEntity;

class DetallesPedidosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabla = "detalles_pedidos";
    }
    public function nombreProductosPedido($idPedido){
        try{
            $consulta = "SELECT dp.*, p.nombre AS nombreProducto, pe.fecha_pedido AS fechaPedido
            FROM detalles_pedidos dp
            JOIN productos p ON dp.producto_id = p.id
            JOIN pedidos pe ON dp.id_pedido = pe.id
            WHERE dp.id_pedido = :idPedido;";
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->bindParam(':idPedido', $idPedido);
            $sentencia->setFetchMode(\PDO::FETCH_ASSOC);
            $sentencia->execute();
            return $sentencia->fetchAll();
        }catch(\PDOException $e){

        }

    }
}