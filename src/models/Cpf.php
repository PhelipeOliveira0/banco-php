<?php

namespace php\ProjetoBanco\models;
use php\ProjetoBanco\exceptions\CpfException;


class Cpf{

    protected string $cpf;

    public function __construct(string $codigo){
        try{
            if($this->validaCpf($codigo) === 1){
                $this->cpf = $codigo;
         
            }else{
                throw new CpfException();
            }
        }catch (CpfException $e){
            echo $e->getMessage();
        }
        
    }

    public function __get(string $valor){
        $string = "mostra" . ucfirst($valor);
        return $this->$string();
    }

    public function mostraCpf(){
        return $this->cpf;
    }

    protected function validaCpf(string $codigo){
        if(strlen($codigo) !=14 || preg_match("(\d{3}\.\d{3}\.\d{3}-\d{2})",$codigo) != 1){
            return 0;
        }
        return 1;
    }

    public function mostrarCpfCensurado(){
        $numeros = substr($this->cpf,8,3);
        $codigoCensurado = "XXX.XXX.". $numeros . "-XX";
        return $codigoCensurado;
    }
}

