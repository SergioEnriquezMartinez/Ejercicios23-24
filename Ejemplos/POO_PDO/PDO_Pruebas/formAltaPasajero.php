<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Alta Pasajero</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<?php
        include_once "config/database.inc.php";
        $conexion = null;      
        try{
              $conexion = new PDO($cadConexion, $usuarioBD, $passwordBD);
              $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
              
              $sql = "select idPais, nombre from pais order by nombre";      
              $sentencia = $conexion->prepare($sql);
              $sentencia -> setFetchMode(PDO::FETCH_ASSOC);
              $sentencia->execute();
              $options = "";
              while($fila = $sentencia->fetch()){
                  $options .= "<option value='".$fila["idPais"]."'>".$fila["nombre"]."</option>";
              }

          }catch(PDOException $e) {
              echo $e -> getMessage();
          }
      
          $conexion = null;
?>          
    <form action="altaPasajero.php" method="post">
        <p><label for="email">Email: </label>
        <input type="text" name="email" value="" id="email"></p>
        
        <p><label for="password">Password: </label>
        <input type="password" name="password" value="" id="password"></p>

        <p><label for="nombre">Nombre: </label>
        <input type="text" name="nombre" value="" id="nombre"></p>

        <p><label for="pais">Pais: </label>
        <select name="pais" id="pais">
            <?=$options?>
        </select>
        </p>


        <p><input type="submit" value="Alta Pasajero"></p>
    </form>
</body>
</html>