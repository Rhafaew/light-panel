<?php

// NAV
require_once 'modulos/client/main/nav.php';

// ASIDE
require_once 'modulos/client/main/aside.php';

// CONFIG SITE INFO

$listar = listar("site_info");
foreach ($listar as $siteinfo): endforeach;
