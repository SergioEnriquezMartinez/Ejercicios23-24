<?php
    include_once "Resumible.php";
    abstract class Soporte implements Resumible
    {
        
        public $titulo;
        protected $numero;
        private $precio;
        const IVA = 21;

        public function __construct($titulo, $numero, $precio)
        {
            $this->titulo = $titulo;
            $this->numero = $numero;
            $this->precio = $precio;
        }

        public function getPrecio()
        {
            return $this->precio;
        }

        public function getPrecioConIva()
        {
            return $this->precio * (1 + self::IVA / 100);
        }

        public function getNumero()
        {
            return $this->numero;
        }

        public function muestraResumen()
        {
            echo "<p><i>".$this->titulo."</i></p>";
            echo "<p>Precio: ".$this->getPrecio()."</p>";
            echo "<p>Precio IVA incluido: ".$this->getPrecioConIva()."</p>";
        }
    }

?>