<?php
    include_once 'config/database.inc.php';

    try {
        $db = new PDO($cadCon, $usuario, $contrasena);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sentencia = $db->prepare("SELECT descripcion FROM estado");

        $sentencia->setFetchMode(PDO::FETCH_ASSOC);
        $sentencia->execute();

        $estados = [];
        while ($fila = $sentencia->fetch()) {
            $estados[] = $fila;
        }

    } catch (PDOException $e) {
        echo "Error al conectar con la base de datos: " . $e->getMessage();
    }

?>