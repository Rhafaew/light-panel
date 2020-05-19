<?php

function listar($tabela, $where = NULL) {
    // Conecta com o banco
    $pdo = conectar();

    $listar = $pdo->query("select * from $tabela $where");
    $listar->execute();
    return $listar->fetchAll(PDO::FETCH_OBJ);
}
