<?php
    use Sergi\ProyectoBlog\Config\Parametros;
    use Sergi\ProyectoBlog\Ayudantes\ErrorHelper;

    $categorias = $datos['categorias'];
?>

<h2>Crear Entrada</h2>
<form action="<?=Parametros::$BASE_URL?>Entrada/crearEntrada" method="POST">
    <label for="titulo">Título</label>
    <input type="text" id="titulo" name="titulo" style="width: 95%;" required>
    <?=isset($_SESSION['errorCrearEntrada']['titulo'])? ErrorHelper::mostrarError($_SESSION['errorCrearEntrada'], 'titulo') : '';?>

    <label for="descripcion">Descripcion</label>
    <textarea id="descripcion" name="descripcion" style="width: 96%; height: 200px;" required></textarea>
    <?=isset($_SESSION['errorCrearEntrada']['descripcion'])? ErrorHelper::mostrarError($_SESSION['errorCrearEntrada'], 'descripcion') : '';?>

    <label for="categoria">Categoría</label>
    <select id="categoria" name="categoria" required>
        <?php
            foreach ($categorias as $categoria) {
                echo "<option value='". $categoria->id ."'>". $categoria->nombre. "</option>";
            }
        ?>
    </select>
    <?=isset($_SESSION['errorCrearEntrada']['categoria'])? ErrorHelper::mostrarError($_SESSION['errorCrearEntrada'], 'categoria') : '';?>

    <input type="submit" value="Crear" name="btnCrearEntrada">