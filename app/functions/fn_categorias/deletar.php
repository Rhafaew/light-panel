<?php

if (isset($_GET['delete_categ'])):

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $listar = listar('categorias', "WHERE parente=" . $id);
    foreach ($listar as $catUpd):
        if ($catUpd->parente == $id):
            $attributes = [
                'parente' => '0'
            ];
            $updCateg = atualizar($catUpd->id, "categorias", $attributes);
        endif;
    endforeach;

    $delCateg = deletar("id", $id, "categorias");
    header('Location: ' . LinkPostCategoria);
    
endif;