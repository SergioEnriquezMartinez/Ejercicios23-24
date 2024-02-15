<?php


    use Sergi\ProyectoBlog\Config\Parametros;

    $entrada = $datos['entrada']??NULL;
    $usuario = $datos['usuario']??NULL;
    $categoria = $datos['categoria']??NULL;
    $cantidadVotos = $datos['cantidadVotos']??NULL;
    $entradaVotada = $datos['entradaVotada']??NULL;

    if ($entrada == NULL) {
        header('Location: ' . Parametros::$BASE_URL);
    } else {
        echo '<h1>' . $entrada->titulo . '</h1>';
        echo '<h2>' . $categoria->nombre . '</h2>';
        echo '<h3>' . $entrada->fecha . ' | ' . $usuario->nombre . ' ' . $usuario->apellidos . '</h3>';
        echo '<p>' . $entrada->descripcion . '</p>';

        if (isset($_SESSION['user'])) {
            if ($usuario->id == $_SESSION['user']->id) {
                echo '<a href="' . Parametros::$BASE_URL . 'Entrada/mostrarDatosEntrada&id=' . $entrada->id . '" class="boton boton-verde">Editar</a>';
                echo '<a href="' . Parametros::$BASE_URL . 'Entrada/eliminarEntrada&id=' . $entrada->id . '" class="boton boton-rojo">Eliminar</a>';    
            }
        }
        if ($usuario->id != $_SESSION['user']->id) {
            if ($entradaVotada) {
                echo '<a href="' . Parametros::$BASE_URL . 'Entrada/eliminarVotoEntrada&id=' . $entrada->id . '" class="boton boton-rojo">Eliminar voto</a>';
            } else {
                echo '<a href="' . Parametros::$BASE_URL . 'Entrada/votarEntrada&id=' . $entrada->id . '" class="boton boton-azul">Votar</a>';
            }
        }
        
    }
?>