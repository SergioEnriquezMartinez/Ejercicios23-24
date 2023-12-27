<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php
          include_once "config/database.inc.php";

          $conexion = null;
      
          try{
              $email = $_POST["email"]??"";
              $conexion = new PDO($cadConexion, $usuarioBD, $passwordBD);
              $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
              
              $sql = "select idPasajero, passwd
                        from pasajero
                        where email = :email";
      
              $sentencia = $conexion->prepare($sql);
              $sentencia -> setFetchMode(PDO::FETCH_ASSOC);
              $sentencia->bindParam(":email", $email);
              $sentencia->execute();
            
              $usuario = $sentencia->fetch();
              if ($usuario && password_verify($_POST["password"], $usuario["passwd"])){
                    echo "<h1>LOGIN OK</h1>";
              }else{
                    echo "<h1>Error Login</h1>";
              }
          


          }catch(PDOException $e) {
              echo $e -> getMessage();
          }
      
          $conexion = null;
    ?>
</body>
</html>