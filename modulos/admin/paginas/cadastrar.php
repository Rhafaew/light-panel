<div class="row">    <div class="col s12">        <p><a title="Voltar para Paginas" href="<?= LinkPaginas ?>" class="btn orange left"><i class="material-icons">arrow_back</i></a></p>        <div class="clearfix hide-on-med-and-up"></div>        <h4 class="green-text center">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  Nova Pagina</h4>        <div class="divider"></div>    </div></div><form action="<?= LinkPaginaNew ?>?new_page" name="form_page" method="post" enctype="multipart/form-data">    <div class="row">        <div class="col s12 m12 l8">            <div class="card-panel">                <div class="input-field">                    <i class="material-icons prefix">title</i>                    <input id="nome" name="nome" type="text" class="validate" required >                    <label for="nome" class="active">Titulo</label>                </div>            </div>            <div class="input-field z-depth-1">                <textarea id="editor-full" name="conteudo" class="materialize-textarea"></textarea>            </div>        </div>        <!-- SIDEBAR -->        <div class="col s12 m12 l4">            <div class="row">                <!-- BOTÕES -->                <div class="col s12 m4 l12">                    <div class="card-panel">                        <center>                            <button title="Salvar e Publicar" class="btn btn-large blue" type="submit">                                <i class="material-icons left">save</i> Concluir                            </button>                        </center>                    </div>                </div>                <!-- STATUS -->                <div class="col s12 m4 l12">                    <div class="card-panel">                        <label>Selecionar Status</label>                        <div class="divider"></div>                        <div class="input-field">                            <select name="status">                                <option hidden selected value='0'>Status</option>                                <option value='1'>Visivel</option>                                <option value='0'>Oculto</option>                            </select>                        </div>                    </div>                </div>                <!-- CATEGORIAS -->                <div class="col s12 m4 l12">                    <div class="card-panel">                        <label>Descendência</label>                        <div class="divider"></div>                        <p>                            <input checked class="with-gap" name="parente" type="radio" value="0" id="id0" />                            <label for="id0">Pagina Primaria</label>                        </p>                        <!-- Modal SELECT CATEGORIA -->                        <div id="SelCateg" class="modal modal-fixed-footer">                            <div class="modal-content">                                <h5>Pagina Descendênte</h5>                                <p class="orange lighten-5 orange-text block-round">                                    <i class="material-icons left">info_outline</i> Seleciona uma pagina, cilque em "<b>OK</b>"                                    e depois que terminar clique em <i class="material-icons" style="font-size: 1em">save</i>                                    "<b>salvar</b>" para salvar.                                </p>                                <?                                function categLooping($cat_pai = 0, $nivel = 0) {                                    $catReturn = "";                                    $listar = listar("paginas", "WHERE parente='" . $cat_pai . "' ORDER BY nome ASC");                                    foreach ($listar as $cat):                                        // GERA LOOPING                                        $catReturn .= '<li><input class="with-gap" name="parente"'                                                . 'type="radio" value="' . $cat->id . '" id="id' . $cat->id . '" />'                                                . '<label for="id' . $cat->id . '">' . $cat->nome . '</label>';                                        $catReturn .= '<ul>' . categLooping($cat->id, $nivel + 1) . '</ul></li>';                                        $catReturn .= '</li>';                                    endforeach;                                    return $catReturn;                                }                                ?>                                <!-- LOOPING DE CATEGORIAS -->                                <ul class="lista">                                    <?= categLooping(); ?>                                </ul>                            </div>                            <div class="modal-footer">                                <a class=" modal-action modal-close waves-effect waves-green green white-text btn-flat">                                    <i class="material-icons left">radio_button_checked</i>Ok</a>                            </div>                        </div>                        <p class="center">                            <button data-target="SelCateg" title="Selecionar Categoria" class="btn orange modal-trigger display-full">                                <i class="material-icons left">done</i> Selecionar</button>                        </p>                    </div>                </div>                <!-- IMAGEM -->                <div class="col s12 m12 l12">                    <div class="card-panel">                        <label>Adicionar Imagem Padrão</label>                        <div class="divider"></div>                        <p class="switch">                            <label>                                <input name="enviar_img" type="checkbox" onclick="document.form_page.img.disabled = false" value="sim">                                <span class="lever"></span>                                Add imagem                            </label>                        </p>                        <div class="file-field input-field">                            <div class="file-path-wrapper">                                <div class="btn">                                    <span>Imagem</span>                                    <input type="file" disabled name="img">                                </div>                                <input class="file-path validate" placeholder="Selecione" type="text">                            </div>                        </div>                    </div>                </div>            </div>        </div>    </div></form><?// MODALs /////////////////////$listar = listar("categorias");foreach ($listar as $categ):    ?><? endforeach; ?>