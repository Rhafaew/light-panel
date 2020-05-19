<style>
    .collection-item.active{ background: orangered !important; }
    .catMenu { margin-top: -5px !important}
    .catMenu li{ margin: 10px 0 !important}
    .catMenu li ul{margin-left: 10px !important}
    .bloco p{ margin: 0 0 15px 0;}
</style>
<?

function categLooping($cat_pai = 0, $nivel = 0) {
    $catReturn = "";
    $listar = listar("categorias", "WHERE parente='" . $cat_pai . "' ORDER BY nome ASC");
    foreach ($listar as $cat):


        $listar = listar("paginas", "WHERE categ='1'");
        foreach ($listar as $pgCat):endforeach;

        $listIcon = ($cat->parente > 0) ? '<i class="material-icons tiny left orange-text">folder</i>' :
                '<i class="material-icons tiny left orange-text">folder_open</i>';
        $catReturn .= '<li>' . $listIcon;
        $catReturn .= '<a href="' . BaseHost . $pgCat->nome_url . '/' . $cat->nome_url . '">' . $cat->nome . '</a>';
        $catReturn .= '<ul>' . categLooping($cat->id, $nivel + 1) . '</ul>';
        $catReturn .= '</li>';
    endforeach;
    return $catReturn;
}

function pageLooping($cat_pai = 0, $nivel = 0) {
    $catReturn = "";
    $listar = listar("paginas", "WHERE parente='" . $cat_pai . "' ORDER BY nome ASC");
    foreach ($listar as $cat):


        $listar = listar("paginas", "WHERE categ='1'");
        foreach ($listar as $pgCat):endforeach;

        $listIcon = ($cat->parente > 0) ? '<i class="material-icons tiny left orange-text">folder</i>' :
                '<i class="material-icons tiny left orange-text">folder_open</i>';
        $catReturn .= '<li>' . $listIcon;
        $catReturn .= '<a href="' . BaseHost . $cat->nome_url . '">' . $cat->nome . '</a>';
        $catReturn .= '<ul>' . pageLooping($cat->id, $nivel + 2) . '</ul>';
        $catReturn .= '</li>';
    endforeach;
    return $catReturn;
}

function subLooping() {
    $subReturn = "";
    $listar = listar("paginas", "WHERE nome_url='" . Url::getURL(0) . "'");
    foreach ($listar as $subPg):

        $listar = listar("paginas", "WHERE parente='" . $subPg->id . "'");
        if ($listar != NULL):
            foreach ($listar as $pagSb):

                $listIcon = '<i class="material-icons tiny left orange-text">folder</i>';
                $subReturn .= '<li>' . $listIcon;
                $subReturn .= '<a href="' . BaseHost . $pagSb->nome_url . '">' . $pagSb->nome . '</a>';
                $subReturn .= '</li>';
            endforeach;
        else:
        endif;
    endforeach;
    return $subReturn;
}

function asideA() {
    ?>

    <!-- BARRA LATERAL (Vai para Themes) -->
    <aside class="col s12 m12 l3">
        <h1 class="hide">Lateral</h1>
        <div class="row">

            <?
            $listar = listar('blocos', "WHERE status='1' and lado='0' order by ordem ASC");
            foreach ($listar as $blocos):
                ?>
                <section class="col s12 m6 l12">
                    <? if ($blocos->tipo == 'cat'): ?>

                        <? if ($blocos->nome_view == 1): ?>
                            <div class="divider"></div>
                            <h6 class="flow-text"><?= $blocos->nome ?></h6>
                        <? else: ?>
                            <h6 class="hide"><?= $blocos->nome ?></h6>
                        <? endif; ?>
                        <ul class="catMenu"><?= categLooping(); ?></ul>

                    <? elseif ($blocos->tipo == 'pag'): ?>

                        <? if ($blocos->nome_view == 1): ?>
                            <div class="divider"></div>
                            <h6 class="flow-text"><?= $blocos->nome ?></h6>
                        <? else: ?>
                            <h6 class="hide"><?= $blocos->nome ?></h6>
                        <? endif; ?>
                        <ul class="catMenu"><?= pageLooping(); ?></ul>

                    <? elseif ($blocos->tipo == 'sub'): ?>

                        <? if ($blocos->nome_view == 1): ?>
                            <div class="divider"></div>
                            <h6 class="flow-text"><?= $blocos->nome ?></h6>
                        <? else: ?>
                            <h6 class="hide"><?= $blocos->nome ?></h6>
                        <? endif; ?>
                        <ul class="catMenu"><?= subLooping(); ?></ul>

                    <? else: ?>

                        <? if ($blocos->nome_view == 1): ?>
                            <div class="divider"></div>
                            <h6 class="flow-text"><?= $blocos->nome ?></h6>
                        <? else: ?>
                            <h6 class="hide"><?= $blocos->nome ?></h6>
                        <? endif; ?>
                        <span class="bloco"><?= html_entity_decode($blocos->conteudo, ENT_QUOTES) ?></span>
                    <? endif; ?>

                </section>
            <? endforeach; ?>

        </div>
    </aside>
    <?
}

