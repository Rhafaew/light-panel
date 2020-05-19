<?php

if (isset($_GET['update_copy'])):
    
    $copy = filter_input(INPUT_POST, 'copy', FILTER_SANITIZE_SPECIAL_CHARS);

    $attributes = [
        'copy' => $copy
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