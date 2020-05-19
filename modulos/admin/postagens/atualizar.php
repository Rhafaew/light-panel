<?php
$listar = listar("conteudo", "where id =" . $_GET['id']);
foreach ($listar as $post):endforeach;

if (empty($listar)):
    echo "<center>"
    . "<h3>Conteudo Não Encontrado!</h3>"
    . "<h5>Pode ter sido removido ou alterado e não pode ser modificado.</h5>"
    . "<a href='" . LinkPostagens . "' class='btn btn-large orange'><i class='material-icons left'>arrow_back</i> Voltar Para Postagens</a>"
    . "</center>";
else:
    ?>
    <div class="row">
        <div class="col s12">
            <? $rascunhoVoltar = ($post->rascunho == '0') ? LinkPostagens : LinkPostRascunhos; ?>
            <p>
                <span class="left">
                    <a title="Voltar para Postagens" href="<?= $rascunhoVoltar ?>" class="btn orange left"><i class="material-icons">arrow_back</i></a>
                </span>
            </p>
            <div class="clearfix hide-on-med-and-up"></div>

            <h4 class="green-text center">Editar Publicação</h4>
            <div class="divider"></div>
        </div>
    </div>
    <form action="<?= LinkPostUpdate ?>?id=<?= $_GET['id'] ?>&update_post" name="form_post" method="post" enctype="multipart/form-data">

        <div class="row">

            <div class="col s12 m12 l8">

                <div class="card-panel">
                    <?= $rascunhoAlert = ($post->rascunho == '1') ? '<b class="green-text"> RASCUNHO: </b><br class="hide-on-med-and-up">' : ''; ?>
                    <b class="blue-text">Publicado:</b> <?= $post->data ?> | <b class="blue-text">Atualizado</b> <?= $post->data_mod ?>
                </div>

                <div class="card-panel">
                    <div class="input-field">
                        <i class="material-icons prefix">title</i>
                        <label for="titulo" class="active">Titulo</label>
                        <input id="titulo" name="titulo" type="text" class="validate" required value="<?= $post->titulo ?>" >
                    </div>
                </div>

                <div class="input-field z-depth-1">
                    <textarea id="editor-full" name="texto" class="materialize-textarea"><?= $post->texto ?></textarea>
                </div>

                <div class="card-panel">
                    <div class="input-field">
                        <i class="material-icons prefix">description</i>
                        <label for="fontes" class="active">Fontes e Creditos da Publicação <small class="orange-text">(Opcional)</small></label>
                        <input id="fontes" name="fontes" type="text" class="validate" value="<?= $post->fontes ?>" >
                    </div>

                    <small class="grey-text">Use <b>BBCode</b> para adicionar negrito, itálico, sublinhado e criar link.
                        <button data-target="bbCode" title="Alterar Categoria" class="btn-link orange-text modal-trigger right">
                            <i class="material-icons md-16 left">help</i> Como usar BBCode</button></small>

                    <!-- Modal SELECT BBCODE -->
                    <div id="bbCode" class="modal modal-footer">
                        <div class="modal-content">
                            <h5>BBCode</h5>

                            <p><b class="black-text">Exempolo:</b></p>
                            <b class="orange-text">Negrito:</b> <b>[b]</b>Texto em Negrito<b>[/b]</b><br>
                            <b class="orange-text">Italico:</b> <b>[i]</b>Texto em Italico<b>[/i]</b><br>
                            <b class="orange-text">Sublinhado:</b>  <b>[u]</b><u>Texto Sublinhado</u><b>[/u]</b><br>
			    <b class="orange-text">links:</b> <b>[url=</b>http://www.url.com.br<b>][/url]</b><br>
                            <b class="orange-text">links no Texto:</b> <b>[url=</b>http://www.url.com.br<b>]</b>Texto do Link<b>[/url]</b>

                            <? $elemento1 = "Clique [url=http://www.url.com.br]Aqui[/url]"; ?>
                            <? $elemento2 = "Acesse: [url=http://www.url.com.br][/url]"; ?>

                            <p><b class="black-text">Resultado Exemplo:</b></p>
                            <b class="orange-text">Negrito:</b> <b>Texto em Negrito</b><br>
                            <b class="orange-text">Italico:</b> <i>Texto em Italico</i><br>
                            <b class="orange-text">Sublinhado:</b> <u>Texto Sublinhado</u><br>
                            <b class="orange-text">Links:</b> <?= bbCode($elemento1) ?><br>
                            <b class="orange-text">Links no Texto:</b> <?= bbCode($elemento2) ?><br>

                        </div>
                        <div class="modal-footer">
                            <a class="modal-action modal-close waves-effect waves-blue red-text btn-flat">
                                <i class="material-icons left">close</i>Fechar</a>
                        </div>
                    </div>

                </div>

            </div>

            <!-- SIDEBAR -->
            <div class="col s12 m12 l4">
                <div class="row">

                    <!-- BOTÕES -->
                    <div class="col s12 m4 l12">
                        <div class="card-panel">
                            <div class="row">
                                <center>
                                    <? if ($post->rascunho == '1'): ?>
                                        <button title="Salvar e Publicar" class="btn btn-large blue display-full" name="publicar" value="1" type="submit">
                                            <i class="material-icons left">edit</i> Publicar</button>
                                    <? else: ?>
                                        <button title="Salvar e Publicar" class="btn btn-large blue display-full" name="publicar" type="submit">
                                            <i class="material-icons left">edit</i> Salvar</button>
                                    <? endif; ?>
                                </center>
                            </div>
                            <center>

                                <? if ($post->rascunho == '0'): ?>
                                    <button title="Salvar como Rascunho" class="btn green display-full" name="rascunho" value="1" type="submit">
                                        <i class="material-icons left">save</i> Rascunho
                                    </button>
                                <? else: ?>
                                    <button title="Salvar Rascunho" class="btn green display-full" name="rascunho" value="1" type="submit">
                                        <i class="material-icons left">save</i> Salvar
                                    </button>
                                <? endif; ?>

                            </center>
                        </div>
                    </div>

                    <!-- STATUS -->
                    <? if ($post->rascunho == '0'): ?>
                        <div class="col s12 m4 l12">
                            <div class="card-panel">
                                <label for="texto">Selecionar Status</label>
                                <div class="divider"></div>
                                <div class="input-field">
                                    <select name="status">
                                        <?php if ($post->status == 0): ?>
                                            <option hidden selected value="<?= $post->status ?>">Oculto</option>
                                            <option value='1'>Visivel</option>
                                        <?php else: ?>
                                            <option hidden selected value="<?= $post->status ?>">Visivel</option>
                                            <option value='0'>Oculto</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <? endif; ?>

                    <!-- CATEGORIAS -->
                    <div class="col s12 m4 l12">
                        <div class="card-panel">
                            <label for="texto">Alterar Categoria</label>
                            <div class="divider"></div>
                            <? if ($post->categoria != NULL): ?>
                                <p class="blue-text">
                                    <b class="left grey-text">Atual</b>
                                    <i class="material-icons left grey-text">keyboard_arrow_right</i> <?= $post->categoria ?>
                                </p>
                            <?php else: ?>
                                <p class="center">Sem Categoria</p>
                            <?php endif; ?>

                            <!-- Modal SELECT CATEGORIA -->
                            <div id="SelCateg" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                    <h5>Alterar Categoria</h5>

                                    <?

                                    function categLooping($cat_pai = 0, $nivel = 0) {
                                        $catReturn = "";
                                        $listar = listar("categorias", "WHERE parente='" . $cat_pai . "' ORDER BY nome ASC");
                                        foreach ($listar as $cat):
                                            // VERIFICA ATUAL
                                            $listar = listar("conteudo", "where id =" . $_GET['id']);
                                            foreach ($listar as $post):
                                                $nl = $post->categoria;
                                            endforeach;
                                            $check = ($nl == $cat->nome) ? 'checked' : '';
                                            $hover = ($nl == $cat->nome) ? 'blue-text' : '';

                                            // GERA LOOPING
                                            $catReturn .= '<li>' . '<input ' . $check . ' class="with-gap" name="categoria"'
                                                    . 'type="radio" value="' . $cat->nome . '" id="id' . $cat->id . '" />
                                            <label for="id' . $cat->id . '" class="' . $hover . '">' . $cat->nome . '</label>';
                                            $catReturn .= '<ul>' . categLooping($cat->id, $nivel + 1) . '</ul></li>';
                                        endforeach;
                                        return $catReturn;
                                    }
                                    ?>
                                    <!-- LOOPING DE CATEGORIAS -->
                                    <ul class="lista">
                                        <?= categLooping(); ?>
                                    </ul>

                                    <blockquote class="orange-text">
                                        <i class="material-icons left">info_outline</i> Seleciona uma categoria, cilque em
                                        <mark class="orange lighten-5"><b>OK</b></mark> e depois salve a publicação.
                                    </blockquote>

                                </div>
                                <div class="modal-footer">
                                    <a class="modal-action modal-close waves-effect waves-green green white-text btn-flat">
                                        <i class="material-icons left">check</i>Ok</a>
                                </div>
                            </div>

                            <p class="center">
                                <button data-target="SelCateg" title="Alterar Categoria" class="btn orange modal-trigger display-full">
                                    <i class="material-icons left">autorenew</i> Alterar</button>
                            </p>
                            <p class="center block-round light-blue lighten-5">
                                <a class="light-blue-text text-lighten-2" title="Gerenciar Categoria" href="<?= LinkPostCategoria ?>">
                                    Gerenciar Categorias</a>
                                <br><small class="red-text"><b>Obs.:</b> Salve antes de sair.</small>
                            </p>

                        </div>
                    </div>

                    <!-- IMAGEM -->
                    <div class="col s12 m12 l12">
                        <div class="card-panel">

                            <div class="col s12 m6 l12">
                                <? if ($post->imagem == NULL): ?>
                                    <center><i class="material-icons" style="font-size: 64px">panorama</i></center>
                                <? else: ?>
                                    <img class="responsive-img" src="<?= BaseHost . DirIMG . $post->imagem ?>">
                                <? endif; ?>
                            </div>

                            <div class="col s12 m6 l12">
                                <label>Alterar Imagem Padrão</label>
                                <div class="divider"></div>

                                <? if ($post->imagem != NULL): ?>
                                    <p>
                                        <input name="enviar_img" type="checkbox" id="del" onclick="document.form_post.img.disabled = true" value="del" class="filled-in" />
                                        <label for="del">Remover Imagem</label>
                                    </p>
                                <? endif; ?>

                                <p class="switch">
                                    <label>
                                        <input name="enviar_img" type="checkbox" onclick="document.form_post.img.disabled = false" value="sim">
                                        <span class="lever"></span>
                                        Alterar imagem
                                    </label>
                                </p>

                                <div class="file-field input-field">
                                    <div class="file-path-wrapper">

                                        <div class="btn display-full">
                                            <span>Imagem</span>
                                            <input type="file" disabled name="img">
                                        </div>
                                        <input class="file-path validate" placeholder="Selecione" type="text">
                                    </div>
                                </div>

                                <? if ($post->imagem != NULL): ?>
                                    <div class="input-field">
                                        <input id="imagem_legenda" class="validate" name="imagem_legenda" type="text" value="<?=$post->imagem_legenda?>" >
                                        <label for="imagem_legenda">Legenda da Imagem</label>
                                    </div>
                                <? endif; ?>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <!-- GALERIAS -->
                    <div class="col s12 m12 l12">
                        <div class="card-panel">

                            <div class="input-field">
                                <select class="icons" name="galeria">
                                    <option value='0' data-icon="" class="left circle">Remover Galeria</option>
                                    <option disabled>Atual</option>
                                    <?
                                    $listar = listar("galerias", "where id='" . $post->galeria_id . "'");
                                    foreach ($listar as $galerias): endforeach;

                                    $listar = listar("galerias_fotos", "where id_galeria='" . $galerias->id . "'");
                                    foreach ($listar as $imgIcon):endforeach;

                                    if ($post->galeria_id == 0):
                                        ?>
                                        <option selected value="0">Nenhuma Galeria</option>
                                    <? else: ?>
                                        <option selected value="<?= $galerias->id ?>" data-icon="<?= BaseHost . DirGalerias . $imgIcon->foto ?>" class="left circle"><?= $galerias->titulo ?></option>
                                    <? endif; ?>

                                    <option disabled value='0'>Galerias</option>

                                    <?
                                    $listar = listar("galerias", "ORDER BY titulo ASC");
                                    foreach ($listar as $galerias):

                                        $listar = listar("galerias_fotos", "where id_galeria='" . $galerias->id . "'");
                                        foreach ($listar as $imgIcon):endforeach;
                                        ?>
                                        <option value="<?= $galerias->id ?>" data-icon="<?= BaseHost . DirGalerias . $imgIcon->foto ?>" class="left circle"><?= $galerias->titulo ?></option>
                                    <? endforeach; ?>
                                </select>
                                <label>Incorporar Galeria</label>

                                <p class="center block-round green lighten-5">
                                    <a class="green-text" title="Gerenciar Categoria" href="<?= BaseHost ?>admin/galerias/">
                                        Ir para Galerias</a>
                                    <br><small class="red-text"><b>Obs.:</b> Salve antes de sair.</small>
                                </p>

                            </div>

                        </div>
                    </div>

                    <!-- BOTÕES -->
                    <div class="col s12 m4 l12">
                        <div class="card-panel">
                            <div class="row">
                                <center>
                                    <? if ($post->rascunho == '1'): ?>
                                        <button title="Salvar e Publicar" class="btn btn-large blue display-full" name="publicar" value="1" type="submit">
                                            <i class="material-icons left">edit</i> Publicar</button>
                                    <? else: ?>
                                        <button title="Salvar e Publicar" class="btn btn-large blue display-full" name="publicar" type="submit">
                                            <i class="material-icons left">edit</i> Salvar</button>
                                    <? endif; ?>
                                </center>
                            </div>
                            <center>

                                <? if ($post->rascunho == '0'): ?>

                                    <button title="Salvar como Rascunho" class="btn green display-full" name="rascunho" value="1" type="submit">
                                        <i class="material-icons left">save</i> Rascunho
                                    </button>

                                <? else: ?>
                                    <button title="Salvar como Rascunho" class="btn greenhide-on-med-and-down display-full" name="rascunho" value="1" type="submit">
                                        <i class="material-icons left">save</i> Salvar
                                    </button>
                                <? endif; ?>

                            </center>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
<? endif; ?>