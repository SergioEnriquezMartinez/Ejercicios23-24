<!-- 
    lee los datos y los mete en la sesión. A continuación, muestra el resto de campos del formulario a rellenar (convivientes, aficiones y menú).
    Envía estos datos a 409formulario3.php
-->

<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['datos'] = [
            'nombre' => $_POST['nombre'],
            'apellidos' => $_POST['apellidos'],
            'email' => $_POST['email'],
            'urlPag' => $_POST['urlPag'],
            'sexo' => $_POST['sexo']
        ];
        
        header('Location: formulario2.php');
        exit();
    }
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
        <h1>Introduce estos datos adiccionales:</h1>
        <form action="formulario3.php" method="post">
            <p>
                <label for="numConv">Número de convivientes en el domicilio:</label>
                <input type="number" name="numConv" id="numConv" required>
            </p>
            <p>
                <label for="aficiones">Aficiones:</label>
                <textarea name="aficiones" id="aficiones" cols="30" rows="10" required></textarea>
            </p>
            <p>
                <label for="menu">Menú favorito:</label>
                <select name="menu" id="menu">
                    <option value="pastaCarbonara">Pasta carbonara</option>
                    <option value="bacalaoPilpil">Bacalao al pilpil</option>
                    <option value="solomilloIberico">Solomillo ibérico</option>
                    <option value="ensaladaCesar">Ensalada César</option>
                </select>
            </p>
            <p>
                <input type="submit" value="Enviar">
        </form>
    </main>
</body>
</html>