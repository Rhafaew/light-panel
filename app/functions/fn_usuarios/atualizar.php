<?php

if (isset($_GET['update_perfil'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $nickname = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_STRING);
    $sobre = filter_input(INPUT_POST, 'sobre', FILTER_SANITIZE_STRING);
    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
    //$data = date('Y-d-m', strtotime($data));

    $ddd = filter_input(INPUT_POST, 'ddd', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $tel = filter_input(INPUT_POST, 'fone', FILTER_SANITIZE_STRING);

    $img = filter_input(INPUT_POST, 'foto', FILTER_SANITIZE_STRING);
    $enviar_img = filter_input(INPUT_POST, 'enviar_img', FILTER_SANITIZE_STRING);

    if (empty(array_filter($_POST))):
        $msg = "Preencha todos os campos";
    elseif (!$email):
        $msg = "E-mail invalido!";
    else:

        $listar = listar('usuarios', "WHERE id=" . $id);
        foreach ($listar as $user):endforeach;

        if ($enviar_img == "sim"):
            if (isset($_FILES['foto']['type'])
                    and $_FILES['foto']['type'] != 'image/JPEG'
                    and $_FILES['foto']['type'] != 'image/jpeg'
                    and $_FILES['foto']['type'] != 'image/JPG'
                    and $_FILES['foto']['type'] != 'image/jpg'
                    and $_FILES['foto']['type'] != 'image/PNG'
                    and $_FILES['foto']['type'] != 'image/png'
                    and $_FILES['foto']['type'] != 'image/GIF'
                    and $_FILES['foto']['type'] != 'image/gif'
            ):
                echo "<h4>Formato invalido!</h4>
                    <p>A imagem deve ser <b>jpeg</b>, <b>jpg</b>, <b>png</b> ou <b>gif</b>.</p>
                    <p><b>Obs:</b> Se a imagem corresponde aos formatos acima é possível que a imagem contenha algum erro!</p>
                    <p>Tente enviar outra imagem.</p>";
            else:

                if ($user->foto != NULL):
                    unlink(DirFoto . $user->foto);
                endif;

                $img = upload_img(DirFoto, $_FILES['foto']['name'], $_FILES['foto']['tmp_name']);

                $attributes = [
                    'nome' => $nome,
                    'nickname' => $nickname,
                    'sobre' => $sobre,
                    'data' => $data,
                    'foto' => $img,
                    'email' => $email,
                    'fone' => $ddd . "-" . $tel
                ];

            endif;
        else:
            if ($enviar_img == "del"):
                if (file_exists(DirFoto . $user->foto)):
                    unlink(DirFoto . $user->foto);
                    $img = '';
                else:
                    $img = '';
                endif;
            else:
                $img = $user->foto;
            endif;

            $attributes = [
                'nome' => $nome,
                'nickname' => $nickname,
                'sobre' => $sobre,
                'data' => $data,
                'foto' => $img,
                'email' => $email,
                'fone' => $ddd . "-" . $tel
            ];

        endif;

        $updCliente = atualizar($id, "usuarios", $attributes);
        header('Location: ' . BaseHost . 'admin/usuarios/perfil/');

    endif;
endif;

if (isset($_GET['update_pass'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $atual = md5(filter_input(INPUT_POST, 'atual', FILTER_SANITIZE_STRING));
    $nova = md5(filter_input(INPUT_POST, 'nova', FILTER_SANITIZE_STRING));
    $cofirma = md5(filter_input(INPUT_POST, 'cofirma', FILTER_SANITIZE_STRING));

    $listar = listar("usuarios", "where id='" . $id . "'");
    foreach ($listar as $user):endforeach;

    if ($atual == $user->senha): // Verifica se a senha atual esta correta
        if ($nova == $cofirma): // Confirma a nova senha
            $attributes = [
                'senha' => $nova
            ];
            $updCliente = atualizar($id, "usuarios", $attributes);
            if ($updCliente = TRUE):
                $_SESSION['msgUpdate'] = 'Senha atualizada com sucesso!';
            else:
                $_SESSION['msgUpdate'] = 'Erro ao atualizar a senha!';
            endif;
            header('Location: ' . BaseHost . 'admin/usuarios/perfil/');
            exit;
        else:
            $_SESSION['msgUpdate'] = 'A confirmação não corresponde com a senha que você digitou!';
            header('Location: ' . BaseHost . 'admin/usuarios/perfil/');
            exit; // Inclua um 'exit;' no final para toast 'msgUpdate' aparecer
        endif;
    else:
        $_SESSION['msgUpdate'] = 'A senha atual esta incorreta!';
        header('Location: ' . BaseHost . 'admin/usuarios/perfil/');
        exit; // Inclua um 'exit;' no final para toast 'msgUpdate' aparecer
    endif;

endif;

if (isset($_GET['update_user_status'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

    $listar = listar("usuarios", "where id='" . $id . "'");
    foreach ($listar as $user):endforeach;

    if ($user->status == '0'):
        $status = '1';
        $statusMSG = 'Ativo';
    else:
        $status = '0';
        $statusMSG = 'Inativo';
    endif;
    $attributes = [
        'status' => $status
    ];
    $updCliente = atualizar($id, "usuarios", $attributes);
    $_SESSION['msgUpdate'] = 'Status alterado para "' . $statusMSG . '".';
    header('Location: ' . BaseHost . 'admin/usuarios/');
    exit;
endif;

if (isset($_GET['update_nivel'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_STRING);

    if ($nivel == '1'):
        $nivelMSG = 'Administrador';
    else:
        $nivelMSG = 'Usuário';
    endif;
    $attributes = [
        'nivel' => $nivel
    ];
    $updCliente = atualizar($id, "usuarios", $attributes);
    $_SESSION['msgUpdate'] = 'Nivel de acesso foi alterado para "' . $nivelMSG . '".';
    header('Location: ' . BaseHost . 'admin/usuarios/');
    exit;
endif;