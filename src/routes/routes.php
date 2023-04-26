<?php

use php\ProjetoBanco\models\{Conta,ContaCorrente,ContaSalario};
use php\ProjetoBanco\controllers\{ControllerCadastroView,ControllerLoginView,ControllerTransferirView,ControllerSacarView,ControllerBancoView,ControllerEscolhaView,ControllerCadastrar,
    ControllerLogin, ControllerEscolhaSalario,ControllerLogout,ControllerTransferir,ControllerBanco,ControllerEscolhaCorrente,ControllerSacar,Controller404View};

    $routes = [
        "/cadastro" => ControllerCadastroView::class,
        "/login" => ControllerLoginView::class,
        "/transferir" => ControllerTransferirView::class,
        "/sacar" => ControllerSacarView::class,
        "/banco" => ControllerBancoView::class,
        "/escolha" => ControllerEscolhaView::class,
        "/cadastroBack" => ControllerCadastrar::class,
        "/logar" => ControllerLogin::class,
        "/salario" => ControllerEscolhaSalario::class,
        "/logout" => ControllerLogout::class,
        "/transferirBack" => ControllerTransferir::class,
        "/depositarPost" => ControllerBanco::class,
        "/corrente" => ControllerEscolhaCorrente::class,
        "/transferirPost" => ControllerSacar::class,

    ];


return $routes;