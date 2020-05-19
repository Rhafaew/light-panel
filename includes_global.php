<?php

// CONFIG
require_once 'config.php';

// CONEXÃO
require_once 'app/functions/conexao/conexao.php';

// AUTOLOAD
require_once 'app/class/autoload.php';

// CRUD
require_once 'app/functions/crud/cadastrar.php';
require_once 'app/functions/crud/atualizar.php';
require_once 'app/functions/crud/listar.php';
require_once 'app/functions/crud/deletar.php';

// FUNCTIONS INCLUDES
require_once 'app/functions/includes/inc.bbcode.php';
require_once 'app/functions/includes/inc.caracteres.php';
require_once 'app/functions/includes/inc.clear.nick.php';
require_once 'app/functions/includes/inc.links.php';
require_once 'app/functions/includes/inc.paginacao.php';
require_once 'app/functions/includes/inc.upload_img.php';

// LOGIN
require_once 'app/functions/login/login.php';
require_once 'app/functions/login/logout.php';
require_once 'app/functions/login/validaUrl.php';
