<?php

if (isset($_GET['update_page'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $conteudo = filter_input(INPUT_POST, 'conteudo');
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $parente = filter_input(INPUT_POST, 'parente', FILTER_SANITIZE_STRING);
    $parente = ($parente == NULL) ? '0' : $parente;

    $img = filter_input(INPUT_POST, 'img', FILTER_SANITIZE_STRING);
    $enviar_img = filter_input(INPUT_POST, 'enviar_img', FILTER_SANITIZE_STRING);

    $col_custon = filter_input(INPUT_POST, 'col_custon', FILTER_SANITIZE_STRING);

    if ($col_custon == NULL):
        $col_custon = '1';

        $col_a = filter_input(INPUT_POST, 'col_a', FILTER_SANITIZE_STRING);
        $col_a = ($col_a == NULL) ? '0' : $col_a;
        $col_b = filter_input(INPUT_POST, 'col_b', FILTER_SANITIZE_STRING);
        $col_b = ($col_b == NULL) ? '0' : $col_b;

        $pos_a = filter_input(INPUT_POST, 'pos_a', FILTER_SANITIZE_STRING);
        $pos_b = filter_input(INPUT_POST, 'pos_b', FILTER_SANITIZE_STRING);

    else:

        $col_a = '0';
        $col_b = '0';

        $pos_a = '0';
        $pos_b = '0';

    endif;

    $listar = listar('paginas', "WHERE id=" . $id);
    foreach ($listar as $page):endforeach;

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

            if ($page->imagem != NULL):
                unlink(DirIMG . $page->imagem);
            endif;

            $img = upload_img(DirIMG, $_FILES['img']['name'], $_FILES['img']['tmp_name']);

            $attributes = [
                'nome' => $nome,
                'nome_url' => str_replace($troca, $recebe, $nome),
                'conteudo' => $conteudo,
                'imagem' => $img,
                'autor' => $_SESSION['nick'],
                'data' => date('d/m/Y'),
                'status' => $status,
                'parente' => $parente,
                'col_custon' => $col_custon,
                'col_a' => $col_a,
                'col_b' => $col_b,
                'pos_a' => $pos_a,
                'pos_b' => $pos_b
            ];

        endif;
    else:
        if ($enviar_img == "del"):
            if (file_exists(DirIMG . $page->imagem)):
                unlink(DirIMG . $page->imagem);
                $img = '';
            else:
                $img = '';
            endif;
        else:
            $img = $page->imagem;
        endif;
        $attributes = [
            'nome' => $nome,
            'nome_url' => str_replace($troca, $recebe, $nome),
            'conteudo' => $conteudo,
            'imagem' => $img,
            'autor' => $_SESSION['nick'],
            'data' => date('d/m/Y'),
            'status' => $status,
            'parente' => $parente,
            'col_custon' => $col_custon,
            'col_a' => $col_a,
            'col_b' => $col_b,
            'pos_a' => $pos_a,
            'pos_b' => $pos_b
        ];
    endif;

    $updPage = atualizar($id, "paginas", $attributes);

    if ($updPage = TRUE):
        $_SESSION['msgUpdate'] = 'Atualizado Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;

    header('Location: ' . LinkPaginaUpdate . '?id=' . $id);
    //header("Location: javascript:history.back()");
    exit;
endif;

// STATUS UPDADTE
if (isset($_GET['update_page_status'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

    $listar = listar("paginas", "where id='" . $id . "'");
    foreach ($listar as $page):endforeach;

    if ($page->status == '0'):
        $status = '1';
        $statusMSG = 'Visivel';
    else:
        $status = '0';
        $statusMSG = 'Oculto';
    endif;
    $attributes = [
        'status' => $status
    ];
    $updPage = atualizar($id, "paginas", $attributes);
    $_SESSION['msgUpdate'] = 'Status alterado para "' . $statusMSG . '".';
    header('Location: ' . BaseHost . 'admin/paginas/');
    exit;
endif;
