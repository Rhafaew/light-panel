<?php

if (isset($_GET['update_layout'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $col_a = filter_input(INPUT_POST, 'col_a', FILTER_SANITIZE_STRING);
    $col_a = ($col_a == NULL) ? '0' : $col_a;

    $col_b = filter_input(INPUT_POST, 'col_b', FILTER_SANITIZE_STRING);
    $col_b = ($col_b == NULL) ? '0' : $col_b;

    $pos_a = filter_input(INPUT_POST, 'pos_a', FILTER_SANITIZE_STRING);
    $pos_b = filter_input(INPUT_POST, 'pos_b', FILTER_SANITIZE_STRING);

    $attributes = [
        'col_a' => $col_a,
        'col_b' => $col_b,
        'pos_a' => $pos_a,
        'pos_b' => $pos_b
    ];

    echo '<pre>';
    print_r($attributes);
    echo '</pre>';

    $updCliente = atualizar('1', "layout", $attributes);

    if ($updCliente = TRUE):
        $_SESSION['msgUpdate'] = 'Atualizado Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;

    header('Location: ' . LinkLayout);
    exit;
endif;