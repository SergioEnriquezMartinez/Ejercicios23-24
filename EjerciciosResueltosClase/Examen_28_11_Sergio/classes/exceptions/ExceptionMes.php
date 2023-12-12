<?php
namespace Classes\Exceptions;

class ExceptionMes extends \Exception {
    public function __construct($message = "Mes incorrecto", $code = 3) {
        parent::__construct($message, $code);
    }
}
?>