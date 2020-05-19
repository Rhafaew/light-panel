<?php

if (isset($_GET['update_categ'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $parente = filter_input(INPUT_POST, 'parente', FILTER_SANITIZE_STRING);

    $attributes = [
        'nome' => $nome,
        'parente' => $parente
    ];

    $updCateg = atualizar($id, "categorias", $attributes);
    header('Location: ' . LinkPostCategoria);
endif;