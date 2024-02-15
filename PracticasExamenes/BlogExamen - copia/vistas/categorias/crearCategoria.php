<?php
    use Sergi\ProyectoBlog\Config\Parametros;
    use Sergi\ProyectoBlog\Ayudantes\ErrorHelper;
?>

    <h2>Crear Categoría</h2>
    <form action="<?=Parametros::$BASE_URL?>Categoria/crearCategoria" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre">
        <?=isset($_SESSION['errorCrearCategoria']['nombre'])? ErrorHelper::mostrarError($_SESSION['errorCrearCategoria'], 'nombre') : '';?>
        <input type="submit" value="Crear" name="btnCrearCategoria">
    </form>
