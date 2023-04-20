<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/transferir.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Shantell+Sans:wght@300;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Work+Sans:wght@300;400&display=swap" rel="stylesheet">
    <title>Sacar</title>
</head>
<body>
<header>
    <a href="/">
        <img src="/icons/bank.png" alt="banco" class="header__miniaturaBank">
    </a>
    <a href="/logout" class="header__logout__link"><p class="header__logout__link__p">sair</p> <img src="/icons/exit.svg" alt="sair" class="header__logout__link__img"> </a>
</header>
<main>
    <div class="info">
        <div class="info__flex__position">     
            <p class="main__userna"><?= $_SESSION["nome"] ?></p>
            <p class="main__saldo">Saldo:<?= $_SESSION["saldo"]?></p></p>
            <p class="main__codigo">Codigo:<?= $_SESSION["codigo"]; ?></p>
        </div>
    </div>
    <div class="campos">
        <form action="/transferirPost" method="post" class="campos__form">
            <fieldset class="campos__fieldset">
            <legend>Valor para sacar</legend>
                <div class="campos__transferir">

                    <label for="valor">Valor</label>
                    <input class="campos__transferir__input" type="number" min="0" name="valor" step="0.01" id="valor" placeholder="5000.50">

                    <div class="campos__transferir__div__botao">
                        <input type="submit" value="sacar" class="campos__transferir__botao">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</main>
</body>
</html>