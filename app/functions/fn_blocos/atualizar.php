<?php

if (isset($_GET['update_bloco'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_SPECIAL_CHARS);
    $conteudo = ($conteudo == NULL) ? '' : $conteudo;

    $imagem = filter_input(INPUT_POST, 'img', FILTER_SANITIZE_STRING);



    if ($imagem != NULL):

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
                'conteudo' => $conteudo,
                'imagem' => $imagem
            ];

        endif;
        echo '<h1>WHAAaaaaaT?</h1>';
        exit;
    else:
        $attributes = [
            'nome' => $nome,
            'conteudo' => $conteudo,
            'imagem' => $imagem
        ];
    endif;











    $updBloco = atualizar($id, "blocos", $attributes);

    if ($updBloco = TRUE):
        $_SESSION['msgUpdate'] = 'Atualizado com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;
    header('Location: ' . LinkWidBlocos);
    exit;
endif;

if (isset($_GET['update_bloco_lado'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

    $listar = listar('blocos', "where id='" . $id . "'");
    foreach ($listar as $bloco):endforeach;

    $lado = ($bloco->lado == 0) ? '1' : '0';
    $msgStatus = ($lado == 0) ? 'Alterado para Esquerda!' : 'Alterado para Direita!';

    $attributes = [
        'lado' => $lado,
        'ordem' => '0'
    ];

    $updStatus = atualizar($id, "blocos", $attributes);

    if ($updStatus = TRUE):
        $_SESSION['msgUpdate'] = $msgStatus;
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;
    header('Location: ' . LinkWidBlocos);
    exit;
endif;

if (isset($_GET['update_bloco_status'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

    $listar = listar('blocos', "where id='" . $id . "'");
    foreach ($listar as $bloco):endforeach;

    $status = ($bloco->status == 0) ? '1' : '0';
    $msgStatus = ($status == 0) ? 'Desativado' : 'Ativado';

    $attributes = [
        'status' => $status
    ];

    $updStatus = atualizar($id, "blocos", $attributes);

    if ($updStatus = TRUE):
        $_SESSION['msgUpdate'] = $msgStatus . '!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;
    header('Location: ' . LinkWidBlocos);
    exit;
endif;

if (isset($_GET['update_bloco_ordem'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $ordem = filter_input(INPUT_GET, 'update_bloco_ordem', FILTER_SANITIZE_STRING);
    $lado = filter_input(INPUT_GET, 'lado', FILTER_SANITIZE_STRING);

    $verifica = listar('blocos', "WHERE lado='" . $lado . "' and ordem='" . $ordem . "'");
    $count = count($verifica);
    foreach ($verifica as $blocTroca):endforeach;

    if ($count != 0):
        $Sel = listar('blocos', "WHERE id='" . $id . "'");
        foreach ($Sel as $pag):endforeach;

        $attributes = [
            'ordem' => $pag->ordem
        ];
        $updCliente = atualizar($blocTroca->id, "blocos", $attributes);
    endif;

    $attributes = [
        'ordem' => $ordem
    ];
    $updOrdem = atualizar($id, "blocos", $attributes);

    if ($updOrdem = TRUE):
        $_SESSION['msgUpdate'] = 'Alterado Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;
    header('Location: ' . LinkWidBlocos);
    exit;
endif;

if (isset($_GET['update_bloco_nome_view'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

    $listar = listar('blocos', "where id='" . $id . "'");
    foreach ($listar as $bloco):endforeach;

    $view = ($bloco->nome_view == 0) ? '1' : '0';
    $msgView = ($view == 0) ? 'Titulo Oculto' : 'Titulo Visivel';

    $attributes = [
        'nome_view' => $view
    ];

    $updNomeView = atualizar($id, "blocos", $attributes);

    if ($updNomeView = TRUE):
        $_SESSION['msgUpdate'] = $msgView;
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;
    header('Location: ' . LinkWidBlocos);
    exit;
endif;