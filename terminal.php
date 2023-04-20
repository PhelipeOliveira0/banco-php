<?php

    require __DIR__ . "/vendor/autoload.php";

    use php\ProjetoBanco\models\{Cpf,User,ContaSalario,ContaCorrente};


    $user = new ContaCorrente("zé do bone","zé@boné","77777777",0);
    
    $userPodre = new ContaSalario("zé do bone","zé@boné","555555555",0);
    
    $cpf = new Cpf("657.485.347-45");
    
    $user->depositar(2000.00);
    $user->transferir(911.00,$userPodre);

    $userPodre->depositar(50000);
    var_dump($user);

    echo PHP_EOL . $user->saldo;
    echo PHP_EOL . $userPodre->saldo;