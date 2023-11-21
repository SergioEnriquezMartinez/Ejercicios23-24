<?php
    namespace examen;
    include_once "inc/header.php";
?>
<h1>CREADOR DE ROMBOS</h1>
<form action="validarFormulario.php" method="get">
    <p>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
    </p>
    <p>
        <label for="altura">Altura:</label>
        <input type="number" name="altura" id="altura">
    </p>
    <p>
        <label for="rombos">Número de rombos:</label>
        <input type="number" name="rombos" id="rombos">
    </p>
    <p>
        <input type="submit" value="Dibujar">
    </p>
</form>

<?php
    include_once "inc/footer.php";
?>