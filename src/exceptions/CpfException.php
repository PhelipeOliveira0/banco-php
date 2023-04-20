<?php

    namespace php\ProjetoBanco\exceptions;

    use \Exception;

    class CpfException extends Exception{

        public function __construct($message = "CPF invalido", $code = 1){
            parent::__construct($message,$code);
        }

    }