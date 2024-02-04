<?php
    namespace Sergi\ProyectoBlog\Modelos;
    use Sergi\ProyectoBlog\Database\Conexion;
    use Sergi\ProyectoBlog\Ayudantes\LogFactory;

    class Modelo
    {
        protected $conexion;
        protected $tabla;
        protected $logger;

        public function __construct() {
            $this->conexion = Conexion::conectar();
            $this->logger = LogFactory::getLogger();
        }

        public function getOne($id) {
            try {
            $consulta = 'SELECT * FROM {$this->tabla} WHERE id = $id';

            $sentencia = $this->conexion->prepare($consulta);
            $sentencia->bindParam(':id', $id);
            $sentencia->setFetchMode((\PDO::FETCH_OBJ));
            $sentencia->execute();

            $this->logger->info('Consulta realizada: ' . $consulta);

            return $sentencia->fetch();
            } catch (\PDOException $e) {
                $this->logger->error('Error al obtener un registro de la tabla {$this->tabla}: ' . $e->getMessage());
                $this->logger->debug('Error al obtener un registro de la tabla {$this->tabla}: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function getAll() {
            try {
                $consulta = 'SELECT * FROM {$this->tabla}';
                
                $sentencia = $this->conexion->prepare(($consulta));
                $sentencia->setFetchMode(\PDO::FETCH_OBJ);
                $sentencia->execute();

                $this->logger->info('Consulta realizada: ' . $consulta);

                return $sentencia->fetchAll();
            } catch (\PDOException $e) {
                $this->logger->error('Error al obtener todos los registros de la tabla {$this->tabla}: ' . $e->getMessage());
                $this->logger->debug('Error al obtener todos los registros de la tabla {$this->tabla}: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function getAllCount() {
            try {
                $consulta = 'SELECT COUNT(*) FROM {$this->tabla}';

                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->setFetchMode(\PDO::FETCH_OBJ);
                $sentencia->execute();

                $this->logger->info('Consulta realizada: ' . $consulta);

                return $sentencia->fetch();
            } catch (\PDOException $e) {
                $this->logger->error('Error al obtener el número de registros de la tabla {$this->tabla}: ' . $e->getMessage());
                $this->logger->debug('Error al obtener el número de registros de la tabla {$this->tabla}: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

    }
?>