<?php

if (isset($_GET['del_slider'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $delSlider = deletar("destaque", $id, "slider");
    if ($delSlider = TRUE):
        $_SESSION['msgUpdate'] = 'Item Removido!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Remover!';
    endif;
    header('Location: ' . LinkSlider);
    exit;
endif;