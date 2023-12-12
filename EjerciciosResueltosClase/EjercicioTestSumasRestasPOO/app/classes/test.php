<?php
namespace Classes;

class Test {
    private string $nombreUsuario;
    private int $numSumas;
    private int $numRestas;
    private array $operaciones;
    private array $listaOperadores;

    
    public function __construct(string $nombreUsuario, int $numSumas, int $numRestas){
        if (!Validator::validateName($nombreUsuario)) throw new \Exception("Nombre de Usuario no válido");
        if (!Validator::validatePositiveInt($numSumas)) throw new \Exception("Num.Sumas debe ser un numero entero positivo");
        if (!Validator::validatePositiveInt($numRestas)) throw new \Exception("Num.Restas debe ser un numero entero positivo");
        $this->nombreUsuario = $nombreUsuario;
        $this->numSumas = $numSumas;
        $this->numRestas = $numRestas;
        $this->operaciones = [];
        $this->initListaOperadores();

    }
    public function getNombreUsuario():string { return $this->nombreUsuario;}
    public function getNumSumas():int { return $this->numSumas;}
    public function getNumRestas():int { return $this->numRestas;}
    public function getNumPreguntas():int{ return $this->numSumas+$this->numRestas;}
    public function getOperaciones(): array{ return $this->operaciones;}
    public function getCountOperaciones():int{
        return count($this->operaciones);
    }

    public function setRespuesta($respuesta){
        $operation = end($this->operaciones);
        $operation->setResultadoUser($respuesta);
    }

    public function nextOperacion(): Operation{
        $operation = new Operation(array_pop($this->listaOperadores));
        $this->operaciones[] = $operation;
        return $operation;
    }
    public function numOperacionesCorrectas(): array{
        $resultado = [];
        $resultado["SUMAS"] = 0;
        $resultado["RESTAS"] = 0;
        foreach($this->operaciones as $operacion){
            if ($operacion->checkResult()){
                if ($operacion->getOperador() == Operation::OP_SUMA) $resultado["SUMAS"]++;
                if ($operacion->getOperador() == Operation::OP_RESTA) $resultado["RESTAS"]++;
            }
        }
        return $resultado;
    }
    private function initListaOperadores():void{
        $this->listaOperadores = array_merge(array_fill(0, $this->numSumas, Operation::OP_SUMA),
                                    array_fill(0, $this->numRestas, Operation::OP_RESTA));
        shuffle($this->listaOperadores);
    }


    /*
    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidos(string $apellidos) {
        $this->apellidos = $apellidos;
    }
  

    public function imprimir(){
        return "$this->nombre $this->apellidos";
    }*/
}


