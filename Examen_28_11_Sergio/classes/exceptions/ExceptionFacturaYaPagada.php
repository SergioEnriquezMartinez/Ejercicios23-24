<?php
namespace Classes\Exceptions;

class ExceptionFacturaYaPagada extends \Exception {
    public function __construct($message = null, $code = 2) {
        parent::__construct("La factura ya ha sido pagada", $code);
    }
}
?>