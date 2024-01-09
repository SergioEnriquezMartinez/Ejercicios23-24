<?php

    namespace Clases\Excepciones;
    use Exception;

    class VideoclubException extends Exception
    {
        public function __construct($message)
        {
            parent::__construct($message);
        }
        
    }

?>