<?php

    namespace php\ProjetoBanco\models;

    use php\ProjetoBanco\models\Conta;
    use php\ProjetoBanco\exceptions\SaldoInsuficienteException;

    
    class ContaSalario extends Conta{
    
        public function tarifa(){
            return 0.001;
        }

    }
    