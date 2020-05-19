<?php

if (isset($_GET['update_post'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
    $categoria = ($categoria == NULL) ? '' : $categoria;
    $galeria = filter_input(INPUT_POST, 'galeria', FILTER_SANITIZE_STRING);
    $galeria = ($galeria == NULL) ? '0' : $galeria;

    $img = filter_input(INPUT_POST, 'img', FILTER_SANITIZE_STRING);
    $enviar_img = filter_input(INPUT_POST, 'enviar_img', FILTER_SANITIZE_STRING);

    $dataUpd = date('d/m/Y H:i:s');

    $listar = listar('conteudo', "WHERE id=" . $id);
    foreach ($listar as $post): endforeach;

    if ($enviar_img == "sim"):
        if (isset($_FILES['img']['type'])
                and $_FILES['img']['type'] != 'image/JPEG'
                and $_FILES['img']['type'] != 'image/jpeg'
                and $_FILES['img']['type'] != 'image/JPG'
                and $_FILES['img']['type'] != 'image/jpg'
                and $_FILES['img']['type'] != 'image/PNG'
                and $_FILES['img']['type'] != 'image/png'
                and $_FILES['img']['type'] != 'image/GIF'
                and $_FILES['img']['type'] != 'image/gif'
        ):
            echo "<h4>Formato invalido!</h4>
                    <p>A imagem deve ser <b>jpeg</b>, <b>jpg</b>, <b>png</b> ou <b>gif</b>.</p>
                    <p><b>Obs:</b> Se a imagem corresponde aos formatos acima é possível que a imagem contenha algum erro!</p>
                    <p>Tente enviar outra imagem.</p>";
        else:

            if ($post->imagem != NULL):
                unlink(DirIMG . $post->imagem);
            endif;

            $img = upload_img(DirIMG, $_FILES['img']['name'], $_FILES['img']['tmp_name']);

            $attributes = [
                'titulo' => $titulo,
                'titulo_url' => str_replace($troca, $recebe, $titulo),
                'texto' => $texto,
                'categoria' => $categoria,
                'categoria_url' => str_replace($troca, $recebe, $categoria),
                'imagem' => $img,
                'galeria_id' => $galeria,
                'data_mod' => $dataUpd,
                'status' => $status
            ];
        endif;
    else:
        if ($enviar_img == "del"):
            if (file_exists(DirIMG . $post->imagem)):
                unlink(DirIMG . $post->imagem);
                $img = '';
            else:
                $img = '';
            endif;
        else:
            $img = $post->imagem;
        endif;
        $attributes = [
            'titulo' => $titulo,
            'titulo_url' => str_replace($troca, $recebe, $titulo),
            'texto' => $texto,
            'categoria' => $categoria,
            'categoria_url' => str_replace($troca, $recebe, $categoria),
            'imagem' => $img,
            'galeria_id' => $galeria,
            'data_mod' => $dataUpd,
            'status' => $status
        ];
    endif;

    $updPost = atualizar($id, "conteudo", $attributes);

    if ($updPost = TRUE):
        $_SESSION['msgUpdate'] = 'Atualizado Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;
    header('Location: ' . LinkPostUpdate . '?id=' . $id);
    exit;
endif;

// STATUS UPDADTE
if (isset($_GET['update_post_status'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

    $listar = listar("conteudo", "where id='" . $id . "'");
    foreach ($listar as $post):endforeach;

    if ($post->status == '0'):
        $status = '1';
        $statusMSG = 'Visivel';
    else:
        $status = '0';
        $statusMSG = 'Oculto';
    endif;
    $attributes = [
        'status' => $status
    ];
    $updPost = atualizar($id, "conteudo", $attributes);
    $_SESSION['msgUpdate'] = 'Status alterado para "' . $statusMSG . '".';
    header('Location: ' . BaseHost . 'admin/postagens/');
    exit;
endif;
