<?php

if (isset($_GET['new_bloco'])):
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
    $lado = filter_input(INPUT_POST, 'lado', FILTER_SANITIZE_STRING);

    $attributes = [
        'nome' => $nome,
        'conteudo' => '',
        'tipo' => $tipo,
        'lado' => $lado
    ];

    $cadbloco = cadastrar("blocos", $attributes);

    if ($cadbloco = TRUE):
        $_SESSION['msgUpdate'] = 'Bloco Cadastrado Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Cadastrar!';
    endif;

    header('Location: ' . LinkWidBlocos);
    exit;
endif;