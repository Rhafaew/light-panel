<?php

if (isset($_GET['new_slider'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $destaque = filter_input(INPUT_POST, 'destaque', FILTER_SANITIZE_STRING);

    $attributes = [
        'destaque' => $destaque,
        'ordem' => '0'
    ];

    if ($destaque == 0):
        $_SESSION['msgUpdate'] = 'Retornou!';
        header('Location: ' . LinkSlider);
    else:

        $cadDest = cadastrar("slider", $attributes);
        if ($cadDest = TRUE):
            $_SESSION['msgUpdate'] = 'Adicionado Com Sucesso!';
        else:
            $_SESSION['msgUpdate'] = 'Erro ao Adicionar!';
        endif;
        header('Location: ' . LinkSlider);
        exit;

    endif;
endif;
