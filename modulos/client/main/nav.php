<?php

// RETORNA OS INTENS DO MENU
function menuPage() {
    $subIcon = NULL;
    $listar = listar('paginas', "WHERE menu='1' and status='1' and ordem>0 ORDER BY ordem ASC");
    foreach ($listar as $menu):

        $linkMenu = ($menu->first == 1) ? BaseHost : BaseHost . $menu->nome_url;

        if (url::getURL(0) == NULL):
            $listar = listar('paginas', "WHERE first='1'");
            foreach ($listar as $menuSell): endforeach;
            $urlAtive = $menuSell->nome_url;
        else:
            $urlAtive = url::getURL(0);
        endif;
        $active = ($urlAtive == $menu->nome_url) ? 'active' : '';
        ?>
        <li class="<?= $active ?>"><a title="<?= $menu->nome ?>" href="<?= $linkMenu ?>" target=""><?= $menu->nome ?></a></li>
        <?
    endforeach;
}

// ESTRUTURA DO MENU - CONF. APARENCIA, TAMANHO E COR
function navMenu() { // Não apagar essta linha.
    $menuconf = listar('menu_conf');
    foreach ($menuconf as $menuSel):
        if ($menuSel->barra_menu == '0'):
            $class1 = 'container';
            $class2 = '';
        else:
            $class1 = '';
            $class2 = 'container';
        endif;
    endforeach;
    ?>

    <nav class="blue hide-on-med-and-down <?= $class1 ?>">
        <h1 class="hide">Menu Horizontal</h1>

        <div class="nav-wrapper <?= $class2 ?>">
            <ul id="nav-mobile" class="hide-on-med-and-down">
                <?= menuPage() ?>
            </ul>
        </div>
    </nav>
    <?
}

// ESTRUTURA DO MENU MOBILE - CONF. APARENCIA, TAMANHO E COR
function navMenuMobile() { // Não apagar essta linha.
    ?>

    <div class="navbar-fixed hide-on-large-only">
        <nav class="blue">
            <h1 class="hide">Menu Mobile</h1>
            <a href="#" data-activates="slide-out" class="menu-front brand-logo center"><i class="material-icons">menu</i></a>
        </nav>
    </div>

    <ul id="slide-out" class="side-nav">
        <li>
            <div class="userView" style="height: 150px">
                <div class="background">
                    <img class="responsive-img" src="assets/img/background2.jpg">
                </div>
            </div>
        </li>
        <?= menuPage() ?>
    </ul>

<? } ?>