<?php

// URL - HOST NAME
//$_SERVER['HTTP_REFERER']; // Retorna a URL completa

$listar = listar("site_info");
foreach ($listar as $siteinfo): endforeach;

$protocol = explode('/', strtolower($_SERVER['SERVER_PROTOCOL']));
$autoUrl = $protocol[0] . '://' . $_SERVER['HTTP_HOST'];

$url = ($siteinfo->url == NULL) ? $autoUrl . '/' : $siteinfo->url . '/';

//$protocol[0] . $_SERVER['HTTP_HOST'];
define('BaseHost', $url);
define('URLreturn', $autoUrl . $_SERVER['REQUEST_URI'] ); // FAZER AUTORETORNO POS LOGUIN...

// DIRETORIO DAS IMAGENS
define('DirIMG', 'assets/upload/imagens/');
define('DirFoto', 'assets/upload/fotos/');
define('DirGalerias', 'assets/upload/galerias/');
define('DirImage', 'assets/img/');

// LINKS CSS and JS
define('LinkCSS', BaseHost . 'assets/css/');
define('LinkJS', BaseHost . 'assets/js/');

// LINKS LOGIN
define('LinkAdmin', BaseHost . 'admin/');
define('LinkLogin', BaseHost . 'login/');

// LINKS BACKUP
define('LinkBackup', BaseHost . 'admin/backup/');
define('LinkNewBackup', BaseHost . 'admin/backup/?new_backup');

// LINKS USUARIOS
define('LinkPerfil', BaseHost . 'admin/usuarios/perfil/');
define('LinkUsuarios', BaseHost . 'admin/usuarios/');
define('LinkUserNew', BaseHost . 'admin/usuarios/cadastrar/');
define('LinkUserUpdate', BaseHost . 'admin/usuarios/atualizar/');

// LINKS POSTAGENS
define('LinkPostagens', BaseHost . 'admin/postagens/');
define('LinkPostCategoria', BaseHost . 'admin/postagens/categorias/');
define('LinkPostNew', BaseHost . 'admin/postagens/cadastrar/');
define('LinkPostUpdate', BaseHost . 'admin/postagens/atualizar/');
define('LinkPostRascunhos', BaseHost . 'admin/postagens/rascunhos/');

// LINKS PAGINAS
define('LinkPaginas', BaseHost . 'admin/paginas/');
define('LinkPaginaNew', BaseHost . 'admin/paginas/cadastrar/');
define('LinkPaginaUpdate', BaseHost . 'admin/paginas/atualizar/');

// LINKS GALERIAS
define('LinkGalerias', BaseHost . 'admin/galerias/');
define('LinkGaleriaNew', BaseHost . 'admin/galerias/cadastrar/');
define('LinkGaleriaUpdate', BaseHost . 'admin/galerias/atualizar/');
define('LinkGaleriaFotos', BaseHost . 'admin/galerias/fotos/');

// CONFIGURAÇÕES //
//
// LINKS MENU
define('LinkMenu', BaseHost . 'admin/menu/');
define('LinkMenuConfig', BaseHost . 'admin/menu/config/');

// LINKS LEITURA
define('LinkLayout', BaseHost . 'admin/layout/');
define('LinkSiteInfo', BaseHost . 'admin/site_info/');

// LINKS WIDGET's
define('LinkHeader', BaseHost . 'admin/header/');

// LINKS FOOTER
define('LinkFooter', BaseHost . 'admin/footer/');

define('LinkWidBanners', BaseHost . 'admin/banners/');
define('LinkWidBlocos', BaseHost . 'admin/blocos/');

define('LinkSlider', BaseHost . 'admin/slider/');
define('LinkSliderNew', BaseHost . 'admin/slider/cadastrar/');
define('LinkSliderUpdate', BaseHost . 'admin/slider/atualizar/');
