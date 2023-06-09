<?php
    session_start();
    require __DIR__ . "/../vendor/autoload.php";

    use php\ProjetoBanco\models\{Conta,ContaCorrente,ContaSalario};
    use php\ProjetoBanco\controllers\{ControllerCadastroView,ControllerLoginView,ControllerHomeView,ControllerTransferirView,ControllerSacarView,ControllerBancoView,ControllerEscolhaView,
        ControllerCadastrar,ControllerLogin,ControllerEscolhaSalario,ControllerLogout,ControllerTransferir,depositarPost,ControllerEscolhaCorrente,ControllerSacar,Controller404View};

    $username = "root";
    $password = "uma senha meneira";

    $pdo = new PDO('mysql:host=localhost;dbname=banco', $username, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $routes =require __DIR__ . "/../src/routes/routes.php";
    $url = $_SERVER["REQUEST_URI"];
    
    if(array_key_exists($url,$routes)){
        $classControll = $routes[$url];
        $class = new $classControll($pdo);
        $class->http();
    }else if($url === "/"){
        $home = new ControllerHomeView($pdo);
        $home->http();
    }else{
        $erro404 = new Controller404View($pdo);
        $erro404->http();
    }