<?php
$listar = listar("paginas", "where id ='" . $_GET['id'] . "'");
foreach ($listar as $page):endforeach;

if (empty($listar)):
    echo "<center>"
    . "<h3>Conteudo Não Encontrado!</h3>"
    . "<h5>Pode ter sido removido ou alterado e não pode ser modificado.</h5>"
    . "<a href='" . LinkPaginas . "' class='btn btn-large orange'><i class='material-icons left'>arrow_back</i> Voltar Para Postagens</a>"
    . "</center>";
else:
    ?>
    <div class="row">
        <div class="col s12">

            <p><a title="Voltar para Paginas" href="<?= LinkPaginas ?>" class="btn orange left"><i class="material-icons">arrow_back</i></a></p>
            <div class="clearfix hide-on-med-and-up"></div>
            <h4 class="green-text center">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  Atualizar Pagina</h4>
            <div class="divider"></div>
        </div>
    </div>
    <form action="<?= LinkPaginaUpdate ?>?id=<?= $_GET['id'] ?>&update_page" name="form_page" method="post" enctype="multipart/form-data">
        <div class="row">

            <div class="col s12 m12 l8">

                <div class="card-panel">
                    <div class="input-field">
                        <i class="material-icons prefix">title</i>
                        <input id="nome" name="nome" type="text" class="validate" required value="<?= $page->nome ?>" >
                        <label for="nome" class="active">Titulo</label>
                    </div>
                </div>

                <div class="input-field z-depth-1">
                    <textarea id="editor-full" name="conteudo" class="materialize-textarea"><?= $page->conteudo ?></textarea>
                </div>

                <p><div class="divider"></div></p>

                <!-- LAYOUT COLUNAS -->
                <div class="card-panel">

                    <p>
                    <h5 class="flow-text">Layout da Pagina</h5>
                    <div class="divider"></div>
                    </p>

                    <?
                    $listar = listar('paginas', "where id ='" . $_GET['id'] . "'");
                    foreach ($listar as $coll):endforeach;

                    if ($coll->col_custon == 1):
                        ?>
                        <p class="switch">
                            <label>
                                <input name="col_custon" type="checkbox" value="0">
                                <span class="lever"></span>
                                Voltar ao Padrão
                                <p class="red-text">
                                    <small>Para alterar o padrão clique <a href="<?= BaseHost ?>admin/layout/">aqui</a></small>
                                </p>
                            </label>
                        <div class="divider"></div>
                        </p>
                    <? else: ?>
                        <p>Atual: <span class="blue-text">Layout Padrão</span></p>
                        <input id="coll" checked name="col_custon" type="checkbox" class="filled-in" value="0">
                        <label for="coll">Manter como padrão</label>
                        <div class="divider"></div><br>
                    <? endif; ?>

                    <div class="row">
                        <div class="col s12 m6 l6">

                            <div class="flow-text">Coluna A</div>

                            <? $check_a = ($coll->col_a == 1) ? 'checked' : ''; ?>
                            <input type="checkbox" class="filled-in" id="col-a" name="col_a" value="1" <?= $check_a ?> />
                            <label for="col-a">Ativar</label>

                            <div class="input-field">
                                <select name="pos_a">

                                    <option disabled>Selecione a posição</option>

                                    <?php if ($coll->pos_a == 0): ?>
                                        <option hidden selected value="<?= $coll->pos_a ?>">Esquerda</option>
                                        <option value="1">Direita</option>
                                    <?php else: ?>
                                        <option hidden selected value="<?= $coll->pos_a ?>">Direita</option>
                                        <option value="0">Esquerda</option>
                                    <?php endif; ?>
                                </select>
                                <label>Posição da Coluna A</label>
                            </div>
                        </div>

                        <!-- ////////////////////////////////////////////////// -->

                        <div class="col s12 m6 l6">

                            <div class="flow-text">Coluna B</div>

                            <? $check_b = ($coll->col_b == 1) ? 'checked' : ''; ?>
                            <input type="checkbox" class="filled-in" id="col-b" name="col_b" value="1" <?= $check_b ?> />
                            <label for="col-b">Ativar</label>

                            <div class="input-field">
                                <select name="pos_b">

                                    <option disabled>Selecione a posição</option>

                                    <?php if ($coll->pos_b == 0): ?>
                                        <option hidden selected value="<?= $coll->pos_b ?>">Esquerda</option>
                                        <option value="1">Direita</option>
                                    <?php else: ?>
                                        <option hidden selected value="<?= $coll->pos_b ?>">Direita</option>
                                        <option value="0">Esquerda</option>
                                    <?php endif; ?>
                                </select>
                                <label>Posição da Coluna B</label>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>





            <!-- SIDEBAR -->
            <div class="col s12 m12 l4">
                <div class="row">

                    <!-- BOTÕES -->
                    <div class="col s12 m4 l12">
                        <div class="card-panel">
                            <center>
                                <button title="Salvar e Alteração" class="btn btn-large blue" type="submit">
                                    <i class="material-icons left">save</i> Salvar</button>
                            </center>
                        </div>
                    </div>

                    <!-- STATUS -->
                    <div class="col s12 m4 l12">
                        <div class="card-panel">

                            <h5 class="flow-text">Status</h5>
                            <div class="divider"></div>

                            <div class="input-field">
                                <select name="status">
                                    <?php if ($page->status == 0): ?>
                                        <option selected value="<?= $page->status ?>">Oculto</option>
                                        <option value='1'>Visivel</option>
                                    <?php else: ?>
                                        <option selected value="<?= $page->status ?>">Visivel</option>
                                        <option value='0'>Oculto</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- CATEGORIAS -->
                    <div class="col s12 m4 l12">
                        <div class="card-panel">

                            <h5 class="flow-text">Descendência</h5>
                            <div class="divider"></div>

                            <?
                            if ($page->parente != 0):

                                $listar = listar('paginas', "where id='" . $page->parente . "'");
                                foreach ($listar as $parent):endforeach;
                                ?>
                                <p class="blue-text">
                                    <b class="left grey-text">Atual</b>
                                    <i class="material-icons left grey-text">keyboard_arrow_right</i> <?= $parent->nome ?>
                                </p>
                            <?php else: ?>
                                <p class="blue-text">
                                    <b class="left grey-text">Atual</b>
                                    <i class="material-icons left grey-text">keyboard_arrow_right</i>Pagina Principal
                                </p>
                            <?php endif; ?>

                            <!-- Modal SELECT CATEGORIA -->
                            <div id="SelCateg" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                    <h5>Alterar Categoria</h5>
                                    <p class="orange lighten-5 orange-text block-round">
                                        <i class="material-icons left">info_outline</i> Seleciona uma categoria, cilque em "<b>OK</b>"
                                        e depois que terminar clique em <i class="material-icons" style="font-size: 1em">save</i>
                                        "<b>salvar</b>" para salvar.
                                    </p>
                                    <?

                                    function categLooping($parent_pai = 0, $nivel = 0) {
                                        $parentReturn = "";
                                        $listar = listar("paginas", "WHERE parente='" . $parent_pai . "' ORDER BY nome ASC");
                                        foreach ($listar as $parent):
                                            // VERIFICA ATUAL
                                            $listar = listar("paginas", "where id =" . $_GET['id']);
                                            foreach ($listar as $pag):
                                                $nl = $pag->parente;
                                            endforeach;
                                            $check = ($nl == $parent->id) ? 'checked' : '';
                                            $hover = ($nl == $parent->id) ? 'blue-text' : '';

                                            // GERA LOOPING
                                            $parentReturn .= '<li>'
                                                    . '<input ' . $check . ' class="with-gap" name="parente"'
                                                    . 'type="radio" value="' . $parent->id . '" id="id' . $parent->id . '" />'
                                                    . '<label for="id' . $parent->id . '" class="' . $hover . '">' . $parent->nome . '</label>';
                                            $parentReturn .= '<ul>' . categLooping($parent->id, $nivel + 1) . '</ul>';
                                            $parentReturn .= '</li>';
                                        endforeach;
                                        return $parentReturn;
                                    }

                                    $hover = ($page->parente == 0) ? 'blue-text' : '';
                                    ?>
                                    <!-- LOOPING DE CATEGORIAS -->
                                    <ul class="lista">
                                        <li>
                                            <input checked class="with-gap" name="parente" type="radio" value="0" id="id0" />
                                            <label class="<?= $hover ?>" for="id0">Pagina Primaria</label>
                                        </li>

                                        <?= categLooping(); ?>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <a class="modal-action modal-close waves-effect waves-green green white-text btn-flat">
                                        <i class="material-icons left">radio_button_checked</i>Ok</a>
                                </div>
                            </div>

                            <p class="center">
                                <button data-target="SelCateg" title="Alterar Categoria" class="btn orange modal-trigger display-full">
                                    <i class="material-icons left">autorenew</i> Alterar</button>
                            </p>
                        </div>
                    </div>

                    <!-- IMAGEM -->
                    <div class="col s12 m12 l12">
                        <div class="card-panel">

                            <h5 class="flow-text">Imagem</h5>
                            <div class="divider"></div>


                            <div class="row">
                                <div class="col s12 m6 l12">

                                    <? if ($page->imagem == NULL): ?>
                                                                                                                                <!--center><img class="responsive-img" src="<?= BaseHost . DirImage ?>do_not_disturb.png"></center-->
                                        <center><i class="material-icons" style="font-size: 64px">panorama</i></center>
                                    <? else: ?>
                                        <img class="responsive-img" src="<?= BaseHost . DirIMG . $page->imagem ?>">
                                    <? endif; ?>


                                </div>
                                <div class="col s12 m6 l12">
                                    <label>Alterar Imagem Padrão</label>
                                    <div class="divider"></div>

                                    <? if ($page->imagem != NULL): ?>
                                        <p>
                                            <input name="enviar_img" type="checkbox" id="del" onclick="document.form_page.img.disabled = true" value="del" class="filled-in" />
                                            <label for="del">Remover Imagem</label>
                                        </p>
                                    <? endif; ?>

                                    <p class="switch">
                                        <label>
                                            <input name="enviar_img" type="checkbox" onclick="document.form_page.img.disabled = false" value="sim">
                                            <span class="lever"></span>
                                            Alterar imagem
                                        </label>
                                    </p>

                                    <div class="file-field input-field">
                                        <div class="file-path-wrapper">

                                            <div class="btn">
                                                <span>Imagem</span>
                                                <input type="file" disabled name="img">
                                            </div>
                                            <input class="file-path validate" placeholder="Selecione" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div>

                    <!-- BOTÕES -->
                    <div class="col s12 m4 l12">
                        <div class="card-panel">

                            <div class="row">
                                <center>
                                    <a title="Voltar" href="<?= LinkPaginas ?>" class="btn btn-large orange">
                                        <i class="material-icons">arrow_back</i></a>
                                    <button title="Salvar" class="btn btn-large blue" type="submit">
                                        <i class="material-icons">save</i></button>
                                </center>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
<? endif; ?>
<?
// MODALs /////////////////////
$listar = listar("categorias");
foreach ($listar as $categ):
    ?>
<? endforeach; ?>