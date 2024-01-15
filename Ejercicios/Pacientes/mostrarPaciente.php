<?php
include_once 'consultarEstados.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["mostrarPacientes"]) && $_POST["mostrarPacientes"] == "allPacientes") {
        $consultaMostrarPacientes = "SELECT nombre, priApe, edadIngreso, diagnostico, descripcion
                                        FROM paciente p
                                        JOIN estado e ON p.codEstado = e.codEstado";
        $sentenciaMostrarPacientes = $db->prepare($consultaMostrarPacientes);
        $sentenciaMostrarPacientes->setFetchMode(PDO::FETCH_ASSOC);
        $sentenciaMostrarPacientes->execute();
        $pacientes = [];
        while ($fila = $sentenciaMostrarPacientes->fetch()) {
            $pacientes[] = $fila;
        }
        mostrarDatos($pacientes);
        if (isset($_POST['volcarDatos'])) {
            volcarDatos($pacientes);
        }
    } else if (isset($_POST["mostrarPacientes"]) && $_POST["mostrarPacientes"] == "pacientesEstado") {
        $consultaMostrarPacientes = "SELECT nombre, priApe, edadIngreso, diagnostico, descripcion
                                        FROM paciente p
                                        JOIN estado e ON p.codEstado = e.codEstado
                                        WHERE descripcion LIKE :estado";
        $sentenciaMostrarPacientes = $db->prepare($consultaMostrarPacientes);
        $sentenciaMostrarPacientes->bindParam(':estado', $_POST['estado']);
        $sentenciaMostrarPacientes->setFetchMode(PDO::FETCH_ASSOC);
        $sentenciaMostrarPacientes->execute();
        $pacientes = [];
        while ($fila = $sentenciaMostrarPacientes->fetch()) {
            $pacientes[] = $fila;
        }
        mostrarDatos($pacientes);
        if (isset($_POST['volcarDatos'])) {
            volcarDatos($pacientes);
        }
    }
}

function mostrarDatos($datos)
{
    if (empty($datos)) {
        echo "<p>No hay pacientes que mostrar.</p>";
    } else {
        echo "<table>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Primer Apellido</th>";
        echo "<th>Edad</th>";
        echo "<th>Estado</th>";
        echo "<th>Diagnóstico</th>";
        echo "</tr>";
        foreach ($datos as $paciente) {
            echo "<tr>";
            echo "<td>" . $paciente['nombre'] . "</td>";
            echo "<td>" . $paciente['priApe'] . "</td>";
            echo "<td>" . $paciente['edadIngreso'] . "</td>";
            echo "<td>" . $paciente['descripcion'] . "</td>";
            echo "<td>" . $paciente['diagnostico'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        if (isset($_POST['volcarDatos'])) {
            volcarDatos($datos);
        }
    }
}

function volcarDatos($datos)
{
    $pacientes = "";
    foreach ($datos as $paciente) {
        $pacientes .= implode(" | ", $paciente) . "\n";
    }
    file_put_contents("ficheros/pacientes.txt", $pacientes);
}



include_once 'inc/header.html';
?>

<h1>Mostrar pacientes</h1>

<fieldset>
    <form action="mostrarPaciente.php" method="post" id="formMostrarPacientes">
        <p>
            <input type="radio" name="mostrarPacientes" value="allPacientes" id="allPacientes">
            <label for="allPacientes">Mostrar todos los pacientes</label>
        </p>
        <p>
            <input type="radio" name="mostrarPacientes" value="pacientesEstado" id="pacientesEstado">
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
    </form>
</fieldset>

<?php
include_once 'inc/footer.html';
?>