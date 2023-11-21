<?php
    namespace examen;
    include_once "inc/header.php";
    include_once "app/clases/crearRombos.php";

    $altura = $_GET["altura"];
    $rombos = $_GET["rombos"];
    
    $rombo = CrearRombos::crearRombo($altura);
    ?>
    <h1>Resultado</h1>
    <div id="resultado">
    <?php
    for ($i = 0; $i < $rombos; $i++) {
        echo "<div>".$rombo."</div>";
    }
    ?>

    </div>

    <h1><a href="index.php">[Volver al formulario]</a></h1>
    
    <?php
    include_once "inc/footer.php";
?>