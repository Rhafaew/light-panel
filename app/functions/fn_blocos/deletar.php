<?php

if (isset($_GET['delete_bloco'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $delBloco = deletar("id", $id, "blocos");
    if ($delBloco = TRUE):
        $_SESSION['msgUpdate'] = 'Deletado com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;
    header('Location: ' . LinkWidBlocos);
    exit;
endif;