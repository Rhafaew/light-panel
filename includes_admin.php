<?php

// FN USUARIOS
require_once 'app/functions/fn_usuarios/deletar.php';
require_once 'app/functions/fn_usuarios/cadastrar.php';
require_once 'app/functions/fn_usuarios/atualizar.php';

// FN POSTAGENS
require_once 'app/functions/fn_postagens/deletar.php';
require_once 'app/functions/fn_postagens/cadastrar.php';
require_once 'app/functions/fn_postagens/atualizar.php';

// FN CATEGORIAS
require_once 'app/functions/fn_categorias/deletar.php';
require_once 'app/functions/fn_categorias/cadastrar.php';
require_once 'app/functions/fn_categorias/atualizar.php';

// FN PAGINAS
require_once 'app/functions/fn_paginas/deletar.php';
require_once 'app/functions/fn_paginas/cadastrar.php';
require_once 'app/functions/fn_paginas/atualizar.php';

// FN PAGINAS
require_once 'app/functions/fn_galerias/deletar.php';
require_once 'app/functions/fn_galerias/cadastrar.php';
require_once 'app/functions/fn_galerias/atualizar.php';

// FN BLOCOS
require_once 'app/functions/fn_blocos/deletar.php';
require_once 'app/functions/fn_blocos/cadastrar.php';
require_once 'app/functions/fn_blocos/atualizar.php';

// FN MENU
require_once 'app/functions/fn_menu/atualizar.php';

// FN LAYOUT
require_once 'app/functions/fn_layout/atualizar.php';

// FN SLIDER
require_once 'app/functions/fn_slider/deletar.php';
require_once 'app/functions/fn_slider/cadastrar.php';

// FN SLIDER
require_once 'app/functions/fn_site_info/atualizar.php';

$listar = listar("site_info");
foreach ($listar as $siteinfo): endforeach;

// FN SLIDER
require_once 'app/functions/fn_footer/atualizar.php';