<div class="col s12">
    <h4 class="green-text center">Menu</h4>
    <div class="divider"></div>

    <h4>Selecione as paginas que aparecerão no menu.</h4>
</div>


<div class="col s12 m6 l4">
    <h5><small>No Menu</small></h5>

    <?
    $listar = listar('paginas', "WHERE status='1' and ordem>0 ORDER BY ordem ASC");
    foreach ($listar as $pageMenu):
        ?>
        <div class="card-panel blue lighten-5">
            <form action="<?= LinkMenu ?>?id=<?= $pageMenu->id ?>&remover_page" name="form" method="post">
                <button title="Remover do Menu" class="btn-flat red white-text right" type="submit" value="">
                    <i class="material-icons">delete</i></button> <span class="flow-text blue-text"><?= $pageMenu->nome ?></span>
            </form>

            <form name="form_post" method="post">
                <div class="input-field">
                    <select name="ordem" id="id" onchange="Menu('parent', this, 0)">
                        <optgroup label="Posição Atual">
                            <?
                            $list = listar('paginas', "WHERE id='" . $pageMenu->id . "' ORDER BY ordem ASC");
                            foreach ($list as $pageSel):
                                ?>
                                <option selected value="">Posição <?= $pageSel->ordem ?></option>
                            <? endforeach; ?>
                        </optgroup>
                        <optgroup label="Selecione um Posição">
                            <?
                            for ($p = 1; $p <= count($listar)+1; $p++):
                                ?>
                                <option value="?id=<?= $pageSel->id ?>&update_ordem=<?= $p ?>">Posição <?= $p ?></option>
                            <? endfor; ?>
                        </optgroup>
                    </select>
                    <label>Ordem
                        <a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Selecione a ordem que deseja para as paginas serem exibidas no menu."><i class="material-icons orange-text md-16">info_outline</i></a>
                    </label>
                </div>
            </form>
        </div>

        <?
    endforeach;

// POSIÇÕES 0 (ZERO) FICAM POR ULTIMO
    $listar = listar('paginas', "WHERE status='1' and ordem=0 and menu=1 ORDER BY ordem ASC");
    foreach ($listar as $pagMenu):
        ?>
        <div class="card-panel blue lighten-5">
            <form action="<?= LinkMenu ?>?id=<?= $pagMenu->id ?>&remover_page" name="form" method="post">
                <button title="Remover do Menu" class="btn-flat red white-text right" type="submit" value="">
                    <i class="material-icons">delete</i></button> <span class="flow-text blue-text"><?= $pagMenu->nome ?></span>
            </form>

            <form action="<?= LinkMenu ?>?id=&update_page" name="form_post" method="post">
                <div class="input-field">
                    <select name="ordem" id="id" onchange="Menu('parent', this, 0)">

                        <optgroup label="Posição Atual">
                            <?
                            $list = listar('paginas', "WHERE id='" . $pagMenu->id . "' ORDER BY ordem ASC");
                            foreach ($list as $pageSel):
                                ?>
                                <option selected value="">Posição <?= $pageSel->ordem ?></option>
                            <? endforeach; ?>
                        </optgroup>

                        <optgroup label="Selecione um Posição">
                            <?
                            $listar = listar('paginas', "WHERE status='1' and ordem>0 ORDER BY ordem ASC");
                            foreach ($listar as $pageMenu):endforeach;

                            for ($p = 1; $p <= count($listar)+1; $p++):
                                ?>
                                <option value="?id=<?= $pageSel->id ?>&update_ordem=<?= $p ?>">Posição <?= $p ?></option>
                            <? endfor; ?>
                        </optgroup>
                    </select>
                    <label>Ordem
                        <a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Selecione a ordem que deseja para as paginas serem exibidas no menu."><i class="material-icons orange-text md-16">info_outline</i></a>
                    </label>

                    <div class="card-panel yellow lighten-4 z-depth-0">
                        <span class="orange-text"><i class="material-icons left">info_outline</i>
                            <small>Selecione uma posição diferente de 0 (zero) para ser exibido no menu.</small></span>
                    </div>

                </div>
            </form>
        </div>

    <? endforeach; ?>

</div>

<div class="col s12 m6 l4">
    <h5><small>Adicionaveis</small></h5>
    <?
    $listaMenu = listar('paginas', "WHERE status='1' and menu='0' and parente='0' ORDER BY nome ASC");
    $countAlert = count($listaMenu);
    $alert = ($countAlert == NULL) ? '<p class="orange-text">Nenhuma pagina para ser adicionada.</p>'
            . '<blockquote class="red-text"><i class="material-icons left">info</i> As paginas que decendem de outras não são adicionaveis ao menu.</blockquote>' : '';
    echo $alert;
    foreach ($listaMenu as $pagMenu):
        ?>
        <div class="card-panel green lighten-5">
            <form action="<?= LinkMenu ?>?id=<?= $pagMenu->id ?>&add_page" name="form" method="post">
                <button title="Adicionar ao Menu" class="btn-flat blue white-text right" type="submit" value="">
                    <i class="material-icons">add</i></button> <span class="flow-text blue-text"><?= $pagMenu->nome ?></span>
            </form>
        </div>

    <? endforeach; ?>

</div>