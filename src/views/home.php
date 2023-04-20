<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Shantell+Sans:wght@300;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Work+Sans:wght@300;400&display=swap" rel="stylesheet">

    <title>Home</title>
</head>
<body>
<header>
    <img src="/icons/bank.png" alt="banco" class="header__miniaturaBank">
    <a href="/logout" class="header__logout__link"><p class="header__logout__link__p">sair</p> <img src="/icons/exit.svg" alt="sair" class="header__logout__link__img"> </a>
</header>
<main>
    <div class="main__info">
        <div class="main__flex__position">     
            <p class="main__userna"><?= $_SESSION["nome"] ?></p>
            <p class="main__saldo">Saldo:<?= $_SESSION["saldo"]?></p>
            <p class="main__codigo">Codigo:<?= $_SESSION["codigo"]; ?></p>
        </div>
    </div>

    <div class="main__banco">
        <a href="banco" class="main__banco__depositar">$</a>
    </div>

    <div class="main__tranzacoes">
        <a href="sacar" class="main__a">sacar</a>
        <?php
            if($_SESSION["tipo"] === "corrente"){
                ?>
                    <a href="transferir" class="main__a">Transferir</a>
                <?php
            }
        ?>
    </div>


</main>
</body>
</html>