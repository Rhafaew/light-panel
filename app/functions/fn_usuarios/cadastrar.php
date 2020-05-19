<?php

if (isset($_GET['insert'])):
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $nickname = explode('@', $email);
    $ddd = filter_input(INPUT_POST, 'ddd', FILTER_SANITIZE_STRING);
    $tel = filter_input(INPUT_POST, 'fone', FILTER_SANITIZE_STRING);
    $nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_STRING);
    $nivel = ($nivel == NULL) ? '0' : $nivel;

    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $status = ($status == NULL) ? '0' : $status;

    $listaUser = listar('usuarios');
    foreach ($listaUser as $checkUser):


        if (empty(array_filter($_POST))):
            $_SESSION['msgUpdate'] = "Preencha todos os campos";
            header('Location: ' . BaseHost . 'admin/usuarios/cadastrar/');
            exit;
        elseif (!$email):
            $_SESSION['msgUpdate'] = "E-mail invalido!";
            header('Location: ' . BaseHost . 'admin/usuarios/cadastrar/');
            exit;
        else:
            if ($checkUser->email == $email):
                $_SESSION['msgUpdate'] = "Esse E-mail já esta cadastrado!";
                header('Location: ' . BaseHost . 'admin/usuarios/cadastrar/');
                exit;
            elseif ($checkUser->nickname == $nickname):
                $_SESSION['msgUpdate'] = "Esse Nick já esta sendo usado!";
                header('Location: ' . BaseHost . 'admin/usuarios/cadastrar/');
                exit;
            else:

                $randPass = base64_encode(rand(0000, 999)); // Gera uma senha aleatoria de aproximadamente 8 digitos.
                $randPass = explode('=', $randPass); // Limpa senha.
                $senha = md5($randPass[0]); // Criptografa a senha gerada.

                $attributes = [
                    'nome' => $nome,
                    'nickname' => $nickname[0],
                    'senha' => $senha,
                    'sobre' => 'Um pouco bobre mim. Lorem ipsum dolor sit "amet", "consectetur" adipiscing elit. Sed hendrerit libero ac lectus bibendum aliquam.',
                    'data' => "",
                    'foto' => "",
                    'email' => $email,
                    'fone' => $ddd . "-" . $tel,
                    'nivel' => $nivel,
                    'status' => $status
                ];

                $cadCliente = cadastrar("usuarios", $attributes);

                $message = '<div style="background: #eee; padding: 20px;">'; // DIV CONTEINER
                $message .= '<div style="background: #fff; margin: 0 auto; padding: 10px 20px; max-width: 500px; border-radius: 5px; color: #555">'; // CIV BOX
                $message .= '<center><h1 style="color: orange">Cadastro de Usuário</h1></center>'; // TITULO
                $message .= '<h3>Seu cadastro foi realizado.</h3>'; // SUBTITULO
                $message .= '<b style="color: #2962FF">Dados de Acesso</b><br>'; // INFO
                $message .= '<b>Nick/Login:</b> ' . $nickname[0] . '<br>';
                $message .= '<b>Senha:</b> ' . $randPass[0] . '<br>';
                $message .= '<blockquote style="border-left: 4px solid orangered; border-radius: 4px ; padding: 2px 10px; color: orangered">'
                        . '<b>Obs.:</b> Após o primeiro acesso altere a senha para garantir a segurança do seu cadastro.</blockquote>';
                $message .= '</div>';
                $message .= '</div>';
                
                if ($cadCliente = TRUE):
                    // Envia um e-mail para o cadastrado com os dados de acesso.
                    mail($email, "Cadastro de Usuário", $message, "From: " . $_SESSION['email']); 
                    $_SESSION['msgUpdate'] = 'Cadastrado Com Sucesso!';
                else:
                    $_SESSION['msgUpdate'] = 'Erro ao Cadastrar!';
                endif;

                header('Location: ' . BaseHost . 'admin/usuarios/');
                exit;
            endif;

        endif;
    endforeach;
endif;