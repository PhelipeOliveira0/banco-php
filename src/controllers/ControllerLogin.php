<?php

    namespace php\ProjetoBanco\controllers;

    class ControllerLogin{

        protected \PDO $pdo;

        public function __construct($pdo){
            $this->pdo = $pdo;
        }


        public function http(){
        
            $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_STRING);
            $senha = filter_input(INPUT_POST,"fSenha",FILTER_SANITIZE_STRING);
            $pdo = $this->pdo;
        
            $query = "SELECT senha, nome, codigo FROM pessoa WHERE email = :email;";
            $select = $pdo->prepare($query);
            $select->bindValue(":email",$email); 
            $select->execute();
            $selectPessoa = $select->fetch();
          
            if($selectPessoa === false){
                $query = "SELECT * FROM conta WHERE email = :email;";
                $select = $pdo->prepare($query);
                $select->bindValue(":email",$email);
                $select->execute();
                
                $selectConta = $select->fetch();
                if(password_verify($senha, $selectConta["senha"])){
                    $_SESSION["login"] = "logado";
                    $_SESSION["email"] = $email;
                    $_SESSION["cpf"] = $selectConta["cpf"];
                    $_SESSION["nome"] = $selectConta["nome"];
                    $_SESSION["codigo"] = $selectConta["codigo"];
                    $_SESSION["tipo"] = $selectConta["tipo"];
                    $_SESSION["saldo"] = $selectConta["saldo"];   
                    header("location: /", 302,false); 
                    exit(); 
                }

            }else{
                if(password_verify($senha, $selectPessoa["senha"])){
                    $_SESSION["login"] = "logado";
                    $_SESSION["nome"] = $selectPessoa["nome"];
                    $_SESSION["codigo"] = $selectPessoa["codigo"];
                    $_SESSION["email"] = $email;
                    $_SESSION["cpf"] = $selectPessoa["cpf"];
                    header("location: /",302,false);
                    exit();
                }
            }
            header("location: /login",302,false);
        }

    }
