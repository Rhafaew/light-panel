<?php

if (isset($_GET['update_info'])):
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $tag = filter_input(INPUT_POST, 'tag', FILTER_SANITIZE_STRING);

    $attributes = [
        'titulo' => $titulo,
        'url' => $url,
        'description' => $descricao,
        'keywords' => $tag
    ];

    $updSiteInfo = atualizar("1", "site_info", $attributes);

    if ($updCliente = TRUE):
        $_SESSION['msgUpdate'] = 'Atualizado Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Atualizar!';
    endif;

    header('Location: ' . LinkSiteInfo);
    exit;
endif;

if (isset($_GET['update_favicon'])):

    $img = filter_input(INPUT_POST, 'favicon', FILTER_SANITIZE_STRING);
    $enviar_img = filter_input(INPUT_POST, 'enviar_img', FILTER_SANITIZE_STRING);


    if (isset($_FILES['favicon']['type'])
            and $_FILES['favicon']['type'] != 'image/ICO'
            and $_FILES['favicon']['type'] != 'image/ico'
            and $_FILES['favicon']['type'] != 'image/PNG'
            and $_FILES['favicon']['type'] != 'image/png'
            and $_FILES['favicon']['type'] != 'image/GIF'
            and $_FILES['favicon']['type'] != 'image/gif'
    ):
        echo "<h4>Formato invalido!</h4>
                    <p>O icone deve ser <b>.png</b> ou <b>.gif</b>.</p>
                    <p><b>Obs:</b> a extenção <b>.ico</b> não tem suporte para envio no momento </p>
                    <p><b>Obs:</b> Se a imagem corresponde aos formatos acima é possível que a imagem contenha algum erro!</p>
                    <p>Tente enviar outra imagem.</p>";
    else:

        $img = upload_favicon('./', $_FILES['favicon']['name'], $_FILES['favicon']['tmp_name']);

        $attributes = [
            'favicon' => $img,
        ];

    endif;

    $updCliente = atualizar('1', "site_info", $attributes);

    $_SESSION['msgUpdate'] = 'Favicon alterado.';
    header('Location: ' . BaseHost . 'admin/site_info/');
    exit;
    
endif;