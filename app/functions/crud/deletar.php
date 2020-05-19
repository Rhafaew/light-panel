<?php

function deletar($campo, $id, $tabela) {
    // Conecta com o banco
    $pdo = conectar();

    $deletar = $pdo->prepare("delete from $tabela where $campo=:id");
    $deletar->bindValue(":id", $id);
    return $deletar->execute();
}
