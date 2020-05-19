<?php

if (isset($_GET['new_categ'])):
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $parente = filter_input(INPUT_POST, 'parente', FILTER_SANITIZE_STRING);

    $attributes = [
        'nome' => $nome,
        'nome_url' => str_replace($troca, $recebe, $nome),
        'parente' => $parente
    ];

    $cadCateg = cadastrar("categorias", $attributes);
    if (isset($_GET['returnPost'])):
        header('Location: ' . LinkPostNew);
    elseif (isset($_GET['returnUpd'])):
        header('Location: ' . LinkPostUpdate . '?id=' . $_GET['id']);
    else:
        header('Location: ' . LinkPostCategoria);
    endif;
    $msg = ($cadCateg) ? "Cadastrado!" : "Ocorreu um erro!";
endif;