<header >
    <!-- style="background: url('<?= BaseHost ?>assets/upload/imagens/99e635e22986f17792d42a47434b2335.jpg') center 85% no-repeat"-->
    <h1 class="hide">Header</h1>

    <?= navMenuMobile() ?>

    <?
    $menuconf = listar('menu_conf');
    foreach ($menuconf as $menuSel):

        $menuOrdem = ($menuSel->ordem_menu == '0') ? navMenu() : '';
        ?>
    <? endforeach; ?>
    <section class="container">
        <h1 class="hide">Header Countent</h1>
        <br>
        <div class="row flow-text center-align">
            <section class="col s12 l4">
                <h1 class="hide">Logo</h1>
                <img src="<?= BaseHost ?>assets/img/logo.png" class="responsive-img"/>
            </section>

            <section class="col s12 l8">
                <h1 class="hide">Publicidade</h1>
                <img src="<?= BaseHost ?>assets/img/banner.png" class="responsive-img"/>
            </section>
        </div>
    </section>

    <?
    $menuconf = listar('menu_conf');
    foreach ($menuconf as $menuSel):

        $menuOrdem = ($menuSel->ordem_menu == '1') ? navMenu() : '';
        ?>
    <? endforeach; ?>

</header>