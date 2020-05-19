<?php

if (isset($_GET['new_page'])):
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $conteudo = filter_input(INPUT_POST, 'conteudo');
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $parente = filter_input(INPUT_POST, 'parente', FILTER_SANITIZE_STRING);
    $img = filter_input(INPUT_POST, 'img', FILTER_SANITIZE_STRING);
    $enviar_img = filter_input(INPUT_POST, 'enviar_img', FILTER_SANITIZE_STRING);

    $listar = listar('layout');
    foreach ($listar as $colDef):endforeach;

    $col_a = $colDef->col_a;
    $col_b = $colDef->col_b;

    $pos_a = $colDef->pos_a;
    $pos_b = $colDef->pos_b;

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
                'first' => '0',
                'post' => '0',
                'ordem' => '0',
                'col_a' => $col_a,
                'col_b' => $col_b,
                'pos_a' => $pos_a,
                'pos_b' => $pos_b
            ];

        //var_dump($attributes); exit();

        endif;
    else:
        $attributes = [
            'nome' => $nome,
            'nome_url' => str_replace($troca, $recebe, $nome),
            'conteudo' => $conteudo,
            'imagem' => '',
            'autor' => $_SESSION['nick'],
            'data' => date('d/m/Y'),
            'status' => $status,
            'parente' => $parente,
            'first' => '0',
            'post' => '0',
            'ordem' => '0',
            'col_a' => $col_a,
            'col_b' => $col_b,
            'pos_a' => $pos_a,
            'pos_b' => $pos_b
        ];
    endif;

    $cadPage = cadastrar("paginas", $attributes);
    header('Location: ' . LinkPaginaUpdate . '?id=' . $cadPage);
    exit;
    $msg = ($cadPage) ? "Cadastrado!" : "Ocorreu um erro!";
endif;