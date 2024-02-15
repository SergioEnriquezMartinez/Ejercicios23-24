<?php
    namespace Sergi\ProyectoBlog\Modelos;
    use Sergi\ProyectoBlog\Config\Parametros;
use Sergi\ProyectoBlog\Entidades\EntradaEntidad;

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
                    $consulta .= ' LIMIT ' .$limiteInicial .', ' . $limiteFinal;
                }

                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->setFetchMode(\PDO::FETCH_OBJ);
                $sentencia->execute();


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


                return $sentencia->fetchAll();
            } catch (\PDOException $e) {
                $this->logger->error('Error al obtener las entradas de la categoría: ' . $e->getMessage());
                $this->logger->debug('Error al obtener las entradas de la categoría: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function crearEntrada(EntradaEntidad $entrada) {
            try {
                $consulta = 'INSERT INTO entradas (titulo, descripcion, categoria_id, usuario_id, fecha)
                            VALUES (:titulo, :descripcion, :categoria_id, :usuario_id, curdate())';
                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':titulo', $entrada->getTitulo());
                $sentencia->bindParam(':descripcion', $entrada->getDescripcion());
                $sentencia->bindParam(':categoria_id', $entrada->getCategoriaId());
                $sentencia->bindParam(':usuario_id', $entrada->getUsuarioId());
                
                return $sentencia->execute();
            } catch (\PDOException $e) {
                $this->logger->error('Error al crear la entrada: ' . $e->getMessage());
                $this->logger->debug('Error al crear la entrada: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function buscar($busqueda) {
            try {
                $consulta = 'SELECT e.id, e.titulo, e.descripcion, c.nombre as nombreCategoria, u.nombre as nombreUsuario,
                                u.apellidos as apellidosUsuario, e.fecha
                            FROM entradas e JOIN categorias c ON e.categoria_id = c.id
                                JOIN usuarios u ON e.usuario_id = u.id
                            WHERE e.titulo LIKE :busqueda OR e.descripcion LIKE :busqueda
                            OR c.nombre LIKE :busqueda OR u.nombre LIKE :busqueda
                            OR u.apellidos LIKE :busqueda OR e.fecha LIKE :busqueda
                            ORDER BY e.id DESC';

                $busqueda = '%' . $busqueda . '%';
    
                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':busqueda', $busqueda);
                $sentencia->setFetchMode(\PDO::FETCH_OBJ);
                $sentencia->execute();
    
                return $sentencia->fetchAll();
            } catch (\PDOException $e) {
                $this->logger->error('Error al buscar: ' . $e->getMessage());
                $this->logger->debug('Error al buscar: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function borrarEntrada($idEntrada) {
            try {
                $consulta = 'DELETE FROM entradas WHERE id = :idEntrada';
                
                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':idEntrada', $idEntrada);
                
                return $sentencia->execute();
            } catch (\PDOException $e) {
                $this->logger->error('Error al borrar la entrada: ' . $e->getMessage());
                $this->logger->debug('Error al borrar la entrada: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function editarEntrada(EntradaEntidad $entrada) {
            try {
                $consulta = 'UPDATE entradas SET titulo = :titulo, descripcion = :descripcion, categoria_id = :categoria_id
                            WHERE id = :id';
                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':titulo', $entrada->getTitulo());
                $sentencia->bindParam(':descripcion', $entrada->getDescripcion());
                $sentencia->bindParam(':categoria_id', $entrada->getCategoriaId());
                $sentencia->bindParam(':id', $entrada->getId());
                
                return $sentencia->execute();
            } catch (\PDOException $e) {
                $this->logger->error('Error al editar la entrada: ' . $e->getMessage());
                $this->logger->debug('Error al editar la entrada: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function getEntradasMasVotadas() {
            try {
                $consulta = 'SELECT e.id, e.titulo, e.descripcion, e.fecha, c.nombre AS nombreCategoria, v.entrada_id, COUNT(*) AS conteo FROM votos v 
                            JOIN entradas e ON v.entrada_id = e.id
                            JOIN categorias c ON e.categoria_id = c.id
                            GROUP BY v.entrada_id ORDER by conteo DESC';
                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->setFetchMode(\PDO::FETCH_OBJ);
                $sentencia->execute();

                return $sentencia->fetchAll();
            } catch (\PDOException $e) {
                $this->logger->error('Error al obtener las entradas más votadas: ' . $e->getMessage());
                $this->logger->debug('Error al obtener las entradas más votadas: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function votarEntrada($idEntrada) {
            try {
                $consulta = 'INSERT INTO votos (entrada_id, usuario_id, fecha)
                            VALUES (:entrada_id, :usuario_id, curdate())';
                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':entrada_id', $idEntrada);
                $sentencia->bindParam(':usuario_id', $_SESSION['user']->id);

                return $sentencia->execute();
            } catch (\PDOException $e) {
                $this->logger->error('Error al votar la entrada: ' . $e->getMessage());
                $this->logger->debug('Error al votar la entrada: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function eliminarVotoEntrada($idEntrada) {
            try {
                $consulta = 'DELETE FROM votos WHERE entrada_id = :entrada_id AND usuario_id = :usuario_id';
                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':entrada_id', $idEntrada);
                $sentencia->bindParam(':usuario_id', $_SESSION['user']->id);

                return $sentencia->execute();
            } catch (\PDOException $e) {
                $this->logger->error('Error al eliminar el voto de la entrada: ' . $e->getMessage());
                $this->logger->debug('Error al eliminar el voto de la entrada: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function getVotoEntrada($idEntrada, $idUsuario) {
            try {
                $consulta = 'SELECT * FROM votos WHERE entrada_id = :entrada_id AND usuario_id = :usuario_id';
                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':entrada_id', $idEntrada);
                $sentencia->bindParam(':usuario_id', $idUsuario);
                $sentencia->setFetchMode(\PDO::FETCH_OBJ);
                $sentencia->execute();

                $resultado = $sentencia->fetch();
                return $resultado ? true : false;
            } catch (\PDOException $e) {
                $this->logger->error('Error al obtener el voto de la entrada: ' . $e->getMessage());
                $this->logger->debug('Error al obtener el voto de la entrada: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

    }
?>