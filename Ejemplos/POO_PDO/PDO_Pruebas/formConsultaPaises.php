<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Consulta Paises</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php
        $filtro = $_POST["filtro"]??"";
    ?>
    <form action="" method="post">
        <p><label for="nombre">Filtro: </label>
        <input type="text" name="filtro" value="<?=$filtro?>" id="filtro"></p>
        <p><input type="submit" value="Consultar Pais"></p>
    </form>

    <?php
          include_once "config/database.inc.php";

          $conexion = null;
      
          try{
              $conexion = new PDO($cadConexion, $usuarioBD, $passwordBD);
              $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
              
              $sql = "select idPais, nombre as nombrePais, poblacion 
                        from pais
                        where nombre like :filtro
                              or poblacion like :filtro
                              or idPais like :filtro
                        order by nombre";
      
              $sentencia = $conexion->prepare($sql);
              $sentencia -> setFetchMode(PDO::FETCH_ASSOC);
              $filtro = "%".$filtro."%";
              $sentencia->bindParam(":filtro", $filtro);
              $sentencia->execute();
            
              $contPaises = 0;
              echo "<h2>Listado de paises</h2>";
              echo "<table><tr><th>Cod.Pais</th><th>Nombre</th><th>Poblacion</th></tr>";
              while($fila = $sentencia->fetch()){
                    $contPaises++;
                    echo "<tr>";
                        echo "<td>{$fila['idPais']}</td>";
                        echo "<td>{$fila['nombrePais']}</td>";
                        echo "<td>{$fila['poblacion']}</td>";
                    echo "</tr>";
              }
              echo "</table>";
      
              echo "<p>Num.Paises: $contPaises</p>";

              // --------------------------------------------------
              // NO ES EFICIENTE:
              $sql = "select count(*) as numPaises
                        from pais
                        where nombre like :filtro
                              or poblacion like :filtro
                              or idPais like :filtro";
      
              $sentencia = $conexion->prepare($sql);
              $sentencia -> setFetchMode(PDO::FETCH_NUM);
              $filtro = "%".$filtro."%";
              $sentencia->bindParam(":filtro", $filtro);
              $sentencia->execute();

              if($fila = $sentencia->fetch()){
                    echo "<p> Num. Paises (count): {$fila[0]} </p>";
              }
          


          }catch(PDOException $e) {
              echo $e -> getMessage();
          }
      
          $conexion = null;
    ?>
</body>
</html>