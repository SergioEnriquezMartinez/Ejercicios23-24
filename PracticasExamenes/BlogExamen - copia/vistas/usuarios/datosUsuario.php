<?php
    
    use Sergi\ProyectoBlog\Ayudantes\ErrorHelper;
    use Sergi\ProyectoBlog\Config\Parametros;

    $usuario = $_SESSION['user'];

    if (isset($_SESSION['statusUpdate'])){
        if ($_SESSION['statusUpdate'])
            echo "<div class='alerta'>Datos actualizados</div>";
        else
            echo "<div class='alerta alerta-error'>Error al actualizar</div>";
    }
?>

    <form action="<?=Parametros::$BASE_URL?>Usuario/actualizarDatosUsuario" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="<?=$usuario->nombre?>">
        <?=isset($_SESSION['errorUpdate']['nombre'])? ErrorHelper::mostrarError($_SESSION['errorUpdate'], "nombre") : "";?>
        
        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" value="<?=$usuario->apellidos?>">
        <?=isset($_SESSION['errorUpdate']['apellidos'])? ErrorHelper::mostrarError($_SESSION['errorUpdate'], "apellidos") : "";?>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?=$usuario->email?>" disabled>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password">
        <?=isset($_SESSION['errorUpdate']['password'])? ErrorHelper::mostrarError($_SESSION['errorUpdate'], "password") : "";?>

        <label for="password2">Repetir contraseña</label>
        <input type="password" id="password2" name="password2">
        <?=isset($_SESSION['errorUpdate']['password2'])? ErrorHelper::mostrarError($_SESSION['errorUpdate'], "password2") : "";?>

        <input type="submit" value="Actualizar" name="btnActualizar">

    </form>
<?php
    ErrorHelper::clearAll();
?>