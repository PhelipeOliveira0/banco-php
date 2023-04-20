<?php

    namespace php\ProjetoBanco\models;
    
    use php\ProjetoBanco\models\User;
    use php\ProjetoBanco\exceptions\ValorInvalidoException;


    abstract class Conta extends User{

        protected float $saldo;
        protected int $codigo;


        public function __construct(string $nome, string $email, int $codigo, float $saldo){
            parent::__construct($nome, $email);
            $this->codigo = $codigo;
            $this->saldo = $saldo;
        }

        public function __get(string $valor){
            $string = "mostra" . ucfirst($valor);
            return $this->$string();
        }

        public function mostraCodigo(){
            return $this->codigo;
        }

        public function mostraSaldo(){
            return $this->saldo;
        }


        public function sacar(float $valor){

            $tarifa = $valor * $this->tarifa();

            try {
                if($valor > $this->saldo - $tarifa || $valor <= 0){
                    throw new ValorInvalidoException();
                }
            } catch (ValorInvalidoException $e) {
                echo $e->getMessage();
                return;
            }
                
            $this->saldo -= $tarifa + $valor;
            return;
        }

        public function depositar(float $valor){
            $tarifa = $valor * $this->tarifa();

            try {
                if($valor <= 0){
                    throw new ValorInvalidoException();
                }
            } catch (ValorInvalidoException $e){
                echo $e->getMessage();
                return;
            }

            $this->saldo += $valor - $tarifa;
        }

        abstract protected function tarifa();
    } 
