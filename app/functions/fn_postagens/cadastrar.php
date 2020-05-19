<?php

if (isset($_GET['new_post'])):
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $texto = filter_input(INPUT_POST, 'texto');
    $fontes = filter_input(INPUT_POST, 'fontes', FILTER_SANITIZE_SPECIAL_CHARS);
    $fontes = ($fontes == NULL) ? 'Da Redação' : $fontes;

    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
    
    $img = filter_input(INPUT_POST, 'img', FILTER_SANITIZE_STRING);
    $enviar_img = filter_input(INPUT_POST, 'enviar_img', FILTER_SANITIZE_STRING);
    $imagem_legenda = filter_input(INPUT_POST, 'imagem_legenda', FILTER_SANITIZE_STRING);
    $imagem_legenda = ($imagem_legenda == NULL) ? '' : $imagem_legenda;
    
    $galeria = filter_input(INPUT_POST, 'galeria', FILTER_SANITIZE_STRING);
    $galeria = ($galeria == NULL) ? '0' : $galeria;

    $rascunho = filter_input(INPUT_POST, 'rascunho', FILTER_SANITIZE_STRING);
    $rascunho = ($rascunho == NULL) ? '0' : $rascunho;
    
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $status = ($rascunho == '1') ? '0' : $status;

    $data = date('d/m/Y H:i:s');

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
                'titulo' => $titulo,
                'titulo_url' => str_replace($troca, $recebe, $titulo),
                'texto' => $texto,
                'fontes' => $fontes,
                'categoria' => $categoria,
                'categoria_url' => str_replace($troca, $recebe, $categoria),
                'autor' => $_SESSION['id'],
                'imagem' => $img,
                'imagem_legenda' => $imagem_legenda,
                'galeria_id' => $galeria,
                'data' => $data,
                'data_mod' => '',
                'status' => $status,
                'rascunho' => $rascunho
            ];
        endif;
    else:
        $attributes = [
            'titulo' => $titulo,
            'titulo_url' => str_replace($troca, $recebe, $titulo),
            'texto' => $texto,
            'fontes' => $fontes,
            'categoria' => $categoria,
            'categoria_url' => str_replace($troca, $recebe, $categoria),
            'autor' => $_SESSION['id'],
            'imagem' => '',
            'imagem_legenda' => $imagem_legenda,
            'galeria_id' => $galeria,
            'data' => $data,
            'data_mod' => '',
            'status' => $status,
            'rascunho' => $rascunho
        ];
    endif;

    $cadPost = cadastrar("conteudo", $attributes);

    echo $cadPost;

    $retona = LinkPostUpdate . '?id=' . $cadPost;

    if ($cadPost = TRUE):
        $_SESSION['msgUpdate'] = 'Cadastrado Com Sucesso!';
        header('Location: ' . $retona);
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Cadastrar!';
        header('Location: ' . $retona);
    endif;

    exit;
endif;