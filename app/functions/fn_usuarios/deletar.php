<?php

if (isset($_GET['del_user'])):

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $listar = listar('usuarios', "WHERE id=" . $id);
    foreach ($listar as $user):endforeach;
    if ($user->foto != NULL):
        unlink(DirFoto . $user->foto);
    endif;

    $regExcluido = deletar("id", $id, "usuarios");

    if ($regExcluido = TRUE):
        $_SESSION['msgUpdate'] = 'Usuário excluido!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao excluir usuário!';
    endif;

    header('Location: ' . BaseHost . 'admin/usuarios/');
    exit;
endif;