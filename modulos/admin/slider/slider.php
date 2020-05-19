<div class=" col s12">
    <h4 class="green-text center">Slider</h4>
    <div class="divider"></div>
</div>

<form action="<?= LinkSliderNew ?>?new_slider" name="form_destaque" method="post">
    <div class="row">
        <div class="input-field col s12 m12 l4">
            <select class="icons" name="destaque" required>
                <option>Selecione para adicionar</option>
                <?
                $listar = listar("conteudo", "order by id DESC");
                foreach ($listar as $itemDest):
                    $imgIcon = ($itemDest->imagem == NULL) ? '' : BaseHost . DirIMG . $itemDest->imagem;
                    ?>
                    <option value="<?= $itemDest->id ?>" data-icon="<?= $imgIcon ?>" class="left circle"><?= $itemDest->titulo ?></option>
                <? endforeach; ?>
            </select>
        </div>

        <div class="col s12 m12 center-on-small-only">
            <button class="btn blue" type="submit"><i class="material-icons left">add</i>Adicionar</button>
        </div>
    </div>
</form>

<div class=" col s12">
    <div class="divider"></div>
    <?
    $listar = listar('slider', "ORDER BY ordem DESC");
    ?>
    <table class="highlight responsive-table bordered">
        <thead>
            <tr class="blue-text">
                <th>ID</th>
                <th>Titulo</th>
                <th class="center-align">Remover</th>
            </tr>
        </thead>
        <tbody>

            <?
            foreach ($listar as $destaques):
                $listar = listar("conteudo", "where id='" . $destaques->destaque . "'");
                $countDest = count($listar);
                echo $msgDest = ($countDest == 0) ? '<tr><td colspan="3" class="center-align"><h5>Nenhuma publicação selecionada como destaque.</h5></td></tr>' : '';
                foreach ($listar as $itemDest):
                    $data = explode(' ', $itemDest->data);
                    ?>
                    <tr>
                        <td><?= $itemDest->id ?></td>
                        <td><?= $itemDest->titulo ?></td>
                        <td class="center-align">
                            <button data-target="d<?= $destaques->destaque ?>" title="Remover item" class="btn-flat red-text modal-trigger" type="submit">
                                <i class="material-icons">delete</i></button>
                        </td>
                    </tr>

                    <!-- Modal Structure - APAGAR -->
                <div id="d<?= $destaques->destaque ?>" class="modal">
                    <div class="modal-content">
                        <h5>Remover Item</h5>
                        <p>Deseja remover este item do slider?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= LinkSlider ?>?del_slider&id=<?= $destaques->destaque ?>" class="waves-effect waves-red btn-flat red-text">
                            <i class="material-icons left">delete_forever</i>Sim</a>
                        <a class="modal-action modal-close waves-effect waves-green btn-flat blue-text">
                            <i class="material-icons left">arrow_back</i>Não</a>
                    </div>
                </div>

                <?
            endforeach;
        endforeach;
        ?>
        </tbody>
    </table>
</div>

<div class="row"></div>

<div class="col s12 l8">
    <div class="slider">
        <ul class="slides">
            <?
            $listar = listar('slider', "ORDER BY ordem DESC");
            foreach ($listar as $destaques):
                $listar = listar("conteudo", "where id='" . $destaques->destaque . "'");
                $countDest = count($listar);
                echo $msgDest = ($countDest == 0) ?
                '<tr><td colspan="3" class="center-align"><h5>Nenhuma publicação selecionada como destaque.</h5></td></tr>' : '';
                foreach ($listar as $itemDest):
                    $data = explode(' ', $itemDest->data);
                    ?>
                    <li>
                        <img src="<?= BaseHost . DirIMG . $itemDest->imagem ?>"> <!-- random image -->
                        <div style="background-color: rgba(0,0,0, 0.0); text-shadow: 0px 0px 10px rgba(0,0,0, 1)" class="caption center-align ">
                            <h3><?= $itemDest->titulo ?></h3>
                            <h5 class="light truncate"><?= strip_tags(html_entity_decode($itemDest->texto, ENT_QUOTES)) ?></h5>
                        </div>
                    </li>
                    <?
                endforeach;
            endforeach;
            ?>
        </ul>
    </div>
</div>