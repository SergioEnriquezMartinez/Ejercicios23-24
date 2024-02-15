<?php

namespace Sergi\ProyectoBlog\Database;
use Sergi\ProyectoBlog\Config\ConfiguracionBD;

class Conexion
{
    public static function conectar() {
        try {
            $conexion = new \PDO('mysql:host=' . ConfiguracionBD::$DB_HOST . ';port=' . ConfiguracionBD::$DB_PORT . ';dbname=' . ConfiguracionBD::$DB_NAME . ';charset=' . ConfiguracionBD::$CHARSET, ConfiguracionBD::$DB_USER, ConfiguracionBD::$DB_PASSWORD);
            $conexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (\PDOException $e) {
            echo 'Error al conectar con la base de datos: ' . $e->getMessage();
            return null;
        }
    }
}

?>