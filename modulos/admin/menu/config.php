<div class="col s12">
    <h4 class="green-text center">Configurações do Menu</h4>
    <div class="divider"></div>
</div>

<div class="col s12 m6 l4">
    <h5><small>Barra do Menu</small></h5>

    <div class="card-panel">

        <form name="form_post" method="post">
            <div class="input-field">
                <select name="ordem" id="id" onchange="Menu('parent', this, 0)">

                    <optgroup label="Posição Atual">
                        <?
                        $menuconf = listar('menu_conf');
                        foreach ($menuconf as $menuSel):

                            $menuBarra = ($menuSel->barra_menu == '0') ?
                                    '<option class="left" data-icon="' . BaseHost . 'assets/img/menu_content.PNG" selected value="">Tamanho do Conteudo</option>' :
                                    '<option class="left" data-icon="' . BaseHost . 'assets/img/menu_abaixo_full.PNG" selected value="">Tamanho do Navegador</option>';
                            ?>
                            <?= $menuBarra ?>




                        <? endforeach; ?>
                    </optgroup>

                    <optgroup label="Selecione um Posição">

                        <option class="left" data-icon="<?= BaseHost ?>assets/img/menu_content.PNG"  value="?id=1&update_menu_barra=0">Tamanho do Conteudo</option>
                        <option class="left" data-icon="<?= BaseHost ?>assets/img/menu_abaixo_full.PNG" value="?id=1&update_menu_barra=1">Tamanho do Navegador</option>

                    </optgroup>
                </select>
                <label>Mudar Posição
                    <i class="material-icons left orange-text md-16 tooltipped" data-position="bottom" data-delay="50" data-tooltip="
                       O menu pode se estender até a borda do navegador ou manter o tamanho do conteudo.">help</i>
                </label>
            </div>
        </form>
    </div>

</div>

<div class="col s12 m6 l4">
    <h5><small>Posição do Menu</small></h5>

    <div class="card-panel">

        <form name="form_post" method="post">
            <div class="input-field">
                <select name="ordem" id="id" onchange="Menu('parent', this, 0)">

                    <optgroup label="Posição Atual">
                        <?
                        $menuconf = listar('menu_conf');
                        foreach ($menuconf as $menuSel):

                            $menuOrdem = ($menuSel->ordem_menu == '0') ?
                                    '<option class="left" data-icon="' . BaseHost . 'assets/img/menu_acima.PNG" selected value="">Acima do Cabeçalho</option>' :
                                    '<option class="left" data-icon="' . BaseHost . 'assets/img/menu_abaixo_full.PNG" selected value="">Abaixo do Cabeçalho</option>';
                            ?>
                            <?= $menuOrdem ?>
                        <? endforeach; ?>
                    </optgroup>

                    <optgroup label="Selecione um Posição">

                        <option class="left" data-icon="<?= BaseHost ?>assets/img/menu_acima.PNG" value="?id=1&update_menu_ordem=0">Acima do Cabeçalho</option>
                        <option class="left" data-icon="<?= BaseHost ?>assets/img/menu_abaixo_full.PNG" value="?id=1&update_menu_ordem=1">Abaixo do Cabeçalho</option>

                    </optgroup>
                </select>
                <label>Mudar Posição
                    <i class="material-icons left orange-text md-16 tooltipped" data-position="bottom" data-delay="50" data-tooltip="
                       Ordem que o menu vai aparecer a partir do topo.">help</i>
                </label>
            </div>
        </form>
    </div>

</div>