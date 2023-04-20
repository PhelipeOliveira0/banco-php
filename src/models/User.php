<?php

    namespace php\ProjetoBanco\models;

    use php\ProjetoBanco\exceptions\CpfException;

    class User{

        protected string $nome;
        protected string $email;


        public function __construct(string $nome, string $email){     
            $this->nome = $nome;
            $this->email = $email;     
        }

        public function __get(string $valor){
            $string = "mostra" . ucfirst($valor);
            return $this->$string();
        } 


        public function mostraNome(){
            return $this->nome;
        }

        public function mostraEmail(){
            return $this->email;
        }
    }

?>