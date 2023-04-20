<?php

    namespace php\ProjetoBanco\controllers;
    

    class ControllerCadastroView{
        
        protected \PDO $pdo;

        public function __construct($pdo){
            $this->pdo = $pdo;
        }

        public function http(){

            if($_SESSION["login"] != null){
                header("location: /",302,false);
            }

            require __DIR__ . "/../views/cadastrar.php";
        }

    }