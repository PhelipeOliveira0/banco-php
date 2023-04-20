<?php 

namespace php\ProjetoBanco\controllers;
    
    class ControllerCadastrar{
        
        protected \PDO $pdo;

        public function __construct($pdo){
            $this->pdo = $pdo;
        }

        public function http(){
            if(filter_input(INPUT_POST,"fSenha",FILTER_SANITIZE_STRING) != filter_input(INPUT_POST,"fSenhaConfirme",FILTER_SANITIZE_STRING)){
                header("Location: /cadastro",302,false);
            }
            $cadastro = ["nome" => filter_input(INPUT_POST,"fNome",FILTER_SANITIZE_STRING),
                      "email" => filter_input(INPUT_POST,"fEmail",FILTER_SANITIZE_STRING),
                      "cpf" => password_hash(filter_input(INPUT_POST,"fCpf",FILTER_SANITIZE_STRING),PASSWORD_DEFAULT),
                      "senha" => password_hash(filter_input(INPUT_POST,"fSenha",FILTER_SANITIZE_STRING),PASSWORD_DEFAULT)];
                      
            $codigo = $this->gerarCodigo();
            
            $pdo = $this->pdo;

            $querySelect = "SELECT email FROM pessoa WHERE email = ?;";
            $selectEmailpessoa = $pdo->prepare($querySelect);
            $selectEmailpessoa->bindValue(1,$cadastro["email"]);
            $selectEmailpessoa->execute();
            
            $querySelect = "SELECT email FROM conta WHERE email = ?;";
            $selectEmailconta = $pdo->prepare($querySelect);
            $selectEmailconta->bindValue(1,$cadastro["email"]);
            $selectEmailconta->execute();

            if($selectEmailpessoa->fetch() != false || $selectEmailconta->fetch() != false){
                header("location: /cadastro", 302, false);
                $_SESSION["erroCadastro"] = "email invalido";
                exit();
            }
            

            $queryCpfpessoa = "SELECT cpf FROM pessoa";
            $selectCpfPessoa = $pdo->query($queryCpfpessoa);
            
            foreach($selectCpfPessoa->fetchAll() as $cpf){
                if(password_verify($cadastro["cpf"], $cpf["cpf"])){
                    $_SESSION["erroCadastro"] = "cpf invalido";
                    header("location: /cadastro", 302, false);
                    exit();
                }
            }


            $queryCpfConta = "SELECT cpf FROM conta;";
            $selectCpfConta = $pdo->query($queryCpfConta);

            foreach($selectCpfConta as $cpf){
                if(password_verify($cadastro["cpf"], $cpf["cpf"])){
                    $_SESSION["erroCadastro"] = "cpf invalido";
                    header("location: /cadastro", 302, false);
                    exit();
                }
            }



            //insert

            $query = "INSERT INTO pessoa(nome,email,cpf,senha,codigo)VALUES(:nome,:email,:cpf,:senha,:codigo);";
            $insert = $pdo->prepare($query);
            $insert->bindValue(":nome", $cadastro["nome"]);
            $insert->bindValue(":email", $cadastro["email"]);
            $insert->bindValue(":cpf", $cadastro["cpf"]);
            $insert->bindValue(":senha", $cadastro["senha"]);
            $insert->bindValue(":codigo", $codigo);
            $insert->execute();

            $_SESSION["login"] = "logado";
            $_SESSION["nome"] = $cadastro["nome"];
            $_SESSION["email"] = $cadastro["email"];
            $_SESSION["cpf"] = $cadastro["cpf"];
            $_SESSION["senha"] = $cadastro["senha"];
            $_SESSION["codigo"] = $codigo;
            $_SESSION["erroCadastro"] = null;
            header("location: /escolha", 302, false);
        }


        public function gerarCodigo(){
            $codigo = rand(100000,999999);
            $pdo = $this->pdo;
            $queryCodigoPessoa = "SELECT codigo FROM pessoa WHERE codigo = ?;";
            $selectCodigoPessoa = $pdo->prepare($queryCodigoPessoa);
            $selectCodigoPessoa->bindValue(1, $codigo);
            $selectCodigoPessoa->execute();

            $queryCodigoConta = "SELECT codigo FROM conta WHERE codigo = ?;";
            $selectCodigoConta = $pdo->prepare($queryCodigoConta);
            $selectCodigoConta->bindValue(1, $codigo);
            $selectCodigoConta->execute();

            if($selectCodigoPessoa->fetch() != false || $selectCodigoConta->fetch() != false){
                $this->gerarCodigo();
            }
            return $codigo;
            
        }
    }