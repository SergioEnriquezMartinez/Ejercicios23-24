<!--
    recoge los datos enviados en el paso anterior y junto a los que ya estaban en la sesión, se muestran todos los datos en una tabla/lista desordenada.
-->
<?php
    session_start();
    if (!isset($_SESSION['datos'])) {
        header('Location: formulario1.php');
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['datos']['numConv'] = $_POST['numConv'];
        $_SESSION['datos']['aficiones'] = $_POST['aficiones'];
        $_SESSION['datos']['menu'] = $_POST['menu'];

        header('Location: formulario3.php');
        exit();
    }
    $datos = $_SESSION['datos'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 409</title>
</head>
<body>
    <main>
        <table>
            <tr>
                <td>Nombre</td>
                <td>
                    <?php
                    echo $datos['nombre'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <?php
                    echo $datos['email'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>URL</td>
                <td>
                    <?php
                    echo $datos['urlPag'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Sexo</td>
                <td>
                    <?php
                    echo $datos['sexo'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Aficiones</td>
                <td>
                    <?php
                    echo $datos['aficiones'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Convivientes</td>
                <td>
                <?php
                    echo $datos['numConv'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Menú favorito</td>
                <td>
                    <?php
                    echo $datos['menu'];
                    ?>
                </td>
            </tr>
        </table>
    </main>
</body>
</html>