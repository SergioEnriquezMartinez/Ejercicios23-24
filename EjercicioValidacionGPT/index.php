<?php
    include_once "includes/header.php";
?>

    <form action="validaForm.php" method="get">
        <p>
            <label for="nombre">Introduce tu nombre</label>
            <input type="text" name="nombre" id="nombre" required>    
        </p>
        <p>
            <label for="email">Introduce tu email</label>
            <input type="email" name="email" id="email" required>    
        </p>
        <p>
            <label for="pass1">Introduce tu contraseña</label>
            <input type="password" name="pass1" id="pass1">    
        </p>
        <p>
            <label for="pass2">Confirmar contraseña</label>
            <input type="password" name="pass2" id="pass2">    
        </p>
        <p>
            <label for="date">Introduce la fecha de tu nacimiento</label>
            <input type="date" name="date" id="date">    
        </p>
        <p>
            <input type="submit" value="Enviar">
        </p>
    </form>

<?php
    include_once "includes/footer.php"
?>