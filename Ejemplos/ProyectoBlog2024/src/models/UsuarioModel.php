<?php
namespace Mgj\ProyectoBlog2024\Models;
use Mgj\ProyectoBlog2024\Entities\UserEntity;

class UsuarioModel extends Model{

    public function __construct(){
        parent::__construct();
        $this->tabla = "usuarios";
    }

    public function register(UserEntity $user){
        try {
            $consulta = "insert into usuarios(nombre, apellidos, email, password, fecha)
                        values (:nombre, :apellidos, :email, :password, curdate())";

            $passwordSecure =  password_hash($user->getPassword(),PASSWORD_DEFAULT);
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

    public function login($email){
        $consulta =" select * from usuarios where email = :email";
        try{
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->bindParam(':email', $email);
            $sentencia->execute();
            // Se retorna el objeto:
            return $sentencia->fetch(\PDO::FETCH_OBJ);
        }catch(\PDOException $e){
            return NULL;
        }
    }
    
}