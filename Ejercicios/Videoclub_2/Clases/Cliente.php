<?php
    namespace Clases;
    use Clases\Excepciones\SoporteYaAlquiladoException;
    use Clases\Excepciones\CupoSuperadoException;
    use Clases\Excepciones\SoporteNoEncontradoException;

    class Cliente
    {

        public $nombre;
        private $numero;
        private $soportesAlquilados;
        private $numSoportesAlquilados;
        private $maxAlquilerConcurrente;

        public function __construct($nombre, $numero, $maxAlquilerConcurrente = 3)
        {
            $this->nombre = $nombre;
            $this->numero = $numero;
            $this->soportesAlquilados = [];
            $this->numSoportesAlquilados = 0;
            $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
        }

        public function getNumero()
        {
            return $this->numero;
        }

        public function setNumero($numero)
        {
            $this->numero = $numero;
        }

        public function getNumSoportesAlquilados()
        {
            return $this->numSoportesAlquilados;
        }

        public function muestraResumen()
        {
            echo "<p>Nombre: ".$this->nombre."</p>";
            echo "<p>Cantidad de alquileres: ".count($this->soportesAlquilados)."</p>";
        }

        public function tieneAlquilado(Soporte $s) : bool
        {
            return in_array($s, $this->soportesAlquilados);
        }

        public function alquilar(Soporte $s)
        {
            if (!$this->tieneAlquilado($s))
            {
                if ($this->numSoportesAlquilados < $this->maxAlquilerConcurrente)
                {
                    array_push($this->soportesAlquilados, $s);
                    $this->numSoportesAlquilados++;
                    $s->alquilado = true;
                    echo "<hr>";
                    echo "<p>El producto ha sido alquilado a ".$this->nombre."</p>";
                    $s->muestraResumen();
                    echo "<hr>";
                }
                else
                {
                    throw new CupoSuperadoException("El cliente ya tiene alquilados ".$this->maxAlquilerConcurrente." soportes");
                }
            }
            else
            {
                throw new SoporteYaAlquiladoException("El cliente ya tiene alquilado este soporte");
            }
            return $this;
        }

        public function devolver(int $numSoporte)
        {
           foreach ($this->soportesAlquilados as $soporte)
           {
                if ($soporte->getNumero() == $numSoporte)
                {
                    unset($this->soportesAlquilados[array_search($soporte, $this->soportesAlquilados)]);
                    $this->numSoportesAlquilados--;
                    $soporte->alquilado = false;
                    echo "<p>El producto ha sido devuelto</p>";
                }
           }
           throw new SoporteNoEncontradoException("El cliente no tiene alquilado este soporte");
           return $this;
        }

        public function listaAlquileres() : void
        {
            echo "<p>El cliente tiene ".$this->numSoportesAlquilados." soportes alquilados:</p>";
            foreach ($this->soportesAlquilados as $soporte)
            {
                $soporte->muestraResumen();
            }
        }
    }

?>