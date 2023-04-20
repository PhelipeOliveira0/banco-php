<?php

    namespace php\ProjetoBanco\controllers;

    class ControllerSacarView{
        
        protected \PDO $pdo;

        public function __construct($pdo){
            $this->pdo = $pdo;
        }


        public function http(){
            if($_SESSION["login"] === null){
                header("location: /login",302,false);
            }
    
            if($_SESSION["saldo"] === null){
                header("location: /escolha",302,false);
            }
            require __DIR__ . "/../views/sacar.php";
        }

    }