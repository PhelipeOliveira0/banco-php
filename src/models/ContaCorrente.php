<?php

    namespace php\ProjetoBanco\models;

    use php\ProjetoBanco\models\Conta;
    use php\ProjetoBanco\exceptions\ValorInvalidoException;

    class ContaCorrente extends Conta{

        public function tarifa(){
            return 0.004;
        }

        public function transferir(float $valor , Conta $conta){
            $tarifa = $valor * $this->tarifa();

            try {
                if($this->saldo <= $tarifa + $valor){
                    throw new ValorInvalidoException();
                }
            } catch (ValorInvalidoException $e) {
                echo $e->getMessage();
                return;
            }

            $conta->saldo += $valor;
            $this->saldo -= $valor + $tarifa;
            return;
        }

    }