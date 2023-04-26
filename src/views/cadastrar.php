<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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




    <form method="post" class="cadastro" action="/cadastroBack">
        <fieldset class="cadastro__itens">
            <legend>Cadastrar</legend>
            <label class="cadastro__itens__label" for="fNome">Nome</label>
            <input class="cadastro__itens__input" required type="text" id="fNome" name="fNome" minlength="3">
            <label class="cadastro__itens__label" for="fEmail">E-mail</label>
            <input class="cadastro__itens__input" required type="email" name="fEmail" id="fEmail" placeholder="seuemail@email">
            <label class="cadastro__itens__label" for="fCpf">CPF</label>
            <input class="cadastro__itens__input" required type="text" name="fCpf" id="fCpf" placeholder="XXX.XXX.XXX-XX" pattern="(\d{3}\.\d{3}\.\d{3}-\d{2})">
            <label class="cadastro__itens__label" for="fSenha">Senha</label>
            <input class="cadastro__itens__input" required type="password" name="fSenha" id="fSenha" minlength="10" placeholder="••••••••••••••••••••">
            <label class="cadastro__itens__label" for="fSenhaConfirme">Confirme a sua senha</label>
            <input class="cadastro__itens__input" required type="password" name="fSenhaConfirme" id="fSenhaConfirme" minlength="10" placeholder="••••••••••••••••••••">
            <div class="cadastro__itens__botao">
                <input class="cadastro__itens__botao__cadastrar" type="submit" value="Cadastrar">
            </div>
            <div class="cadastro__itens__link">
                <a class="cadastro__itens__link__login" href="login">Já possuo conta</a>
            </div>
        </fieldset>
    </form>
    <?php
        if(array_key_exists("erroCadastro",$_SESSION) && $_SESSION["erroCadastro"] != null){
    ?>
    
        <script>
            let msg = "<?= $_SESSION["erroCadastro"]?>";
            alert(msg);
        </script>
    <?php 
        }
        $_SESSION["erroCadastro"] = null;
    ?>
    <script src="/js/validacaoCadastro.js"></script>
    <script src="/js/validacaoCpf.js"></script>
</body>
</html>


<?php $_SESSION["erroCadastro"] = null; ?>