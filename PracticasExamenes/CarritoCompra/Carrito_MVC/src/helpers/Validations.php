<?php

namespace Manu\CarritoMvc\Helpers;

use Manu\CarritoMvc\Models\UsuarioModel;

class Validations
{
    public static function validaName(string $nombre): bool
    {
        if (is_string($nombre) && preg_match('/^[A-ZÁÉÍÓÚÜ][a-záéíóúü]+(?: [A-ZÁÉÍÓÚÜ][a-záéíóúü]+)?$/', $nombre)) {
            return true;
        }
        return false;
    }
    public static function validaMail(string $mail): bool
    {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    public static function iguales($variable1, $variable2)
    {
        if ($variable1 == $variable2) {
            return true;
        }
        return false;
    }
    public static function validaPass(string $passWd): bool
    {
        if (preg_match("/^(?=.*[A-Z])(?=.*\d).{4,}+$/", $passWd)) {
            return true;
        }
        return false;
    }
    /* public static function existeEmail($email):bool{
        $emailBaseDatos = new UsuarioModel();
                $arrayUsuarios = $emailBaseDatos->getAll();
                foreach ($arrayUsuarios as  $email) {
                    if ($email["email"] == $_POST["email"]) {
                        return true;
                    }
                }
                return false;
    }
    */
    public static function existeEmail($columna, $variable): bool
    {
        $emailBaseDatos = new UsuarioModel();
        $arrayUsuarios = $emailBaseDatos->getDato($columna, $variable);
        if (empty($arrayUsuarios)) {
            return false;
        }
        return true;
    }
    public static function validatePasswd($pass1,$email)
    {
        $passUsuario = new UsuarioModel();
        $arrayUsuarios = $passUsuario->getDato("correo", $email);
       
            $passwd = $arrayUsuarios["contrasena"];
            $_SESSION["pass"]= $passwd;
            $_SESSION["passUser"]= $arrayUsuarios["nombre"];
        if (password_verify($pass1, $passwd)) {
            return true;
        }
        return false;
    }
    public static function isString($parametro):bool{
        
        if (preg_match("/^[a-zA-Z]+$/", $parametro)) {
            return true;
        }
        return false;
    }
}
