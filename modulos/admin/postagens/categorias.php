<div class="row">
    <div class="col s12">

        <p>
            <span class="left">
                <a title="Voltar Para Postagens" href="<?= LinkPostagens ?>" class="btn orange"><i class="material-icons">arrow_back</i></a>
                <button title="Nova Categoria" data-target="newCateg" class="btn light-blue"><i class="material-icons">playlist_add</i></button>
            </span>
        </p>
        <div class="clearfix hide-on-med-and-up"></div>

        <h4 class="green-text center">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  Categorias</h4>
        <div class="divider"></div>
    </div>
</div>
<?

function categLooping($cat_pai = 0, $nivel = 0) {
    $catReturn = "";
    $listar = listar("categorias", "WHERE parente='" . $cat_pai . "' ORDER BY nome ASC");
    foreach ($listar as $cat):
        $listIcon = ($cat->parente != 0) ? '<i class="material-icons left">subdirectory_arrow_right</i>' : '';
        $catReturn .= '<li>' . '<div class="row">' . $listIcon . $cat->nome . '<button data-target="E' . $cat->id . '" class="btn-link modal-trigger right"><i class="material-icons small green-text">edit</i></button></div>';
        $catReturn .= '<ul>' . categLooping($cat->id, $nivel + 1) . '</ul></li>';
        $catReturn .= '</li>';
    endforeach;
    return $catReturn;
}
?>

<div class="col s12">
    <div class="card col s12 m6 l4">
        <div class="card-content">

            <!-- LOOPING DE CATEGORIAS -->
            <span class="blue-text">
                <small>(Clique na categoria para editar.)</small>
            </span>

            <ul class="lista"><?= categLooping(); ?></ul>
        </div>
    </div>
</div>

<?
// MODALs /////////////////////
$listar = listar("categorias");
foreach ($listar as $categ):
    ?>
    <!-- Modal INSERT -->
    <div id="newCateg" class="modal">

        <form action="<?= LinkPostCategoria ?>?new_categ" method="post">
            <div class="modal-content">
                <h5>Nova Categoria</h5>
                <div class="input-field">
                    <input id="categoria" name="nome" type="text" class="validate" required >
                    <label for="categoria">Nome da Categoria</label>
                </div>

                <label for="texto">Selecionar Categoria Parente</label>
                <div class="input-field">
                    <select name="parente" required>

                        <option value="0" selected hidden >Sel. Categoria</option>
                        <?
                        $listar = listar('categorias', "ORDER BY nome ASC");
                        foreach ($listar as $sellCat):
                            ?><option value="<?= $sellCat->id ?>"><?= $sellCat->nome ?></option>
                        <? endforeach; ?>

                    </select>
                </div>

            </div>
            <div class="modal-footer">

                <button type="submit" class="waves-effect waves-purple btn-flat blue-text">
                    <i class="material-icons left">save</i>Add</button>

                <a class=" modal-action modal-close waves-effect waves-green btn-flat">
                    <i class="material-icons left">arrow_back</i>Cancelar</a>
            </div>
        </form>
    </div>

    <!-- Modal EDITE -->
    <div id="E<?= $categ->id ?>" class="modal">

        <form action="<?= LinkPostCategoria ?>?update_categ&id=<?= $categ->id ?>" method="post">
            <div class="modal-content">
                <h5>Editar Categoria</h5>

                <div class="input-field">
                    <input id="categoria" name="nome" type="text" value="<?= $categ->nome ?>" class="validate" required >
                    <label for="categoria">Titulo da Categoria</label>
                </div>

                <label for="texto">Selecionar Categoria</label>
                <div class="input-field">
                    <select name="parente">
                        <?
                        if ($categ->parente != 0):
                            $listar = listar('categorias', "WHERE id='" . $categ->parente . "'");
                            foreach ($listar as $atualCat):endforeach;
                            ?>
                            <option value = "<?= $categ->parente ?>" hidden selected><?= $atualCat->nome ?></option>
                            <option value = "0" >Primaria</option>
                        <?php else: ?>
                            <option value = "0" hidden selected>Primaria</option>
                        <?php endif; ?>
                        <?
                        $listar = listar('categorias', "ORDER BY nome ASC");
                        foreach ($listar as $sellCat):
                            ?><option value="<?= $sellCat->id ?>"><?= $sellCat->nome ?></option>
                        <? endforeach; ?>
                    </select>
                </div>

            </div>
            <div class="modal-footer">

                <button data-target="D<?= $categ->id ?>" class="waves-effect waves-red btn-flat left red-text modal-trigger">
                    <i class="material-icons left">delete</i> Deletar</button>

                <button type="submit" class="waves-effect waves-purple btn-flat blue-text">
                    <i class="material-icons left">save</i>Salvar</button>

                <a class=" modal-action modal-close waves-effect waves-green btn-flat">
                    <i class="material-icons left">arrow_back</i>Cancelar</a>
            </div>
        </form>
    </div>

    <!-- Modal DELETE -->
    <div id="D<?= $categ->id ?>" class="modal">

        <div class="modal-content">
            <h5>Apagar Categoria "<span class="red-text"><?= $categ->nome ?></span>"</h5>
            <p>Este categoria será apagada. Deseja continuar?</p>
            <blockquote class="orange-text"><i class="material-icons left">warning</i>
                Caso essa categoria tenha categorias <mark class="orange lighten-5">Filhas</mark>
                elas passaram a serem <mark class="orange lighten-5">Primarias</mark>!
            </blockquote>
        </div>
        <div class="modal-footer">
            <a href="<?= LinkPostCategoria ?>?delete_categ&id=<?= $categ->id ?>" class="waves-effect waves-red btn-flat red-text">
                <i class="material-icons left">delete_forever</i>Sim</a>
            <a class=" modal-action modal-close waves-effect waves-green btn-flat">
                <i class="material-icons left">arrow_back</i>Não</a>
        </div>
    </div>
<? endforeach; ?>