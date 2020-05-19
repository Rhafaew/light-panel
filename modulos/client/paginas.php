<?
// DESTAQUES
$pagina = Url::getURL(0);
if ($pagina == NULL):
    ?>

    <div class="row">
        <?
        $listar = listar('conteudo', "WHERE status='1' and rascunho='0' ORDER BY id DESC LIMIT 1");
        foreach ($listar as $destaque1):
            ?>
            <article class="col s12">
                <h1 class="hide"><?= $destaque1->titulo ?></h1>

                <div class="card" style="margin: 0 !important">

                    <div class="card-image" style="height: 400px;">
                        <a title="<?= $destaque1->titulo ?>" href="<?= BaseHost . $destaque1->titulo_url ?>">
                            <img class="img-thumb" src="<?= BaseHost . DirIMG . $destaque1->imagem ?>">
                            <span class="card-title" style="background-color: rgba(0,0,0,0.5); width: 100%"><?= $destaque1->titulo ?></span>
                        </a>
                    </div>

                </div>
            </article>
        <? endforeach; ?>

    </div>
    <div class="row">
        <?
        $listar = listar('conteudo', "WHERE status='1' ORDER BY id DESC LIMIT 2, 3");
        foreach ($listar as $destaque2):
            ?>

            <article class="col s12 m6 l4">
                <h1 class="hide"><?= $destaque2->titulo ?></h1>
                <div class="card" style="height: 250px; margin: 0 !important">

                    <? if ($destaque2->imagem != NULL): ?>
                        <div class="card-image" style="height: 150px">
                            <a title="<?= $destaque2->titulo ?>" href="<?= BaseHost . $destaque2->titulo_url ?>">
                                <img class="img-thumb" src="<?= BaseHost . DirIMG . $destaque2->imagem ?>"></a>
                        </div>
                    <? endif; ?>

                    <div class="card-content">
                        <span class="">
                            <a title="<?= $destaque2->titulo ?>" href="<?= BaseHost . $destaque2->titulo_url ?>"><?= $destaque2->titulo ?></a></span>
                        <? if ($destaque2->imagem == null): ?>
                            <p><?= substr(strip_tags(html_entity_decode($destaque2->texto, ENT_QUOTES)), 0, 200) . '...' ?></p>
                        <? endif; ?>
                    </div>
                </div>
            </article>
        <? endforeach; ?>

    </div>
<? else: ?>

    <!-- EXIBE AS PAGINAS -->
    <div class="card z-depth-0" style="margin-top: 0;">
        <?
        if ($pgn->imagem == NULL):
            ?>
            <span class="card-title blue-text"><?= $pgn->nome ?></span>
            <?
        else:
            ?>
            <div class="card-image" style="height: 150px">
                <img class="img-thumb" src="<?= BaseHost . DirIMG . $pgn->imagem ?>">
                <span class="card-title" style="background-color: rgba(0,0,0,0.5); width: 100%"><?= $pgn->nome ?></span>
            </div>
        <?
        endif;
        ?>
        <?= html_entity_decode($pgn->conteudo, ENT_QUOTES) ?>
    </div>

<? endif; ?>

    <!-- EXEMPLO -->
    <div style="max-width: 100%; max-height: 90px; background: #ccc;">
        <center>
            <img class="responsive-img" src="../assets/img/banner.png">
        </center>
    </div>