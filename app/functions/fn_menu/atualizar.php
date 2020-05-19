<?php

if (isset($_GET['update_ordem'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $ordem = filter_input(INPUT_GET, 'update_ordem', FILTER_SANITIZE_STRING);

    $verifica = listar('paginas', "WHERE ordem='" . $ordem . "'");
    $count = count($verifica);
    foreach ($verifica as $pgtroca):endforeach;

    if ($count > 0):

        $Sel = listar('paginas', "WHERE id='" . $id . "'");
        foreach ($Sel as $pag):endforeach;

        $attributes = [
            'ordem' => $pag->ordem
        ];

        $updCliente = atualizar($pgtroca->id, "paginas", $attributes);
    endif;

    $attributes = [
        'ordem' => $ordem
    ];

    $updCliente = atualizar($id, "paginas", $attributes);

    if ($updCliente = TRUE):
        $_SESSION['msgUpdate'] = 'Atualizado Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;

    header('Location: ' . LinkMenu);
    //header("Location: javascript:history.back()");
    exit;
endif;

// ADD PAGINA
if (isset($_GET['add_page'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

    $attributes = [
        'menu' => '1'
    ];

    $updCliente = atualizar($id, "paginas", $attributes);

    if ($updCliente = TRUE):
        $_SESSION['msgUpdate'] = 'Atualizado Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;

    header('Location: ' . LinkMenu);
    //header("Location: javascript:history.back()");
    exit;
endif;

// REMOVER PAGINA
if (isset($_GET['remover_page'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

    $attributes = [
        'menu' => '0',
        'ordem' => '0'
    ];

    $updCliente = atualizar($id, "paginas", $attributes);

    if ($updCliente = TRUE):
        $_SESSION['msgUpdate'] = 'Atualizado Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;

    header('Location: ' . LinkMenu);
    //header("Location: javascript:history.back()");
    exit;
endif;


//////////
// Menu //
//////////

if (isset($_GET['update_menu_ordem'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $pos = filter_input(INPUT_GET, 'update_menu_ordem', FILTER_SANITIZE_STRING);

    $attributes = [
        'ordem_menu' => $pos
    ];
    $menuconf = listar('menu_conf');
    foreach ($menuconf as $menuSel):
        $updCliente = atualizar($menuSel->id, "menu_conf", $attributes);
    endforeach;

    if ($updCliente = TRUE):
        $_SESSION['msgUpdate'] = 'Atualizado Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;

    header('Location: ' . LinkMenuConfig);
    //header("Location: javascript:history.back()");
    exit;
endif;





if (isset($_GET['update_menu_barra'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $pos = filter_input(INPUT_GET, 'update_menu_barra', FILTER_SANITIZE_STRING);

    $attributes = [
        'barra_menu' => $pos
    ];
    $menuconf = listar('menu_conf');
    foreach ($menuconf as $menuSel):
        $updCliente = atualizar($menuSel->id, "menu_conf", $attributes);
    endforeach;

    if ($updCliente = TRUE):
        $_SESSION['msgUpdate'] = 'Atualizado Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;

    header('Location: ' . LinkMenuConfig);
    //header("Location: javascript:history.back()");
    exit;
endif;