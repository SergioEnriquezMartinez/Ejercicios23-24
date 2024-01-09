<?php
    namespace Clases\Excepciones;

    class ClienteNoEncontradoException extends VideoclubException
    {
        public function __construct($message)
        {
            parent::__construct($message);
        }
    }

?>