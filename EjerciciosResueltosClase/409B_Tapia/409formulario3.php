<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>rsumen datos</title>
</head>

<body>
    <?php
        session_start();
        if (isset($_POST)) {
            if (isset($_POST["numeroConvivientes"]) && isset($_POST["aficiones"]) && isset($_POST["menu"])) {
                $convivientes = $_POST["numeroConvivientes"];
                $aficiones = implode(" / ", $_POST["aficiones"]);
                $menu = implode(" / ", $_POST["menu"]);
                echo "<table>
                <thead>
                  <th>nombre</th>
                  <th>apellido</th>
                  <th>email</th>
                  <th>url</th>
                  <th>sexo</th>
                  <th>numeroConvivientes</th>
                  <th>aficiones</th>
                  <th>menu</th>
                </thead>
                <tbody>
                  <tr>
                    <td>". $_SESSION['nombre']." </td>
                    <td>". $_SESSION["apellidos"]." </td>
                    <td> ". $_SESSION["email"]."</td>
                    <td>". $_SESSION["URLpagina"]." </td>
                    <td>".$_SESSION["sexo"]." </td>
                    <td> ".$convivientes."</td>
                    <td> ". $aficiones."</td>
                    <td> ". $menu."</td>
                  </tr>
                </tbody>
              </table>";
            }else{
              echo "no recoge algun dato ";
            }
        }else{
          echo "no recibo post";
        }

    ?>
</body>

</html>