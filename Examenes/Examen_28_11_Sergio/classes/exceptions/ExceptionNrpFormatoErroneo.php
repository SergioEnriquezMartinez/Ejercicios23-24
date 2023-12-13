<?php
namespace Classes\Exceptions;

class ExceptionNrpFormatoErroneo extends \Exception {
    public function __construct($message = "Número de registro personal con formato erroneo", $code = 2) {
        parent::__construct($message, $code);
    }
}
?>