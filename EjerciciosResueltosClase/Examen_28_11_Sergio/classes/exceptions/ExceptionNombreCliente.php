<?php
namespace Classes\Exceptions;

class ExceptionNombreCliente extends \Exception {
    public function __construct($message = "El nombre del cliente no puede estar vacío", $code = 4) {
        parent::__construct($message, $code);
    }
}
?>