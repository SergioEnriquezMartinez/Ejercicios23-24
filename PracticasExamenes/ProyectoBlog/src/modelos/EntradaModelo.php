<?php
    namespace Sergi\ProyectoBlog\Modelos;
    use Sergi\ProyectoBlog\Config\Parametros;

    class EntradaModelo extends Modelo
    {
        public function __construct() {
            parent::__construct();
            $this->tabla = 'entradas';
        }

        public function getLastEntradas() {
            try {
                $consulta = 'SELECT e.*, c.nombre as nombreCategoria
                            FROM entradas e INNER JOIN categorias c
                                ON e.categoria_id = c.id
                            ORDER BY id DESC
                            LIMIT ' . Parametros::$LAST_ENTRADAS;
                
                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->setFetchMode(\PDO::FETCH_OBJ);
                $sentencia->execute();

                $this->logger->info('Consulta realizada: ' . $consulta);

                return $sentencia->fetchAll();
            } catch (\PDOException $e) {
                $this->logger->error('Error al obtener las últimas entradas: ' . $e->getMessage());
                $this->logger->debug('Error al obtener las últimas entradas: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function getEntradas($limiteInicial = NULL, $limiteFinal = NULL) {
            try {
                $consulta = 'SELECT e.*, c.nombre as nombreCategoria
                            FROM entradas e INNER JOIN categorias c
                                ON e.categoria_id = c.id
                            ORDER BY id DESC';

                if (isset($limiteInicial) && isset($limiteFinal)) {
                    $consulta .= ' LIMIT $limiteInicial, $limiteFinal';
                }

                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->setFetchMode(\PDO::FETCH_OBJ);
                $sentencia->execute();

                $this->logger->info('Consulta realizada: ' . $consulta);

                return $sentencia->fetchAll();
            } catch (\PDOException $e) {
                $this->logger->error('Error al obtener las entradas: ' . $e->getMessage());
                $this->logger->debug('Error al obtener las entradas: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function getEntradasCategoria($idCategoria) {
            try {
                $consulta = 'SELECT e.*, c.nombre as nombreCategoria
                            FROM entradas e INNER JOIN categorias c
                                ON e.categoria_id = c.id
                            WHERE e.categoria_id = :idCategoria
                            ORDER BY id DESC';
                
                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':idCategoria', $idCategoria);
                $sentencia->setFetchMode(\PDO::FETCH_OBJ);
                $sentencia->execute();

                $this->logger->info('Consulta realizada: ' . $consulta);

                return $sentencia->fetchAll();
            } catch (\PDOException $e) {
                $this->logger->error('Error al obtener las entradas de la categoría: ' . $e->getMessage());
                $this->logger->debug('Error al obtener las entradas de la categoría: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

    }
?>