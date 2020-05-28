<?php

if (isset($_GET['update_copy'])):

    $copy = filter_input(INPUT_POST, 'copy', FILTER_SANITIZE_SPECIAL_CHARS);
    $bloco1 = filter_input(INPUT_POST, 'bloco1', FILTER_SANITIZE_SPECIAL_CHARS);
    $bloco01 = ($bloco1 == NULL) ? '' : $bloco1;

    $bloco2 = filter_input(INPUT_POST, 'bloco2', FILTER_SANITIZE_SPECIAL_CHARS);
    $bloco02 = ($bloco2 == NULL) ? '' : $bloco2;

    $bloco3 = filter_input(INPUT_POST, 'bloco3', FILTER_SANITIZE_SPECIAL_CHARS);
    $bloco03 = ($bloco3 == NULL) ? '' : $bloco3;

    $attributes = [
        'copy' => $copy,
        'bloco1' => $bloco01,
        'bloco2' => $bloco02,
        'bloco3' => $bloco03
    ];

    $updSiteInfo = atualizar("1", "footer", $attributes);

    if ($updCliente = TRUE):
        $_SESSION['msgUpdate'] = 'Copyright Atualizado!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;

    header('Location: ' . LinkFooter);
    exit;
endif;