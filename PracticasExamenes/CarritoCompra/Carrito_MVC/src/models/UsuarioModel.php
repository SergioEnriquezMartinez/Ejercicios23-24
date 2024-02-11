<?php

namespace Manu\CarritoMvc\Models;

use Manu\CarritoMvc\Entities\UserEntity;

class UsuarioModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabla = "usuarios";
    }
    public function  register(UserEntity $user)
    {
        try {
            $consulta = "insert into usuarios(nombre, apellido, correo, contrasena)
                    values (:nombre, :apellidos, :email, :password)";

            $passwordSecure =  password_hash($user->getPassword(), PASSWORD_DEFAULT);
            $nombre = $user->getNombre();
            $apellidos = $user->getApellidos();
            $email = $user->getEmail();

            $sentencia = $this->conn->prepare($consulta);
            $sentencia->bindParam(':nombre', $nombre);
            $sentencia->bindParam(':apellidos', $apellidos);
            $sentencia->bindParam(':email', $email);
            $sentencia->bindParam(':password', $passwordSecure);

            return $sentencia->execute();
        } catch (\PDOException $e) {
            echo '<p> Excepcion Alta:' . $e->getMessage() . '</p>';
            return NULL;
        }
    }
    public function actualizarDatos(UserEntity $user, $id)
    {
        try {
            $consulta = "";
            if ($user->getPassword() == "") {
                $consulta = "UPDATE usuarios
            SET nombre = :nombre, apellidos = :apellidos,
            email = :email 
            WHERE id = :id";
                $sentencia = $this->conn->prepare($consulta);
            } else {

                $consulta = "";
                $consulta = "UPDATE usuarios
            SET nombre = :nombre, apellidos = :apellidos,
            email = :email, password = :password 
            WHERE id = :id";
                $passwordSecure =  password_hash($user->getPassword(), PASSWORD_DEFAULT);
                $_SESSION["secure"]= $passwordSecure;
                $sentencia = $this->conn->prepare($consulta);
                $sentencia->bindParam(':password', $passwordSecure);
            }
            $nombre = $user->getNombre();
            $apellidos = $user->getApellidos();
            $email = $user->getEmail();
            $idVal = intval($id);
            $sentencia->bindParam(':nombre', $nombre);
            $sentencia->bindParam(':apellidos', $apellidos);
            $sentencia->bindParam(':email', $email);
            $sentencia->bindParam(':id', $idVal);
            return $sentencia->execute();
        } catch (\PDOException $e) {
            echo '<p> Excepcion Alta:' . $e->getMessage() . '</p>';
            return NULL;
        }
    }
}
