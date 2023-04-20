<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Shantell+Sans:wght@300;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Work+Sans:wght@300;400&display=swap" rel="stylesheet">

</head>
<body>
    <header>
        <img src="/icons/bank.png" alt="banco" class="header__miniaturaBank">
    </header>

    <form method="post" class="cadastro" action="/logar">
        <fieldset class="cadastro__itens">
            <legend>Login</legend>
            <label class="cadastro__itens__label" for="email">Email</label>
            <input class="cadastro__itens__input" required type="email" name="email" id="email" placeholder="Seu@email">
            <label class="cadastro__itens__label" for="fSenha">Senha</label>
            <input class="cadastro__itens__input" required type="password" name="fSenha" id="fSenha" placeholder="••••••••••••••••••••">

            <div class="cadastro__itens__botao">
                <input class="cadastro__itens__botao__login" type="submit" value="login">
            </div>
            <div class="cadastro__itens__link">
                <a class="cadastro__itens__link__login" href="cadastro">Não possuo conta</a>
            </div>
        </fieldset>
    </form>
</body>
</html>
<?php

    $_SESSION["login"] = null;
    $_SESSION["nome"] = null;
    $_SESSION["email"] = null;
    $_SESSION["cpf"] = null;
    $_SESSION["codigo"] = null;
    $_SESSION["saldo"] = null;
    $_SESSION["senha"] = null;
    $_SESSION["conta"] = null;


?>