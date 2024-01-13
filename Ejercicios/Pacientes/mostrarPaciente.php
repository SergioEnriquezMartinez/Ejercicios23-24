<?php include_once 'inc/header.html' ?>

<h1>Mostrar pacientes</h1>

<fieldset>
    <p>
        <input type="radio" name="mostrarPacientes" id="allPacientes">
        <label for="allPacientes">Mostrar todos los pacientes</label>
    </p>
    <p>
        <input type="radio" name="mostrarPacientes" id="pacientesEstado">
        <label for="pacientesEstado">Mostrar pacientes con estado: </label>
        <select name="estado" id="estado">
            <?php foreach ($estados as $estado) : ?>
                <option value="<?= $estado['descripcion'] ?>"><?= $estado['descripcion'] ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <input type="checkbox" name="volcarDatos" id="volcarDatos">
        <label for="volcarDatos">Volcar datos a fichero</label>

    </p>
    <p>
        <input type="submit" value="Mostrar">
    </p>
    <p><a href="altaPacientes.php">Alta Pacientes</a></p>
</fieldset>