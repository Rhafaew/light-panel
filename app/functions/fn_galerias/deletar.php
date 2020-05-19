<?php

if (isset($_GET['del_galeria'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


    $listar = listar('galerias', "WHERE id=" . $id);
    foreach ($listar as $idDel):
        $listar = listar('galerias_fotos', "WHERE id_galeria='" . $idDel->id . "'");
        foreach ($listar as $foto):
            if (isset($foto->foto) and $foto->foto != NULL):
                echo $foto->id . ' | ' . $foto->foto . '<br>';
                unlink(DirGalerias . $foto->foto);
            endif;
            $delFotos = deletar("id", $foto->id, "galerias_fotos");
        endforeach;
    endforeach;

    $delGaleria = deletar("id", $id, "galerias");
    if ($delGaleria = TRUE):
        $_SESSION['msgUpdate'] = 'Galeria Apagada Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Apagar!';
    endif;
    header('Location: ' . LinkGalerias);
    exit;
endif;

if (isset($_GET['del_foto'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $listar = listar('galerias_fotos', "WHERE id='" . $id . "'");
    foreach ($listar as $foto):endforeach;

    $listar = listar('galerias', "where id='" . $foto->id_galeria . "'");
    foreach ($listar as $galeria): endforeach;

    if ($foto->foto != NULL):
        unlink(DirGalerias . $foto->foto);
    endif;

    $delFoto = deletar("id", $id, "galerias_fotos");
    if ($delFoto = TRUE):
        $_SESSION['msgUpdate'] = 'Foto Apagada Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Apagar!';
    endif;
    header('Location: ' . LinkGaleriaFotos . $galeria->titulo_url);
    exit;
endif;

if (isset($_GET['del_mult'])):
    $idGaleria = filter_input(INPUT_GET, 'galeria', FILTER_SANITIZE_NUMBER_INT);
    $apagar = (isset($_POST['del'])) ? $_POST['del'] : isset($_POST['del']);

    $listar = listar('galerias', "where id='" . $idGaleria . "'");
    foreach ($listar as $galeria): endforeach;

    if ($apagar == FALSE):
        $_SESSION['msgUpdate'] = 'Selecione para apagar.';
        header('Location: ' . LinkGaleriaFotos . $galeria->titulo_url);
        exit;
    endif;

    foreach ($apagar as $id):
        $listar = listar('galerias_fotos', "WHERE id='" . $id . "'");
        foreach ($listar as $foto):endforeach;

        if (isset($foto->foto) and $foto->foto != NULL):
            unlink(DirGalerias . $foto->foto);
        endif;
        $delFotos = deletar("id", $id, "galerias_fotos");

    endforeach;

    if ($delFotos == TRUE):
        $_SESSION['msgUpdate'] = 'Fotos Apagadas Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Apagar!';
    endif;
    header('Location: ' . LinkGaleriaFotos . $galeria->titulo_url);
    exit;

endif;