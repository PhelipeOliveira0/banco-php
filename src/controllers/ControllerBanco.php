<?php 

    namespace php\ProjetoBanco\controllers;

    use php\ProjetoBanco\models\{ContaSalario, ContaCorrente};

    class ControllerBanco{

        protected \PDO $pdo;


        public function __construct(\PDO $pdo){
            $this->pdo = $pdo;
        }


        public function http(){
            $pdo = $this->pdo;

            $user = ($tipo === "corrente") ? new ContaCorrente("e","e",1,$_SESSION['saldo']) : new ContaSalario("e","e",1,$_SESSION['saldo']);  
            $user->depositar(filter_input(INPUT_POST, "valor", FILTER_VALIDATE_FLOAT));
            $saldo = number_format($user->saldo, 2, '.', '');

            $query = "UPDATE conta SET saldo = :saldo WHERE codigo = :codigo;";
            $update = $pdo->prepare($query);
            $update->bindValue(":saldo", $saldo);
            $update->bindValue(":codigo", $_SESSION["codigo"]);
            $update->execute();
            $_SESSION["saldo"] = $saldo;
            header("location: /", 302,false);
            
        }

    }
