<!DOCTYPE html>
<?
require_once './includes_global.php';
require_once './includes_admin.php';
// VALIDA admin.php
if (!isset($_SESSION['nick'])):
    header("Location: " . LinkLogin);
    exit;
endif;
?>
<html lang="pt-br">
    <head>
        <title>Painel Admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../<?= $siteinfo->favicon ?>?<?= time($siteinfo->favicon); ?>">

        <!-- CSS -->
	<? require_once 'assets/inc_assets/inc.global.css.php'; ?>
	<? require_once 'assets/inc_assets/inc.admin.css.php'; ?>
    </head>
    <body class="grey-text text-darken-1">
        <h1 class="hide">Administração</h1>
        <!-- HEADER -->
	<? require_once 'modulos/admin/main/header.php'; ?>
        <!-- MAIN -->
	<? require_once 'modulos/admin/main/main.php'; ?>        
        <!-- FOOTER -->
	<? require_once 'modulos/admin/main/footer.php'; ?>
        <!-- JavaScript -->
	<? require_once 'assets/inc_assets/inc.js.php'; ?>
    </body>
</html>