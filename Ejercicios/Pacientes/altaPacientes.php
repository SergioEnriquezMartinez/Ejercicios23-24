<?php
    include_once 'consultarEstados.php'; 
    session_start();
    if (isset($_SESSION['errores'])) {
        echo $_SESSION['errores'];
        unset($_SESSION['errores']);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Pacientes</title>
</head>
<body>
    <form action="validaForm.php" method="post">
        <p>
            <label for="nombre">Nombre Paciente</label>
            <input type="text" name="nombre" id="nombre">
        </p>
        <p>
            <label for="priApe">Primer Apellido</label>
            <input type="text" name="priApe" id="priApe">
        </p>
        <p>
            <label for="edad">Edad cuando ingresó</label>
            <input type="number" name="edad" id="edad">
        </p>
        <p>
            <label for="estado">Estado</label>
            <select name="estado" id="estado">Estado
                <?php foreach ($estados as $estado): ?>
                    <option value="<?= $estado['descripcion'] ?>"><?= $estado['descripcion'] ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="diagnostigo">Diagnóstico</label>
            <textarea name="diagnostico" id="diagnostico" cols="30" rows="10"></textarea>
        </p>
        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">
    </form>
    <p><a href="mostrarPaciente.php">Mostrar Pacientes</a></p>
</body>
</html>