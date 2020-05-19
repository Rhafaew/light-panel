<?
$listar = listar('conteudo', "WHERE titulo_url='" . URL::getURL(0) . "'");
?>

<? foreach ($listar as $post): endforeach; ?>

<small class="grey-text">Publicado em <?= $post->data ?> <?= $data_mod = ($post->data_mod != NULL) ? '- Atualizado em ' . $post->data_mod : '' ?></small>
<h3><?= $post->titulo ?></h3>

<? if ($post->imagem == null): else: ?>
    <div class="col m6 l5" style="padding-left: 0 !important">
        <img class="responsive-img materialboxed left" data-caption="<?= $post->titulo ?> / <?= $post->imagem_legenda ?>" src="<?= BaseHost . DirIMG . $post->imagem ?>">
        <? if ($post->imagem_legenda != NULL): ?>
            <div class="blue-grey lighten-3 white-text display-full clearfix" style="padding: 5px; margin-bottom: 5px">
                <small><?= $post->imagem_legenda ?></small>
            </div>
        <? endif; ?>
    </div>
<? endif; ?>

<?= html_entity_decode($post->texto, ENT_QUOTES) ?>

<div class="divider"></div>

<? $fontes = html_entity_decode($post->fontes, ENT_QUOTES); ?>

<p><b>Fonte:</b> <?= bbCode($fontes) ?></p>
<div class="divider"></div>
<!-- ////////////////////////////////////////////////// -->

<div class="clearfix"></div>
<?
$listar = listar("galerias", "where id='" . $post->galeria_id . "'");
foreach ($listar as $galeria):
    ?>
    <h5><?= $galeria->titulo ?></h5>
<? endforeach; ?>

<div class="row">
    <?
    $listar = listar('galerias_fotos', "where id_galeria='" . $post->galeria_id . "' order by id DESC");
    foreach ($listar as $fotos):
        $desc = ($fotos->descricao == NULL) ? 'Sem Descrição' : $fotos->descricao;
        $data = explode(' ', $fotos->data);
        ?>

        <div class="col s12 m6 l4">
            <article class="card small hoverable">
                <h1 class="hide">Foto da Galeria <?= $galeria->titulo ?></h1>
                <div class="card-image">
                    <img class="responsive-img materialboxed" data-caption="<?= $desc . ' (' . $data[0] . ')' ?>" src="<?= BaseHost . DirGalerias . $fotos->foto ?>">

                </div>
                <div class="card-content">
                    <small class="grey-text truncate"><?= $desc ?></small>
                </div>

                <div class="card-action">
                    <small class="grey-text left"><i class="material-icons left tiny">date_range</i><?= $data[0] ?></small>
                </div>
            </article>
        </div>
    <? endforeach; ?>
</div>

<?
$listar = listar("usuarios", "where id='" . $post->autor . "'");
$countUser = count($listar);
foreach ($listar as $autorPost):endforeach;
?>

<? if ($countUser == NULL): ?><br><? else: ?>
    <div class="card grey lighten-3">
        <div class="card-content">
            <div class="row">
                <div class="col s12 l2">
                    <div class="center-block" style="height: 80px; width: 80px">
                        <? if ($autorPost->foto == NULL): ?>
                            <i class="material-icons medium circle grey white-text">perm_identity</i>
                        <? else: ?>
                            <img class="circle img-thumb z-depth-1 hoverable" src="<?= BaseHost . DirFoto . $autorPost->foto ?>">
                        <? endif; ?>
                    </div>
                </div>
                <div class="col s12 l10">
                    <span class="card-title center-on-small-only"><?= $autorPost->nome ?> <small>"<?= $autorPost->nickname ?>"</small></span>
                    <p><?= $autorPost->sobre ?></p>
                </div>
            </div>
        </div>
    </div>
<? endif; ?>

<div class="clearfix"></div>
<div class="divider"></div>

<section>
    <h5>Veja Também</h5>

    <? $listar = listar('conteudo', "WHERE status='1' ORDER BY Rand() LIMIT 3"); ?>

    <div class="row">
        <? foreach ($listar as $post): ?>

            <div class="col s12 m4 l4">
                <article class="card small grey lighten-3 z-depth-0">
                    <h1 class="hide"><?= $post->titulo ?></h1>
                    <? if ($post->imagem != null): ?>
                        <div class="card-image">
                            <a title="<?= $post->titulo ?>" href="<?= BaseHost . $post->titulo_url ?>">
                                <img class="responsive-img" src="<?= BaseHost . DirIMG . $post->imagem ?>"></a>
                        </div>
                    <? endif; ?>

                    <div class="card-content">
                        <span class="card-title truncate">
                            <a title="<?= $post->titulo ?>" href="<?= BaseHost . $post->titulo_url ?>"><?= $post->titulo ?></a></span>
                        <? if ($post->imagem == null): ?>
                            <?= substr(strip_tags(html_entity_decode($post->texto, ENT_QUOTES)), 0, 140) . '...' ?>
                        <? endif; ?>
                    </div>

                    <div class="card-action">
                        <a href="<?= BaseHost . $post->titulo_url ?>">Ler Noticia</a>
                        <small class="grey-text right"><?= $post->data ?></small>
                    </div>

                </article>
            </div>

        <? endforeach; ?>
    </div>
</section>