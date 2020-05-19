<?php

if (isset($_GET['del_post'])):

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $listar = listar('conteudo', "WHERE id=" . $id);
    foreach ($listar as $post):endforeach;
    if ($post->imagem != NULL):
        unlink(DirIMG . $post->imagem);
    endif;

    $regExcluido = deletar("id", $id, "conteudo");
    header('Location: ' . LinkPostagens);
    
endif;