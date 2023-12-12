<?php
namespace Classes;
class Operation {
    public const OP_SUMA = 1;
    public const OP_RESTA = 2;    
    private const LIM_INI = 1;
    private const LIM_FIN = 10;
    private int $operador;
    private int $operando1;
    private int $operando2;
    private int $resultadoReal;
    private int $resultadoUser;

    public function __construct(int $operador){
        if (($operador != Operation::OP_SUMA) && ($operador != Operation::OP_RESTA))
            throw new \Exception("Operacion no soportada");
        $this->operador = $operador;
        $this->operando1 = Generic::aleatorio(Operation::LIM_INI, Operation::LIM_FIN);
        $this->operando2 = Generic::aleatorio(Operation::LIM_INI, Operation::LIM_FIN);
        $this->setResultadoReal();
        
    }
    private function setResultadoReal(): void{
        switch ($this->operador){
            case Operation::OP_SUMA: 
                $this->resultadoReal = $this->operando1 + $this->operando2;
                break;
            case Operation::OP_RESTA: 
                $this->resultadoReal = $this->operando1 - $this->operando2;
                break;    
        }        
    }
    public function setResultadoUser($resultadoUser): void{
        $this->resultadoUser = $resultadoUser;
    }

    public function checkResult(): bool{
        return $this->resultadoReal == $this->resultadoUser;
    }

    public function getOperation(): string{
        switch ($this->operador){
            case Operation::OP_SUMA: 
                return "¿$this->operando1 + $this->operando2?";
            case Operation::OP_RESTA: 
                return "¿$this->operando1 - $this->operando2?";
        }
        return "Error";
    }
    public function getOperador(){
        return $this->operador;
    }

    public function __toString(): string{
        $cad = "";
        switch ($this->operador){
            case Operation::OP_SUMA: 
                $cad = "$this->operando1 + $this->operando2 = $this->resultadoReal"; break;
            case Operation::OP_RESTA: 
                $cad = "$this->operando1 - $this->operando2 = $this->resultadoReal"; break;
        }                

        if ($this->resultadoUser == null) $cad.= " (Sin resultado User)";
        else{
            $cad.= " (Resultado del Usuario: $this->resultadoUser";
            $cad .= ($this->checkResult()? " CORRECTO)":" --INCORRECTO)");
        }
        
        return $cad;
    }
    
}


