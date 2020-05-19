<?php

$pagina = Url::getURL(1);
if ($pagina == NULL):
    $pagina = "inicio";
elseif (Url::getURL(2) != NULL):
    $pagina = Url::getURL(2);
endif;

if (file_exists("modulos/admin/" . $pagina . ".php")):
    require_once "modulos/admin/" . $pagina . ".php";
elseif (file_exists("modulos/admin/" . Url::getURL(1) . "/" . $pagina . ".php")):
    require_once "modulos/admin/" . Url::getURL(1) . "/" . $pagina . ".php";
elseif (is_numeric(URL::getURL(2)) == "1"):
    $pagina = Url::getURL(1);
    require_once "modulos/admin/" . Url::getURL(1) . "/" . $pagina . ".php";
else:
    require_once "modulos/404.php";
endif;
?>