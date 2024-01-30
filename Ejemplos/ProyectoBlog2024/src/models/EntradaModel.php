<?php
namespace Mgj\ProyectoBlog2024\Models;
use Mgj\ProyectoBlog2024\Config\Parameters;

class EntradaModel extends Model{


   public function __construct(){
        parent::__construct();
        $this->tabla = "entradas";
    }

    public function getLastEntradas(){
        try {

            $consulta = "select e.*, c.nombre as nombreCategoria
                        from entradas e inner join categorias c 
                            on (e.categoria_id = c.id)
                        order by id desc 
                        limit " . Parameters::$LAST_ENTRADAS;

            $sentencia = $this->conn->prepare($consulta);
            $sentencia->setFetchMode(\PDO::FETCH_ASSOC);
            $sentencia->execute();

            $resultado = $sentencia->fetchAll();
            return $resultado;

        } catch (\PDOException $e) {
            echo '<p>Fallo en la conexion:' . $e->getMessage() . '</p>';
            return NULL;
        }      
    }

    public function getEntradasCategoria($idCategoria){
        try {

            $consulta = "select e.*, c.nombre as nombreCategoria
                        from entradas e inner join categorias c 
                            on (e.categoria_id = c.id)
                        where e.categoria_id = :idCategoria
                        order by id desc";

            $sentencia = $this->conn->prepare($consulta);
            $sentencia->bindParam(':idCategoria', $idCategoria);
            $sentencia->setFetchMode(\PDO::FETCH_ASSOC);
            $sentencia->execute();

            $resultado = $sentencia->fetchAll();
            return $resultado;

        } catch (\PDOException $e) {
            echo '<p>Fallo en la conexion:' . $e->getMessage() . '</p>';
            return NULL;
        }      
    }
}