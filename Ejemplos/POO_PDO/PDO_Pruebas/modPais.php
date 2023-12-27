<?php
    include_once "config/database.inc.php";

    try {

        $conexion = new PDO($cadConexion, $usuarioBD, $passwordBD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Validar los parámetros:
        $nombre = $_POST["nombre"];
        $poblacion = $_POST["poblacion"];

        $nombre = "%".$nombre."%";
        
        $sql = "UPDATE pais 
                SET poblacion = :poblacion 
                where upper(nombre) like :nombre";
        
        $sentencia = $conexion->prepare($sql);        
        $sentencia->bindParam(":nombre", $nombre);
        $sentencia->bindParam(":poblacion", $poblacion);
        $isOk = $sentencia->execute();
        $numFilas = $sentencia->rowCount();

        echo "<p> Número de Paises modificados: $numFilas </p>";

    } catch (PDOException $e) {
        echo "<p>Falló la conexión: {$e->getMessage()} </p>";
    }

    echo "<p><a href='formModPais.php'>Volver al formulario anterior</a></p>";
