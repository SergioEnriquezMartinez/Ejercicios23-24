<?php
    include_once "Soporte.php";
    class Dvd extends Soporte
    {
        
        public $idiomas;
        private $formatoPantalla;

        public function __construct($titulo, $numero, $precio, $idiomas, $formatoPantalla)
        {
            parent::__construct($titulo, $numero, $precio);
            $this->idiomas = $idiomas;
            $this->formatoPantalla = $formatoPantalla;
        }

        public function muestraResumen()
        {
            echo "<p>Pelicula en DVD</p>";
            parent::muestraResumen();
            echo "<p>Idiomas: ".$this->idiomas."</p>";
            echo "<p>Formato Pantalla: ".$this->formatoPantalla."</p>";
        }
    }

?>