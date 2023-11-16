<?php include_once "inc/header.php"; ?>
    <fieldset>
		<legend>Test de Operaciones Aritméticas POO</legend>
        <form action="validaForm.php" method="post">
            <p><label for="nombreUsuario">Nombre Alumn@: </label>
            <input type="text" name="nombreUsuario" id="nombreUsuario"></p>        
            <p><label for="numSumas">Num. Sumas:</label> 
            <input type="text" name="numSumas" id="numSumas"></p>
            <p><label for="numRestas">Num. Restas:</label> 
            <input type="text" name="numRestas" id="numRestas"></p>
            <p><input type="submit" value="Empezar"></p>
    </form>    
    </fieldset>
    
<?php include_once "inc/footer.php"; ?>
