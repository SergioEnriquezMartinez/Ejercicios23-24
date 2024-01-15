<?php
    include_once 'inc/header.html';
    include_once 'consultarEstados.php';
    session_start();
?>
    <h1>Alta pacientes</h1>
    <fieldset>

        <form action="validaForm.php" method="post" id="altaPaciente">
            <p>
                <label for="nombre">Nombre Paciente</label>
                <?php
                    if (isset($_SESSION['nombre'])) {
                        echo '<input type="text" name="nombre" id="nombre" value="' . $_SESSION['nombre']. '">';
                    } else {
                        echo '<input type="text" name="nombre" id="nombre">' ;
                    }
                ?>
            </p>
            <p>
                <label for="priApe">Primer Apellido</label>
                <?php
                    if (isset($_SESSION['priApe'])) {
                        echo '<input type="text" name="priApe" id="priApe" value="' . $_SESSION['priApe']. '">';
                    } else {
                        echo '<input type="text" name="priApe" id="priApe">' ;
                    }
                ?>
            </p>
            <p>
                <label for="edad">Edad cuando ingresó</label>
                <?php
                    if (isset($_SESSION['edad'])) {
                        echo '<input type="text" name="edad" id="edad" value="' . $_SESSION['edad']. '">';
                    } else {
                        echo '<input type="text" name="edad" id="edad">' ;
                    }
                ?>
            </p>
            <p>
                <label for="estado">Estado</label>
                <select name="estado" id="estado">
                    <?php foreach ($estados as $estado) : ?>
                        <option value="<?= $estado['descripcion'] ?>"><?= $estado['descripcion'] ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <label for="diagnostigo">Diagnóstico</label>
                <?php
                    if (isset($_SESSION['diagnostico'])) {
                        echo '<textarea name="diagnostico" id="diagnostico" cols="30" rows="10">' . $_SESSION['diagnostico']. '</textarea>';
                    } else {
                        echo '<textarea name="diagnostico" id="diagnostico" cols="30" rows="10"></textarea>' ;
                    }
                ?>
            </p>
            <input type="submit" value="Enviar">
            <input type="reset" value="Limpiar">
        </form>
        <?php
        if (isset($_SESSION['errores'])) {
            echo $_SESSION['errores'];
            session_destroy();
        } else if (isset($_SESSION['correcto'])) {
            echo $_SESSION['correcto'];
            session_destroy();
        }
        ?>
        <p><a href="mostrarPaciente.php">Mostrar Pacientes</a></p>
    </fieldset>

    <?php include_once 'inc/footer.html' ?>