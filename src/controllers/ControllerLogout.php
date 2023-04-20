<?php

    namespace php\ProjetoBanco\controllers;

    class ControllerLogout{

        public function __controller($pdo){
            $pdo = $this->pdo;
        }

        public function http(){
            $_SESSION["login"] = null;
            $_SESSION["nome"] = null;
            $_SESSION["email"] = null;
            $_SESSION["cpf"] = null;
            $_SESSION["codigo"] = null;
            $_SESSION["saldo"] = null;
            $_SESSION["senha"] = null;
            $_SESSION["conta"] = null;
            header("location: /login", 302, null);
        }

    }
