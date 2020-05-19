<div class="card z-depth-0">
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
    <? //= html_entity_decode($pgn->conteudo, ENT_QUOTES) ?>
</div>

<div class="divider"></div>
<div class="row">
</div>

<div class="row">
    <?
    // CONTEUDO
    $conteudoTotal = 6; // <- Valor 2
    $pageReturn = pageReturn(URL::getURL(1), $conteudoTotal); // VALOR 1: RETORNO NUMERO DA PAGINA * VALOR 2: LIMITA CONTEUDO NA PAGINA
    //$listar = listar('conteudo', $nivelAcesso = NULL . "ORDER BY id DESC LIMIT $pageReturn[1], $pageReturn[2]");

    $listar = listar('conteudo', "WHERE status='1' ORDER BY id DESC LIMIT $pageReturn[1], $pageReturn[2]");
    foreach ($listar as $post):
        ?>
        <article class="col s12 m6 l6">
            <h1 class="hide"><?= $post->titulo ?></h1>
            <div class="card small grey lighten-3 z-depth-0">

                <? if ($post->imagem != NULL): ?>
                    <div class="card-image" style="height: 150px">
                        <a title="<?= $post->titulo ?>" href="<?= BaseHost . $post->titulo_url ?>">
                            <img class="img-thumb" src="<?= BaseHost . DirIMG . $post->imagem ?>"></a>
                    </div>
                <? endif; ?>

                <div class="card-content">
                    <span class="card-title truncate">
                        <a title="<?= $post->titulo ?>" href="<?= BaseHost . $post->titulo_url ?>"><?= $post->titulo ?></a></span>
                    <? if ($post->imagem == null): ?>
                        <?= substr(strip_tags(html_entity_decode($post->texto, ENT_QUOTES)), 0, 240) . '...' ?>
                    <? endif; ?>
                </div>

                <div class="card-action">
                    <small title="Postado" class="grey-text left col s16 valign-wrapper">
                        <i class="material-icons left tiny">date_range</i> <?= $post->data ?></small>
                    <? if ($post->data_mod != NULL): ?>
                        <small title="Atualizado" class="grey-text right col s16 valign-wrapper">
                            <i class="material-icons left tiny">update</i> <?= $post->data_mod ?></small>
                    <? endif; ?>
                </div>
            </div>
        </article>
    <? endforeach; ?>
</div>

<!-- PAGINAÇÃO -->
<ul class="pagination">
    <?
    // CONFIG QUANTIDADE DE PAGINAS
    $listar = listar('conteudo', "WHERE status='1'");
    $countResult = count($listar);
    $numLinks = 3;
    // LINK
    $linkURL = BaseHost . $pgn->nome_url . '/';
    // ESTRUTURA
    $liOpen = '<li class="waves-effect waves-purple  hoverable">';
    $liActive = '<li class="active blue">';
    $liEnd = '</li> ';
    $IconFirst = '<i class="material-icons">first_page</i>';
    $IconPrev = '<i class="material-icons">chevron_left</i>';
    $IconProx = '<i class="material-icons">chevron_right</i>';
    $IconLast = '<i class="material-icons">last_page</i>';
    if ($countResult > $pageReturn[2]):
        // O PRIMEIRO VALOR É REFERENTE AO NOME DA PAGINA
        FirstBackPage($linkURL, $pageReturn[0], $liOpen, $liEnd, $IconFirst, $IconPrev);
        NumLoop($linkURL, $pageReturn[0], $numLinks, $countResult, $pageReturn[2], $liOpen, $liEnd, $liActive);
        NextLastPage($linkURL, $pageReturn[0], $countResult, $pageReturn[2], $liOpen, $liEnd, $IconProx, $IconLast);
    endif;
    ?>
</ul>
