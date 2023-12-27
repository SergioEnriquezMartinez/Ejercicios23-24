<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario2</title>
</head>

<body>
    <?php
      session_start();

      function loadInSession(){
          foreach($_POST as $key => $value){
               $_SESSION[$key] = $value;
               setcookie($key, $value, time() + 3600);
          }
      }

    if (isset($_POST)) {
        if (isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["email"]) && isset($_POST["URLpagina"]) && isset($_POST["sexo"])) {
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $email = $_POST["email"];
            $URLpagina = $_POST["URLpagina"];
            $sexo = $_POST["sexo"];
            //habria que comprobar que los campos no esten vacios
            loadInSession();
            /*
            $_SESSION["nombre"] = $nombre;
            $_SESSION["apellidos"] = $apellidos;
            $_SESSION["email"] = $email;
            $_SESSION["url"] = $URLpagina;
            $_SESSION["sexo"] = $sexo;
            
            setcookie("nombre", $_SESSION["nombre"], time() + 3600);
            setcookie("apellidos", $_SESSION["apellidos"] ,  time() + 3600);
            setcookie("email", $_SESSION["email"],  time() + 3600);
            setcookie("url", $_SESSION["url"],  time() + 3600);
            setcookie("sexo", $_SESSION["sexo"] ,  time() + 3600);
            */
            echo '
            <form action="409formulario3.php" method="post">
            <p>
              <label for="numeroConvivientes"
                >numeroConvivientes en el domicilio:</label
              >
              <input
                type="number"
                name="numeroConvivientes"
                id="numeroConvivientes"
              />
            </p>
            <p>
              <input type="checkbox" name="aficiones[]" id="comer" value="comer" />
              <label for="comer">comer</label>
            </p>
            <p>
              <input type="checkbox" name="aficiones[]" id="dormir" value="dormir" />
              <label for="dormir">dormir</label>
            </p>
            <p>
              <input
                type="checkbox"
                name="aficiones[]"
                id="programar"
                value="programar"
              />
              <label for="programar">programar</label>
            </p>
            <p>
              <input
                type="checkbox"
                name="aficiones[]"
                id="entrenar"
                value="entrenar"
              />
              <label for="entrenar">entrenar</label>
            </p>
            <div>
              <label for="menu">Platos Favoritos:</label>
              <select id="menu" name="menu[]" multiple>
                <option value="pizza">Legumbres</option>
                <option value="hamburguesa">Hamburguesa</option>
                <option value="sushi">Sushi</option>
                <option value="ensalada">Ensalada</option>
                <option value="pasta">Pasta</option>
                <option value="tacos">Verduras</option>
              </select>
            </div>
            <input type="submit" name="enviar" id="enviar" />
          </form>';
        }
    }
    ?>
</body>

</html>