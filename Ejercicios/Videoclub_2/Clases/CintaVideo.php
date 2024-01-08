<?php
    include_once "Soporte.php";
    class CintaVideo extends Soporte
    {
        
        private $duracion;

        public function __construct($titulo, $numero, $precio, $duracion)
        {
            parent::__construct($titulo, $numero, $precio);
            $this->duracion = $duracion;
        }

        public function muestraResumen()
        {
            echo "<p>Pelicula en VHS</p>";
            parent::muestraResumen();
            echo "<p>Duración: ".$this->duracion." minutos</p>";
        }
    }

?>