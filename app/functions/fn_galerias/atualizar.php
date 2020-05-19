<?php

if (isset($_GET['update_galeria'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $attributes = [
        'titulo' => $titulo,
        'titulo_url' => str_replace($troca, $recebe, $titulo),
        'descricao' => $descricao,
        'status' => $status
    ];
    $updGaleria = atualizar($id, "galerias", $attributes);
    if ($updGaleria = TRUE):
        $_SESSION['msgUpdate'] = 'Atualizado Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;
    header('Location: ' . LinkGaleriaUpdate . '?id=' . $id);
    exit;
endif;

if (isset($_GET['update_foto'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $galeria = filter_input(INPUT_POST, 'galeria', FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $limitChar = filter_input(INPUT_POST, 'liminte', FILTER_SANITIZE_SPECIAL_CHARS);

    $attributes = [
        'descricao' => $descricao
    ];

    $listar = listar('galerias', "where id='" . $galeria . "'");
    foreach ($listar as $galeria): endforeach;

    if (strlen(utf8_decode($descricao)) > $limitChar):
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
        header('Location: ' . LinkGaleriaFotos . $galeria->titulo_url);
        exit;
    else:
        $updFoto = atualizar($id, "galerias_fotos", $attributes);
        if ($updFoto = TRUE):
            $_SESSION['msgUpdate'] = 'Atualizado Com Sucesso!';
        else:
            $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
        endif;
        header('Location: ' . LinkGaleriaFotos . $galeria->titulo_url);
        exit;
    endif;
endif;

// STATUS UPDADTE
if (isset($_GET['update_galeria_status'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

    $listar = listar("galerias", "where id='" . $id . "'");
    foreach ($listar as $galeria):endforeach;

    if ($galeria->status == '0'):
        $status = '1';
        $statusMSG = 'Visivel';
    else:
        $status = '0';
        $statusMSG = 'Oculto';
    endif;
    $attributes = [
        'status' => $status
    ];
    $updGaleria = atualizar($id, "galerias", $attributes);
    $_SESSION['msgUpdate'] = 'Status alterado para "' . $statusMSG . '".';
    header('Location: ' . BaseHost . 'admin/galerias/');
    exit;
endif;
