<?php
    namespace Sergi\ProyectoBlog\Modelos;

    use Sergi\ProyectoBlog\Entidades\CategoriaEntidad;

    class CategoriaModelo extends Modelo
    {
        public function __construct() {
            parent::__construct();
            $this->tabla = "categorias";
        }

        public function crearCategoria(CategoriaEntidad $categoria) {
            try {
                $consulta = 'INSERT INTO categorias (nombre) VALUES (:nombre)';
    
                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':nombre', $categoria->getNombre());
                
                return $sentencia->execute();
            } catch (\PDOException $e) {
                $this->logger->error('Error al crear una categoría: ' . $e->getMessage());
                $this->logger->debug('Error al crear una categoría: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

    }


?>