<?php

    namespace php\ProjetoBanco\exceptions;

    use \Exception;

    class ValorInvalidoException extends Exception{

        public function __construct($message = "valor invalido", $code = 2){
            parent::__construct($message,$code);
        }

    }

