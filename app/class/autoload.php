<?php

function __autoload($class) {
    if (file_exists('app/class/' . $class . '.class.php')):
        require_once 'app/class/' . $class . '.class.php';
    else:
        echo utf8_decode('<center><h2>Classe não encontrada!</h2></center>');
    endif;
}
