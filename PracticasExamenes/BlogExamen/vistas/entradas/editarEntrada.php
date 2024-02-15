<?php

    use Sergi\ProyectoBlog\Config\Parametros;
    use Sergi\ProyectoBlog\Ayudantes\ErrorHelper;

    $entrada = $datos['entrada']??NULL;
    $categorias = $datos['categorias']??NULL;
    $errores = $_SESSION['errorEditarEntrada']??NULL;

    if ($entrada == NULL) {
        echo '<p>No existe la entrada</p>';
    } else {
?>
        <h1>Editar entrada</h1>
        <form action="<?=Parametros::$BASE_URL?>Entrada/editarEntrada&id=<?=$entrada->id?>" method="post">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" value="<?=$entrada->titulo?>"/>
            <?=isset($errores['titulo'])? ErrorHelper::mostrarError($errores, 'titulo') : '';?>

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" style="width: 96%; height: 200px;"><?=$entrada->descripcion?></textarea>
            <?=isset($errores['descripcion'])? ErrorHelper::mostrarError($errores, 'descripcion') : '';?>
            <label for="categoria">Categoría</label>
            <select name="categoria">
            <?php
                foreach($categorias as $categoria) {
                    echo '<option value="' . $categoria->id . '"';
                    if ($categoria->id == $entrada->categoria_id) {
                        echo ' selected';
                    }
                    echo '>' . $categoria->nombre . '</option>';
                }
            ?>
            </select>
            <?=isset($errores['categoria'])? ErrorHelper::mostrarError($errores, 'categoria') : '';?>
            
            <input type="submit" value="Guardar" name="btnGuardar"/>
        </form>
<?php
    }
?>