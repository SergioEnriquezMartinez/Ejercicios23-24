<?php
    namespace Clases\Excepciones;

    class SoporteNoEncontradoException extends VideoclubException
    {
        public function __construct($message)
        {
            parent::__construct($message);
        }
    }

?>