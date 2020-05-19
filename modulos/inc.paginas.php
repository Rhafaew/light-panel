<?php

$pagina = Url::getURL(0);
if ($pagina == NULL):

    $listar = listar('paginas', "WHERE first='1'");
    foreach ($listar as $pgn):endforeach;
    $pagina = $pgn->nome_url;

elseif ($pagina == 'view'):
    $pagina = "view";
else:
    $pagina = URL::getURL(0);
endif;

// PAGINAS
$listar = listar('paginas', "WHERE nome_url='" . $pagina . "' and status = '1' ");
foreach ($listar as $pgn):endforeach;

// CONTEUDO
$listar = listar('conteudo', "WHERE titulo_url='" . $pagina . "' and status='1'");
foreach ($listar as $pst):endforeach;

if ($pagina == 'admin'):
    require_once "modulos/admin/adm.paginas.php"; // CORRESPONDE AO ADMIN *NÃO ALTERAR ESSA LINHA

elseif (isset($pgn->post) and $pgn->post == 1):
    require_once "modulos/client/content.php";

elseif (isset($pgn->post) and $pgn->categ == 1):
    require_once "modulos/client/categoria.php";

elseif (isset($pgn->nome_url) and $pagina == $pgn->nome_url):
    require_once "modulos/client/paginas.php";

elseif (isset($pst->titulo_url) and $pagina == $pst->titulo_url):
    require_once "modulos/client/single.php";

elseif (file_exists("modulos/client/" . $pagina . ".php")):
    require_once "modulos/client/" . $pagina . ".php";

else:
    require_once "modulos/404.php";
endif;
?>

