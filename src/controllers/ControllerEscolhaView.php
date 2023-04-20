<?php

    namespace php\ProjetoBanco\controllers;

    class ControllerEscolhaView{
        
        protected \PDO $pdo;

        public function __construct($pdo){
            $this->pdo = $pdo;
        }


        public function http(){
            if($_SESSION["login"] === null){
                header("location: /login",302,false);
            }
            require __DIR__ . "/../views/escolha.php";
        }

    }