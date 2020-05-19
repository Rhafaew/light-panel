<div class="col s12">

    <p><a title="Nova Pagina" href="<?= LinkPaginaNew ?>" class="btn light-blue left"><i class="material-icons">library_add</i></a></p>
    <div class="clearfix hide-on-med-and-up"></div>
    <h4 class="green-text center">Paginas</h4>
    <div class="divider"></div>

    <table class="responsive-table highlight striped">
        <thead>
            <tr>
                <th class="center-align">ID</th>
                <th>
                    Nome
                    <div class="divider"></div>
                    <small>Conteudo</small>
                </th>
                <th class="center-align">Parente</th>
                <th class="center-align">Autor</th>
                <th class="center-align">Data</th>
                <th class="center-align">Status</th>
                <th class="center-align">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?
            $conteudoTotal = 10; // <- Valor 2
            $pageReturn = pageReturn(URL::getURL(2), $conteudoTotal); // VALOR 1: RETORNO NUMERO DA PAGINA * VALOR 2: LIMITA CONTEUDO NA PAGINA
            $listar = listar('paginas', "ORDER BY id DESC LIMIT $pageReturn[1], $pageReturn[2]");
            foreach ($listar as $page):
                $resumoTexto = (strlen($page->conteudo) > 80) ? "<small> ...</small>" : "";
                ?>
                <tr>
                    <td class="center-align"><?= $page->id ?></td>
                    <td style="max-width: 320px">

                        <? if ($page->imagem == NULL):else: ?>
                            <img class="img-thumb-50p circle left z-depth-1" src="<?= BaseHost . DirIMG . $page->imagem ?>">
                        <? endif; ?>

                        <span class=" blue-text"><?= $page->nome ?></span>
                        <div class="divider"></div>
                        <small><?= substr(strip_tags(html_entity_decode($page->conteudo, ENT_QUOTES)), 0, 56) . $resumoTexto ?></small>
                    </td>
                    <?
                    if ($page->parente != 0):
                        $listar = listar('paginas', "where id='" . $page->parente . "'");
                        foreach ($listar as $parent):
                            ?>
                            <td class="center-align"><?= $parent->nome ?></td>
                            <?
                        endforeach;
                    else:
                        ?>
                        <td class="center-align"> Primaria </td>
                    <? endif; ?>

                    <td class="center-align"><?= $page->autor ?></td>

                    <td class="center-align"><?= $page->data ?></td>

                    <td class="center-align">
                        <?
                        $iconStatus = ($page->status == '1') ?
                                '<i class="material-icons green-text">visibility</i>' :
                                '<i class="material-icons blue-grey-text">visibility_off</i>';
                        ?>
                        <a title="Alterar Status" href="<?= LinkPostUpdate ?>?update_page_status&id=<?= $page->id ?>"><?= $iconStatus ?></a>
                    </td>

                    <td class="center-align">
                        <a class="btn-flat green-text" href="<?= LinkPaginaUpdate ?>?id=<?= $page->id ?>">
                            <i class="material-icons green-text">mode_edit</i></a>

                        <!-- Modal Trigger -->
                        <button data-target="<?= $page->id ?>" class="btn-flat red-text modal-trigger">
                            <i class="material-icons red-text">delete</i></button>
                    </td>
                </tr>

                <!-- Modal Apagar -->
            <div id="<?= $page->id ?>" class="modal">
                <div class="modal-content">
                    <h5>Apagar Pagina "<span class="red-text"><?= $page->nome ?></span>"</h5>
                    <p>Esta pagina será apagada. Deseja continuar?</p>
                    <blockquote class="orange-text">
                        <i class="material-icons left">warning</i>
                        Caso essa pagina tenha sub-paginas <mark class="orange lighten-5">Filhas</mark>
                        elas passaram a serem <mark class="orange lighten-5">Primarias</mark>!
                    </blockquote>
                </div>
                <div class="modal-footer">
                    <a href="<?= LinkPaginas ?>?del_page&id=<?= $page->id ?>" class="waves-effect waves-red btn-flat red-text">
                        <i class="material-icons left">delete_forever</i>Sim</a>
                    <a class=" modal-action modal-close waves-effect waves-green btn-flat blue-text">
                        <i class="material-icons left">arrow_back</i>Não</a>
                </div>
            </div>

        <? endforeach; ?>
        </tbody>
    </table>

    <!-- PAGINAÇÃO -->
    <ul class="pagination">
        <?
        // CONFIG QUANTIDADE DE PAGINAS
        $listar = listar('paginas');
        $countResult = count($listar);
        $numLinks = 5;
        // ESTRUTURA
        $liOpen = '<li class="waves-effect waves-purple">';
        $liActive = '<li class="active blue">';
        $liEnd = '</li> ';
        $IconFirst = '<i class="material-icons">first_page</i>';
        $IconPrev = '<i class="material-icons">chevron_left</i>';
        $IconProx = '<i class="material-icons">chevron_right</i>';
        $IconLast = '<i class="material-icons">last_page</i>';
        if ($countResult > $pageReturn[2]):
            FirstBackPage(LinkPaginas, $pageReturn[0], $liOpen, $liEnd, $IconFirst, $IconPrev);
            NumLoop(LinkPaginas, $pageReturn[0], $numLinks, $countResult, $pageReturn[2], $liOpen, $liEnd, $liActive);
            NextLastPage(LinkPaginas, $pageReturn[0], $countResult, $pageReturn[2], $liOpen, $liEnd, $IconProx, $IconLast);
        endif;
        ?>
    </ul>
</div>