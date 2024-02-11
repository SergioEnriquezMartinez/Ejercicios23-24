<?php

namespace Manu\CarritoMvc\Database;

use Manu\CarritoMvc\Config\configBD;

class Conexion
{
    public static function conectar()
    {
        try {
            $conexion = new \PDO('mysql:host='.ConfigBD::$SERVER_NAME_BD.';dbname='.ConfigBD::$DB_NAME.';port='.ConfigBD::$SERVER_POR_BD.';charset='.ConfigBD::$CHARSET, ConfigBD::$USER_DB, ConfigBD::$passwordBD);
            $conexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return NULL;
        }
    }
}
?>
