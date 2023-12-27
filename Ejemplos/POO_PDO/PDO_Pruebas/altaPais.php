<?php
    include_once "config/database.inc.php";

    try {

        $conexion = new PDO($cadConexion, $usuarioBD, $passwordBD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Validar los parámetros:
        $nombre = $_POST["nombre"];
        $sql="INSERT INTO pais(nombre) VALUES (:nombre)";
        
        $sentencia = $conexion->prepare($sql);        
        $sentencia->bindParam(":nombre", $nombre);
        $isOk = $sentencia->execute();
        $idGenerado = $conexion->lastInsertId();

        echo "<p> Todo correcto, id generado: $idGenerado </p>";

    } catch (PDOException $e) {
        echo "<p>Falló la conexión: {$e->getMessage()} </p>";
    }

    echo "<p><a href='formAltaPais.php'>Volver al formulario anterior</a></p>";
