<?php
    namespace Clases;
    use Clases\Soporte;
    class Juego extends Soporte
    {
        
        public $consola;
        private $minJugadores;
        private $maxJugadores;

        public function __construct($titulo, $numero, $precio, $consola, $minJugadores, $maxJugadores)
        {
            parent::__construct($titulo, $numero, $precio);
            $this->consola = $consola;
            $this->minJugadores = $minJugadores;
            $this->maxJugadores = $maxJugadores;
        }

        public function muestraJugadoresPosibles()
        {
            if ($this->minJugadores == $this->maxJugadores && $this->maxJugadores == 1) {
                echo "<p>Para un jugador</p>";
            } else if ($this->minJugadores > 1 && $this->minJugadores > $this->maxJugadores) {
                echo "<p>Número de jugadores: ".$this->minJugadores." - ".$this->maxJugadores."</p>";
            } else if ($this->minJugadores == $this->maxJugadores && $this->maxJugadores != 1) {
                echo "<p>Para". $this->maxJugadores."</p>";
            }
        }

        public function muestraResumen()
        {
            echo "<p>Juego para ".$this->consola."</p>";
            parent::muestraResumen();
            $this->muestraJugadoresPosibles();
        }

    }

?>