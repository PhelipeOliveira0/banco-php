<?php

    namespace php\ProjetoBanco\controllers;
    use php\ProjetoBanco\models\{ContaCorrente,ContaSalario};


    class ControllerSacar{

        protected \PDO $pdo;

        public function __construct($pdo){
            $this->pdo = $pdo;
        }

        public function http(){

            $pdo = $this->pdo;

            $sacarValor = filter_input(INPUT_POST,"valor", FILTER_VALIDATE_FLOAT);
            $user = ($_SESSION["tipo"] === "corrente") ? new ContaCorrente("a","a",1,$_SESSION["saldo"]) : new ContaSalario("a","a",1,$_SESSION["saldo"]);
            $user->sacar($sacarValor); 

            $query = "UPDATE conta SET saldo = :saldo WHERE codigo = :codigo;";
            $update = $pdo->prepare($query);
            $update->bindValue(":saldo", number_format($user->saldo, 2, '.', ''));
            $update->bindValue(":codigo", $_SESSION["codigo"]);
            $update->execute();
            $_SESSION["saldo"] = number_format($user->saldo, 2, '.', '');
            header("location: /",302, false);


        }
    }