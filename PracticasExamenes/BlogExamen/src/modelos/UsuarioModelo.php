<?php
    namespace Sergi\ProyectoBlog\Modelos;

    use Sergi\ProyectoBlog\Entidades\UsuarioEntidad;

    class UsuarioModelo extends Modelo
    {
        public function __construct() {
            parent::__construct();
            $this->tabla = "usuarios";
        }

        public function registro(UsuarioEntidad $usuario) {
            try {
                $consulta = 'INSERT INTO usuarios (nombre, apellidos, email, password, fecha, rol)
                            VALUES (:nombre, :apellidos, :email, :password, curdate())';

                $contraseñaSegura = password_hash($usuario->getPassword(), PASSWORD_DEFAULT);
                $nombre = $usuario->getNombre();
                $apellidos = $usuario->getApellidos();
                $email = $usuario->getEmail();

                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':nombre', $nombre);
                $sentencia->bindParam(':apellidos', $apellidos);
                $sentencia->bindParam(':email', $email);
                $sentencia->bindParam(':password', $contraseñaSegura);


                return $sentencia->execute();
                
            } catch (\PDOException $e) {
                $this->logger->error('Error al registrar un usuario: ' . $e->getMessage());
                $this->logger->debug('Error al registrar un usuario: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function login($email) {
            try {
                $consulta = 'SELECT * FROM usuarios WHERE email = :email';
                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':email', $email);
                $sentencia->setFetchMode(\PDO::FETCH_OBJ);
                $sentencia->execute();

                return $sentencia->fetch();
            } catch (\PDOException $e) {
                $this->logger->error('Error al loguear un usuario: ' . $e->getMessage());
                $this->logger->debug('Error al loguear un usuario: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function actualizarUsuario(UsuarioEntidad $usuario, $passChange) {
            try{
                $consulta = 'UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos';
                if ($passChange) {
                    $consulta .= ', password = :password';
                }
                $consulta .= ' WHERE id = :id';
                
                $nombre = $usuario->getNombre();
                $apellidos = $usuario->getApellidos();
                $id = $usuario->getId();

                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':nombre', $nombre);
                $sentencia->bindParam(':apellidos', $apellidos);
                
                if ($passChange) {
                    $contraseñaSegura = password_hash($usuario->getPassword(), PASSWORD_DEFAULT);
                    $sentencia->bindParam(':password', $contraseñaSegura);
                }

                
                $sentencia->bindParam(':id', intval($id));

                return $sentencia->execute();
            } catch (\PDOException $e) {
                $this->logger->error('Error al actualizar un usuario: ' . $e->getMessage());
                $this->logger->debug('Error al actualizar un usuario: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function getVotos($idUsuario) {
            try {
                $consulta = 'SELECT v.usuario_id, e.id AS idEntrada, e.titulo, e.descripcion, e.fecha, e.id, e.categoria_id, c.nombre AS nombreCategoria
                            FROM votos v
                            JOIN entradas e ON v.entrada_id = e.id
                            JOIN categorias c ON e.categoria_id = c.id
                            WHERE v.usuario_id = :usuario_id GROUP BY usuario_id';
                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':usuario_id', $idUsuario);
                $sentencia->setFetchMode(\PDO::FETCH_OBJ);
                $sentencia->execute();

                return $sentencia->fetchAll();
            } catch (\PDOException $e) {
                $this->logger->error('Error al obtener los votos de un usuario: ' . $e->getMessage());
                $this->logger->debug('Error al obtener los votos de un usuario: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

        public function getCantidadVotos($idUsuario) {
            try {
                $consulta = 'SELECT COUNT(*) AS cantidadVotos FROM votos WHERE usuario_id = :usuario_id';
                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':usuario_id', $idUsuario);
                $sentencia->setFetchMode(\PDO::FETCH_OBJ);
                $sentencia->execute();

                return $sentencia->fetch();
            } catch (\PDOException $e) {
                $this->logger->error('Error al obtener la cantidad de votos de un usuario: ' . $e->getMessage());
                $this->logger->debug('Error al obtener la cantidad de votos de un usuario: ' . $e->getMessage());
                echo '<p>Fallo en la conexión:' . $e->getMessage() . '</p>';
                return null;
            }
        }

       
    }
?>