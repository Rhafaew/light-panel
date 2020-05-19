<?php

if (isset($_GET['del_page'])):

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $listar = listar('paginas', "WHERE id=" . $id);
    foreach ($listar as $page):endforeach;
    if ($page->imagem != NULL):
        unlink(DirIMG . $page->imagem);
    endif;

    $regExcluido = deletar("id", $id, "paginas");
    header('Location: ' . LinkPaginas);
    
endif;