function asideB() {
    ?>

    <!-- BARRA LATERAL -->
    <aside class="col s12 m12 l3">
        <h1 class="hide">Lateral</h1>
        <div class="row">

            <?
            $listar = listar('blocos', "WHERE status='1' and lado='1' order by ordem ASC");
            foreach ($listar as $blocos):
                ?>
                <section class="col s12 m6 l12">
                    <? if ($blocos->tipo == 'cat'): ?>

                        <? if ($blocos->nome_view == 1): ?>
                            <div class="divider"></div>
                            <h6 class="flow-text"><?= $blocos->nome ?></h6>
                        <? else: ?>
                            <h6 class="hide"><?= $blocos->nome ?></h6>
                        <? endif; ?>
                        <ul class="catMenu"><?= categLooping(); ?></ul>

                    <? elseif ($blocos->tipo == 'pag'): ?>

                        <? if ($blocos->nome_view == 1): ?>
                            <div class="divider"></div>
                            <h6 class="flow-text"><?= $blocos->nome ?></h6>
                        <? else: ?>
                            <h6 class="hide"><?= $blocos->nome ?></h6>
                        <? endif; ?>
                        <ul class="catMenu"><?= pageLooping(); ?></ul>

                    <? elseif ($blocos->tipo == 'sub'): ?>

                        <? if ($blocos->nome_view == 1): ?>
                            <div class="divider"></div>
                            <h6 class="flow-text"><?= $blocos->nome ?></h6>
                        <? else: ?>
                            <h6 class="hide"><?= $blocos->nome ?></h6>
                        <? endif; ?>
                        <ul class="catMenu"><?= subLooping(); ?></ul>

                    <? else: ?>

                        <? if ($blocos->nome_view == 1): ?>
                            <div class="divider"></div>
                            <h6 class="flow-text"><?= $blocos->nome ?></h6>
                        <? else: ?>
                            <h6 class="hide"><?= $blocos->nome ?></h6>
                        <? endif; ?>
                        <span class="bloco"><?= html_entity_decode($blocos->conteudo, ENT_QUOTES) ?></span>
                    <? endif; ?>

                </section>
            <? endforeach; ?>

        </div>
    </aside>

    <?
}

// USANDO O ASIDE

if (url::getURL(0) == NULL):
    $listar = listar("paginas", "WHERE first='1'");
    foreach ($listar as $pgurl):endforeach;
    $colPg = $pgurl->nome_url;
else:
    $colPg = url::getURL(0);
endif;

$listar = listar('paginas', "WHERE nome_url='" . $colPg . "'");
foreach ($listar as $colExibe):endforeach;

if (!isset($colExibe->col_custon) or $colExibe->col_custon == 0):
    $listar = listar('layout');
    foreach ($listar as $col):endforeach;
else:
    $listar = listar('paginas', "WHERE nome_url='" . $colPg . "'");
    foreach ($listar as $col):endforeach;
endif;

if ($col->col_a == 0 and $col->col_b == 0):
    $colCenter = 'l12';
elseif ($col->col_a == 1 and $col->col_b == 0):
    $colCenter = 'l9';
elseif ($col->col_a == 0 and $col->col_b == 1):
    $colCenter = 'l9';
elseif ($col->col_a == 1 and $col->col_b == 1):
    $colCenter = 'l6';
endif;
?>