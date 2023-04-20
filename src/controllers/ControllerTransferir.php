<?php

    namespace php\ProjetoBanco\controllers;

    use php\ProjetoBanco\models\{ContaCorrente, ContaSalario};
    
    class ControllerTransferir{

        public function __construct($pdo){
            $this->pdo = $pdo;
        }

        public function http(){
            $valorTransferir = filter_input(INPUT_POST,"valor",FILTER_VALIDATE_FLOAT);
            $codigoTransferir = filter_input(INPUT_POST, "codigo", FILTER_VALIDATE_INT);

            $pdo = $this->pdo;

            $query = "SELECT codigo, tipo, saldo FROM conta WHERE codigo = ?;";
            $selectValidacao = $pdo->prepare($query);
            $selectValidacao->bindValue(1, $codigoTransferir);
            $selectValidacao->execute();

            $validacao = $selectValidacao->fetch();



            if($validacao != false && $_SESSION["codigo"] != $validacao["codigo"]){
                
                $userReceber = ($validacao["tipo"] === "corrente") ? new ContaCorrente("a","a",$codigoTransferir,$validacao["saldo"]) : new ContaSalario("a","a",$codigoTransferir,$validacao["saldo"]);
                $userEnvio = new ContaCorrente($_SESSION["nome"],$_SESSION["email"],$_SESSION['codigo'],$_SESSION['saldo']);
                
                $userEnvio->transferir($valorTransferir, $userReceber);
             
                $queryUpdate = "UPDATE conta SET saldo = :saldo WHERE codigo = :codigo;";
                $updateReceber = $pdo->prepare($queryUpdate);
                $updateReceber->bindValue(":saldo", $userReceber->saldo);
                $updateReceber->bindValue(":codigo", $userReceber->codigo);
                $updateReceber->execute();

                $updateEnviar = $pdo->prepare($queryUpdate);
                $updateEnviar->bindValue(":saldo", $userEnvio->saldo);
                $updateEnviar->bindValue(":codigo", $userEnvio->codigo);
                $updateEnviar->execute();
                $_SESSION["saldo"] = number_format($userEnvio->saldo, 2, '.', '');
                header("location: /", 302 , false);
            }
            header("location: /",302,false);
        }

    }