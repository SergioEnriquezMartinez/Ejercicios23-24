<?php
namespace Classes;
class Operation{
    public static $SUMA = 1;
    public static $RESTA = 2;

    private $operador;
    private $simboloOperador;
    private $operando1;
    private $operando2;
    private $resultadoCorrecto;
    private $respuesta;

    public function __construct($operador, $operando1, $operando2, $respuesta){
        if ($operador != Operation::$RESTA && $operador != Operation::$SUMA)
            throw new \Exception("Error, operación no soportada");
        
        $this->operador = $operador;
        $this->operando1 = $operando1;
        $this->operando2 = $operando2;
        $this->respuesta = $respuesta;

        switch ($this->operador){
            case Operation::$SUMA: 
                $this->resultadoCorrecto = ($this->operando1 + $this->operando2); 
                $this->simboloOperador = "+";
                break;
            case Operation::$RESTA: 
                $this->resultadoCorrecto = ($this->operando1 - $this->operando2); 
                $this->simboloOperador = "-";
                break;                
        }        
    }
    public function solve():bool{
        return $this->resultadoCorrecto == $this->respuesta;
    }

    public function __toString():string{
        $cad = "<p>$this->operando1 $this->simboloOperador $this->operando2 = $this->resultadoCorrecto</p>";
        $cad .= "<p> Resultado Usuario: $this->respuesta ";
            $cad .= $this->solve()?"(Resultado Correcto)":"(Resultado Incorrecto)";
        $cad .= "</p>";
        return $cad;
    }
}
