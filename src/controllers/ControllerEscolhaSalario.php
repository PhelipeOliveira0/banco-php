<?php

    namespace php\ProjetoBanco\controllers;

    use php\ProjetoBanco\models\ContaSalario;

    class ControllerEscolhaSalario{

        protected \PDO $pdo;

        public function __construct($pdo){
            $this->pdo = $pdo;
        }

        public function http(){


            $pdo = $this->pdo;

            $queryInsert = "INSERT INTO conta(codigo,nome,email,cpf,senha,tipo,saldo)VALUES(:codigo, :nome, :email, :cpf, :senha, :tipo, :saldo);";

            $insert = $pdo->prepare($queryInsert);
            $insert->bindValue(":codigo", $_SESSION["codigo"]);
            $insert->bindValue(":nome", $_SESSION["nome"]);
            $insert->bindValue(":email", $_SESSION['email']);
            $insert->bindValue(":cpf", $_SESSION["cpf"]);
            $insert->bindValue(":senha", $_SESSION["senha"]);
            $insert->bindValue(":tipo", "salario");
            $insert->bindValue(":saldo", 0);

            $insert->execute();

            $queryDelete = "DELETE FROM pessoa WHERE codigo = ?;";

            $delete = $pdo->prepare($queryDelete);
            $delete->bindValue(1, $_SESSION["codigo"]);
            $delete->execute();

            $_SESSION["tipo"] = "salario";
            $_SESSION["saldo"] = 0;
            $_SESSION["senha"] = null;
            $_SESSION["cpf"] = null;




            header("location: /", 302, false);
        }

    }