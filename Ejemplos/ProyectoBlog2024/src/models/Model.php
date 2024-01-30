<?php
namespace Mgj\ProyectoBlog2024\Models;
use Mgj\ProyectoBlog2024\Database\Conexion;

class Model{
    protected $conn;
    protected $tabla;

    public function __construct(){
        $this->conn = Conexion::conectar();
    }

    public function getOne($id){
        try {

            $consulta = "select * from {$this->tabla} where id = :id";

            $sentencia = $this->conn->prepare($consulta);
            $sentencia->bindParam(':id', $id);
            //$sentencia->setFetchMode(\PDO::FETCH_ASSOC);
            $sentencia->setFetchMode(\PDO::FETCH_OBJ);
            $sentencia->execute();
            
            $resultado = $sentencia->fetch();
            return $resultado;

        } catch (\PDOException $e) {
            echo '<p>Fallo en la conexion:' . $e->getMessage() . '</p>';
            // Registrar en un sistema de Log
            return NULL;
        }
    }
    public function getAll(){
        try {

            $consulta = "select * from {$this->tabla}";

            $sentencia = $this->conn->prepare($consulta);
            $sentencia->setFetchMode(\PDO::FETCH_ASSOC);
            $sentencia->execute();

            $resultado = $sentencia->fetchAll();
            return $resultado;

        } catch (\PDOException $e) {
            echo '<p>Fallo en la conexion:' . $e->getMessage() . '</p>';
            // Registrar en un sistema de Log
            return NULL;
        }        
    }
}