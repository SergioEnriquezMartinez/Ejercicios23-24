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
                            VALUES (:nombre, :apellidos, :email, :password, curdate(), "usuario")';

                $contraseñaSegura = password_hash($usuario->getPassword(), PASSWORD_DEFAULT);
                $nombre = $usuario->getNombre();
                $apellidos = $usuario->getApellidos();
                $email = $usuario->getEmail();

                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':nombre', $nombre);
                $sentencia->bindParam(':apellidos', $apellidos);
                $sentencia->bindParam(':email', $email);
                $sentencia->bindParam(':password', $contraseñaSegura);

                $this->logger->info('Consulta realizada: ' . $consulta);

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
    }
?>