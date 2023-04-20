<?php

$username = "root";
$password = "uma senha muito boa";

$pdo = new PDO('mysql:host=localhost;dbname=banco', $username, $password);

$pdo->exec("CREATE TABLE pessoa(codigo MEDIUMINT NOT NULL PRIMARY KEY, nome NOT NULL VARCHAR(50), NOT NULL email VARCHAR(50), NOT NULL cpf VARCHAR(255), NOT NULL senha VARCHAR(255));");
$pdo->exec("CREATE TABLE conta(codigo MEDIUMINT NOT NULL PRIMARY KEY, nome NOT NULL VARCHAR(50), email NOT NULL VARCHAR(50), cpf NOT NULL VARCHAR(255), senha NOT NULL VARCHAR(255), tipo NOT NULL ENUM('corrente','salario'), NOT NULL saldo FLOAT(15,2));");
