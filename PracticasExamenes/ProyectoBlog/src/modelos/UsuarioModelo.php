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
                $consulta = 'INSERT INTO usuarios (nombre, apellidos, email, password, fecha)
                            VALUES (:nombre, :apellidos, :email, :password, :fecha)';

                $contraseñaSegura = password_hash($usuario->getPassword(), PASSWORD_DEFAULT);

                $sentencia = $this->conexion->prepare($consulta);
                $sentencia->bindParam(':nombre', $usuario->getNombre());
                $sentencia->bindParam(':apellidos', $usuario->getApellidos());
                $sentencia->bindParam(':email', $usuario->getEmail());
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
    }
?>