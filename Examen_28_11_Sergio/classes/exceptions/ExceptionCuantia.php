<?php
namespace Classes\Exceptions;

class ExceptionCuantia extends \Exception {
    public function __construct($message = null, $code = 0) {
        parent::__construct("La cuantía debe ser un número entero positivo", $code);
    }
}
?>