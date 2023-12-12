<?php
namespace Classes\Exceptions;

class ExceptionFacturaNoExiste extends \Exception {
    public function __construct($message = null, $code = 1) {
        parent::__construct("La factura no existe", $code);
    }
}
?>