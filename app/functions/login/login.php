<?php

if (isset($_POST['logar'])):

    unset($_SESSION['campoVazio']);
    unset($_SESSION['erroLogin']);

    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));

    if ($login == NULL):
        $_SESSION['campoVazio'] = '<center>O campo <b>Login</b> deve ser preenchido!</center>';
        header("Location: " . LinkLogin);
        exit;
    elseif ($senha == NULL):
        $_SESSION['campoVazio'] = '<center>O campo <b>Senha</b> deve ser preenchido!</center>';
        header("Location: " . LinkLogin);
        exit;
    else:

        $listar = listar("usuarios", "where nickname='" . $login . "' and senha='" . $senha . "'");
        $count = count($listar);
        foreach ($listar as $logar):endforeach;

        if ($count == 0):
            $_SESSION['erroLogin'] = '<i class="material-icons left">error</i> Login ou Senha invalido!</center>';
            header("Location: " . LinkLogin);
            exit;
        else:
            $_SESSION['id'] = $logar->id;
            $_SESSION['nome'] = $logar->nome;
            $_SESSION['nick'] = $logar->nickname;
            $_SESSION['email'] = $logar->email;
            $_SESSION['nivel'] = $logar->nivel;
            header("Location: " . LinkAdmin);
            exit;
        endif;

    endif;
endif;