<?

if (isset($_GET['new_galeria'])):
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'descricao');
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $data = date('d/m/Y H:i:s');

    $attributes = [
        'titulo' => $titulo,
        'titulo_url' => str_replace($troca, $recebe, $titulo),
        'descricao' => $descricao,
        'autor' => $_SESSION['id'],
        'data' => $data,
        'status' => $status
    ];

    $cadGaleria = cadastrar("galerias", $attributes);

    if ($cadGaleria = TRUE):
        $_SESSION['msgUpdate'] = 'Galeria Cadastrada Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Cadastrar!';
    endif;

    header('Location: ' . LinkGalerias);
    exit;
endif;

if (isset($_GET['new_foto'])):
    $galeria = filter_input(INPUT_GET, 'galeria', FILTER_SANITIZE_STRING);
    $data = date('d/m/Y H:i:s');

    $listar = listar('galerias', "where id='" . $galeria . "'");
    foreach ($listar as $gal): endforeach;

    // UPLOAD MULTIPLO DE FOTOS
    $file = isset($_FILES['foto']) ? $_FILES['foto'] : FALSE;

    if ($file == FALSE):
        $_SESSION['msgUpdate'] = 'Erro ao enviar!<br> • Ultrapassou o limite máximo em MB permitido.<br> • Alguma imagem contem erro.<br> • Extenção não suportada.';
        header('Location: ' . LinkGaleriaFotos . $gal->titulo_url);
        exit;
    endif;

    for ($i = 0; $i < count($file['name']); $i++):

        if (isset($file['type'][$i]) and $file['type'][$i] != '' // Se for vazio passa por outra verificação
                and $file['type'][$i] != 'image/JPEG'
                and $file['type'][$i] != 'image/jpeg'
                and $file['type'][$i] != 'image/JPG'
                and $file['type'][$i] != 'image/jpg'
                and $file['type'][$i] != 'image/PNG'
                and $file['type'][$i] != 'image/png'
                and $file['type'][$i] != 'image/GIF'
                and $file['type'][$i] != 'image/gif'
        ):
            $_SESSION['msgUpdate'] = 'Erro ao enviar!<br> • Extenção não suportada!';
            header('Location: ' . LinkGaleriaFotos . $gal->titulo_url);
            exit;
        endif;

        $image = explode('.', $file['name'][$i]);
        $img = md5(uniqid(rand(), TRUE)) . '.' . end($image);
        if (move_uploaded_file($file['tmp_name'][$i], DirGalerias . $img)):
            $attributes = [
                'id_galeria' => $galeria,
                'foto' => $img,
                'descricao' => '',
                'data' => $data
            ];
            $cadGaleria = cadastrar("galerias_fotos", $attributes);
        else:
            $_SESSION['msgUpdate'] = 'Erro ao enviar!<br> • Talves alguma imagem contenha erro.<br> • Extenção não suportada.';
            header('Location: ' . LinkGaleriaFotos . $gal->titulo_url);
            exit;
        endif;
    endfor;

    if ($cadGaleria = TRUE):
        $_SESSION['msgUpdate'] = 'Fotos Enviadas Com Sucesso!';
    else:
        $_SESSION['msgUpdate'] = 'Erro ao Cadastrar!';
    endif;
    header('Location: ' . LinkGaleriaFotos . $gal->titulo_url);
    exit;
endif;
