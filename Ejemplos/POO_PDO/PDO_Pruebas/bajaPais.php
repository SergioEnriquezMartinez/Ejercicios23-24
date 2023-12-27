<?php
    include_once "config/database.inc.php";

    try {

        $conexion = new PDO($cadConexion, $usuarioBD, $passwordBD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Validar los parámetros:
        $nombre = $_POST["nombre"];
        $sql="DELETE FROM pais 
                where upper(nombre) = upper(:nombre)";
        
        $sentencia = $conexion->prepare($sql);        
        $sentencia->bindParam(":nombre", $nombre);
        $isOk = $sentencia->execute();
        $numFilasBorradas = $sentencia->rowCount();

        echo "<p> Número de Paises borrados: $numFilasBorradas </p>";

    } catch (PDOException $e) {
        echo "<p>Falló la conexión: {$e->getMessage()} </p>";
    }

    echo "<p><a href='formBajaPais.php'>Volver al formulario anterior</a></p>";
