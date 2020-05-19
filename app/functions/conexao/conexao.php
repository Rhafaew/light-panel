<?php

function conectar() {
    // INICIA A CONEXÃO
    $pdo = new PDO('mysql:dbhost=' . HOST . ';dbname=' . DBSA, USER, PASS);
    // EVITA ERROS DE CARACTERS ESPECIAIS
    $pdo->exec('set names utf8');
    $pdo->exec('SET character_set_connection=utf8');
    $pdo->exec('SET character_set_client=utf8');
    $pdo->exec('SET character_set_results=utf8');
    // RETORNA A CONEXÃO 
    return $pdo;
}
