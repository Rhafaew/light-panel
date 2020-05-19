<?php

// ENVIA FOTOS E IMAGENS
function upload_img($dir, $file_name, $file_tmp) {
    if ($file_name != NULL):
        $image = explode('.', $file_name);
        $img = md5(uniqid(rand(), TRUE)) . '.' . end($image);
    endif;
    if (file_exists("$dir $img")):
        $i = 1;
        while (file_exists("$dir($i)$img")):
            $i++;
        endwhile;
        $img = "(" . $i . ")" . $img;
    endif;
    move_uploaded_file($file_tmp, $dir . $img);
    return $img;
}

// ALTERA O ICONE DO SITE
function upload_favicon($dir, $file_name, $file_tmp) {
    if ($file_name != NULL):
        $image = explode('.', $file_name);
        $img = 'favicon' . '.' . end($image);
    endif;
    if (file_exists("favicon.png")):
        unlink($dir . 'favicon.png');
    elseif (file_exists("favicon.ico")):
        unlink($dir . 'favicon.ico');
    elseif (file_exists("favicon.gif")):
        unlink($dir . 'favicon.gif');
    endif;
    move_uploaded_file($file_tmp, $dir . $img);
    return $img;
}
