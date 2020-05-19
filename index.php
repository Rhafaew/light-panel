<!DOCTYPE html>
<? require_once './includes_global.php'; ?>
<? require_once './includes_client.php'; ?>

<html lang="pt-br">
    <head>
        <title><?= $siteinfo->titulo ?></title>
        <meta charset="utf-8">
        <meta name="description" content="<?= $siteinfo->description ?>">
        <meta name="keywords" content="<?= $siteinfo->keywords ?>">
        <meta name="author" content="Rhafaew Andrade">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?= $siteinfo->favicon ?>?<?= time($siteinfo->favicon);?>">

        <!-- CSS -->
        <? require_once 'assets/inc_assets/inc.global.css.php'; ?>
        <? require_once 'assets/inc_assets/inc.front.css.php'; ?>
    </head>

    <body>
        <h1 class="hide"><?= $siteinfo->titulo ?></h1>
        <!-- HEADER -->
        <? require_once 'modulos/client/main/header.php'; ?>

        <!-- MAIN -->
        <? require_once 'modulos/client/main/main.php'; ?>

        <!-- FOOTER -->
        <? require_once 'modulos/client/main/footer.php'; ?>

        <!-- JavaScript -->
        <? require_once 'assets/inc_assets/inc.js.php'; ?>
    </body>
</html>