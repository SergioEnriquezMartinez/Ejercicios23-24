<?php

namespace Manu\CarritoMvc\Models;

use Manu\CarritoMvc\Database\Conexion;
use Manu\CarritoMvc\Config\Parameters;

class Model
{
    protected $conn;
    protected $tabla;
    public function __construct()
    {
        $this->conn = Conexion::conectar();
    }
    public function getLastEntradas()
    {
        try {
            $consulta = "select e.*, c.nombre as nombreCategoria
                        from entradas e join categorias c
                        on (e.categoria_id = c.id)
                        order by id desc
                        limit " . Parameters::$LAST_ENTRADAS;
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->setFetchMode(\PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            return $resultado;
        } catch (\PDOException $e) {
            echo "<p>Fallo en la conexion: " . $e->getMessage() . "</p>";
            return null;
        }
    }
    public function getAll()
    {
        try {
            $consulta = "select * from {$this->tabla}";
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->execute();
            $resultado = [];
            while ($fila = $sentencia->fetch()) {
                $resultado[] = $fila;
            }
            return $resultado;
        } catch (\PDOException $e) {
            echo '<p>Fallo en la conexión' . $e->getMessage() . '</p>';
            return null;
        }
    }
    public function getOne($id)
    {
        try {
            $consulta = "select * from {$this->tabla} where id = :id";
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->bindParam(':id', $id);
            $sentencia->setFetchMode(\PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            return $resultado;
        } catch (\PDOException $e) {
            echo '<p>Fallo en la conexion:' . $e->getMessage() . '</p>';
            return NULL;
        }
    }
    public function getAllCount($categoria = null)
    {
        $consulta = "";
        if ($categoria == null) {
            $consulta = "select count(*) as cuenta from {$this->tabla}";
            $sentencia = $this->conn->prepare($consulta);
        } else {
            $consulta = "select count(*) as cuenta from {$this->tabla} where categoria_id = :id";
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->bindParam(':id', $categoria);
        }
        try {

            $sentencia->setFetchMode(\PDO::FETCH_OBJ);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            return $resultado->cuenta;
        } catch (\PDOException $e) {
            echo '<p>Fallo en la conexion:' . $e->getMessage() . '</p>';
            return NULL;
        }
    }
    public function getDato($columna, $variable)
    {
        try {
            $consulta = "select * from {$this->tabla} where $columna = :variable";
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->bindParam(':variable', $variable);
            $sentencia->setFetchMode(\PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            return $resultado;
        } catch (\PDOException $e) {
            echo '<p>Fallo en la conexion:' . $e->getMessage() . '</p>';
            return NULL;
        }
    }
    
}
