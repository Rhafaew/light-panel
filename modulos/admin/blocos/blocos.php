<div class="col s12">
    <p>
        <span class="left">
            <button data-target="newBloco" title="Criar um novo bloco" class="btn-flat blue white-text modal-trigger" type="submit">
            <i class="material-icons">add</i></button>
        </span>
    </p>    
    
    <h4 class="brown-text center">Blocos</h4>
    <div class="divider"></div>

    <!-- Modal Structure -->
    <div id="newBloco" class="modal col m6 l3">

        <form action="<?= LinkWidBlocos ?>?new_bloco" method="post">
            <div class="modal-content">
                <div class="col s12">
                    <h4>Novo Bloco</h4>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="last_name" name="nome" type="text" class="validate">
                        <label for="last_name">Nome do Bloco</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <select name="tipo">
                            <option value="" disabled selected>Selecione um tipo</option>
                            <option value="txt">Texto</option>
                            <option value="cod">Incorporar</option>
                            <option value="img">Imagem</option>
                        </select>
                        <label>Tipo do Bloco</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <select name="lado">
                            <option disabled selected>Selecione uma Coluna</option>
                            <option value='0'>Coluna A</option>
                            <option value='1'>Coluna B</option>
                        </select>
                        <label>Coluna</label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="waves-effect waves-purple btn-flat blue-text">
                    <i class="material-icons left">save</i>Concluir</button>

                <a class=" modal-action modal-close waves-effect waves-green btn-flat">
                    <i class="material-icons left">arrow_back</i>Cancelar</a>
            </div>
        </form>

    </div>

</div>

<!-- ///////////////////// -->
<!-- // Blocos Coluna A // -->
<!-- ///////////////////// -->

<div class="row">
    <div class="col s12 m6 l3">
        <span class="flow-text">Coluna A</span>
        <div class="row"><div class="divider"></div></div>

        <?
        $listar = listar('blocos', "WHERE lado='0' order by ordem ASC");
        foreach ($listar as $blocos):
            ?>

            <div class="card">
                <div class="card-content">
                    <span class="card-title"><?= $blocos->nome ?></span>

                    <div class="row">
                        <? if ($blocos->nome_view == 1): ?>
                            <a title="Clique para Ocultar" href="<?= LinkWidBlocos ?>?update_bloco_nome_view&id=<?= $blocos->id ?>" class="green-text">
                                <i class="material-icons left">visibility</i> Titulo Visivel</a>
                        <? else: ?>
                            <a title="Clique para Mostrar" href="<?= LinkWidBlocos ?>?update_bloco_nome_view&id=<?= $blocos->id ?>" class="blue-grey-text">
                                <i class="material-icons left">visibility_off</i> Titulo Oculto</a>
                        <? endif; ?>
                    </div>

                    <p><b>Tipo de bolco:</b> <?= $blocos->tipo ?></p>
                    <? /* = html_entity_decode($blocos->conteudo, ENT_QUOTES) */ ?>

                    <div class="input-field">
                        <label for="lado" class="active">Coluna a ser exibido</label>
                        <select name="lado" onchange="Menu('parent', this, 0)">
                            <?php if ($blocos->lado == 0): ?>
                                <option selected value="<?= LinkWidBlocos ?>?id=<?= $blocos->id ?>&update_bloco_lado">Coluna A</option>
                                <option value='<?= LinkWidBlocos ?>?id=<?= $blocos->id ?>&update_bloco_lado'>Coluna B</option>
                            <?php else: ?>
                                <option selected value="<?= LinkWidBlocos ?>?id=<?= $blocos->id ?>&update_bloco_lado">Coluna B</option>
                                <option value='<?= LinkWidBlocos ?>?id=<?= $blocos->id ?>&update_bloco_lado='>Coluna A</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="input-field">
                        <select name="ordem" id="id" onchange="Menu('parent', this, 0)">
                            <optgroup label="Posição Atual">
                                <?
                                $list = listar('blocos', "WHERE id='" . $blocos->id . "' ORDER BY ordem ASC");
                                foreach ($list as $blocoOrdem):
                                    ?>
                                    <option selected value="">Posição <?= $blocoOrdem->ordem ?></option>
                                <? endforeach; ?>
                            </optgroup>

                            <optgroup label="Selecione um Posição">
                                <?
                                for ($p = 1; $p <= count($listar) + 1; $p++):
                                    ?>
                                    <option value="<?= LinkWidBlocos ?>?id=<?= $blocoOrdem->id ?>&update_bloco_ordem=<?= $p ?>&lado=<?= $blocoOrdem->lado ?>">Posição <?= $p ?></option>
                                <? endfor; ?>
                            </optgroup>
                        </select>
                    </div>

                </div>
                <div class="card-action">

                    <? if ($blocos->status == 1): ?>
                        <a title="Clique para Desativar" href="<?= LinkWidBlocos ?>?update_bloco_status&id=<?= $blocos->id ?>" class="blue-text">
                            <i class="material-icons">visibility</i></a>
                    <? else: ?>
                        <a title="Clique para Ativar" href="<?= LinkWidBlocos ?>?update_bloco_status&id=<?= $blocos->id ?>" class="blue-grey-text">
                            <i class="material-icons">visibility_off</i></a>
                    <? endif; ?>

                    <? if ($blocos->tipo != 'cat' and $blocos->tipo != 'pag' and $blocos->tipo != 'sub'): ?>
                        <button data-target="d<?= $blocos->id ?>" title="Apagar" class="btn-link red-text right modal-trigger" type="submit">
                            <i class="material-icons">delete</i></button>
                    <? endif; ?>

                    <button data-target="e<?= $blocos->id ?>" title="Editar" class="btn-link green-text right modal-trigger" type="submit">
                        <i class="material-icons">mode_edit</i></button>
                </div>
            </div>

        <? endforeach; ?>
    </div>

    <!-- ///////////////////// -->
    <!-- // Blocos Coluna B // -->
    <!-- ///////////////////// -->

    <div class="col s12 m6 l3">
        <span class="flow-text">Coluna B</span>
        <div class="row"><div class="divider"></div></div>
        <?
        $listar = listar('blocos', "WHERE lado='1' order by ordem ASC");
        foreach ($listar as $blocos):
            ?>

            <div class="card">
                <div class="card-content">
                    <span class="card-title"><?= $blocos->nome ?></span>

                    <div class="row">
                        <? if ($blocos->nome_view == 1): ?>
                            <a title="Clique para Ocultar" href="<?= LinkWidBlocos ?>?update_bloco_nome_view&id=<?= $blocos->id ?>" class="green-text">
                                <i class="material-icons left">visibility</i> Titulo Visivel</a>
                        <? else: ?>
                            <a title="Clique para Mostrar" href="<?= LinkWidBlocos ?>?update_bloco_nome_view&id=<?= $blocos->id ?>" class="blue-grey-text">
                                <i class="material-icons left">visibility_off</i> Titulo Oculto</a>
                        <? endif; ?>
                    </div>

                    <p><b>Tipo de bolco:</b> <?= $blocos->tipo ?></p>
                    <? /* = html_entity_decode($blocos->conteudo, ENT_QUOTES) */ ?>

                    <div class="input-field">
                        <label for="lado" class="active">Coluna a ser exibido</label>
                        <select name="lado" onchange="Menu('parent', this, 0)">
                            <?php if ($blocos->lado == 0): ?>
                                <option selected value="<?= LinkWidBlocos ?>?id=<?= $blocos->id ?>&update_bloco_lado">Coluna A</option>
                                <option value='<?= LinkWidBlocos ?>?id=<?= $blocos->id ?>&update_bloco_lado'>Coluna B</option>
                            <?php else: ?>
                                <option selected value="<?= LinkWidBlocos ?>?id=<?= $blocos->id ?>&update_bloco_lado">Coluna B</option>
                                <option value='<?= LinkWidBlocos ?>?id=<?= $blocos->id ?>&update_bloco_lado='>Coluna A</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="input-field">
                        <select name="ordem" id="id" onchange="Menu('parent', this, 0)">
                            <optgroup label="Posição Atual">
                                <?
                                $list = listar('blocos', "WHERE id='" . $blocos->id . "' ORDER BY ordem ASC");
                                foreach ($list as $blocoOrdem):
                                    ?>
                                    <option selected value="">Posição <?= $blocoOrdem->ordem ?></option>
                                <? endforeach; ?>
                            </optgroup>

                            <optgroup label="Selecione um Posição">
                                <?
                                for ($p = 1; $p <= count($listar) + 1; $p++):
                                    ?>
                                    <option value="<?= LinkWidBlocos ?>?id=<?= $blocoOrdem->id ?>&update_bloco_ordem=<?= $p ?>&lado=<?= $blocoOrdem->lado ?>">Posição <?= $p ?></option>
                                <? endfor; ?>
                            </optgroup>
                        </select>
                    </div>

                </div>
                <div class="card-action">

                    <? if ($blocos->status == 1): ?>
                        <a title="Clique para Desativar" href="<?= LinkWidBlocos ?>?update_bloco_status&id=<?= $blocos->id ?>" class="blue-text">
                            <i class="material-icons">visibility</i></a>
                    <? else: ?>
                        <a title="Clique para Ativar" href="<?= LinkWidBlocos ?>?update_bloco_status&id=<?= $blocos->id ?>" class="blue-grey-text">
                            <i class="material-icons">visibility_off</i></a>
                    <? endif; ?>

                    <? if ($blocos->tipo != 'cat' and $blocos->tipo != 'pag' and $blocos->tipo != 'sub'): ?>
                        <button data-target="d<?= $blocos->id ?>" title="Apagar" class="btn-link red-text right modal-trigger" type="submit">
                            <i class="material-icons">delete</i></button>
                    <? endif; ?>

                    <button data-target="e<?= $blocos->id ?>" title="Editar" class="btn-link green-text right modal-trigger" type="submit">
                        <i class="material-icons">mode_edit</i></button>
                </div>
            </div>

        <? endforeach; ?>

    </div>


</div>
<div class="row">

    <?
    $listar = listar('blocos');
    foreach ($listar as $blocos):
        ?>

        <!-- Modal Structure - EDITAR -->
        <? $modalFixed = ($blocos->tipo == 'txt') ? 'modal-fixed-footer' : '' ?>
        <div id="e<?= $blocos->id ?>" class="modal <?= $modalFixed ?>">
            <form action="<?= LinkWidBlocos ?>?update_bloco&id=<?= $blocos->id ?>" name="form_post" method="post" enctype="multipart/form-data">
                <input name="liminte" type="hidden" value="120"><!-- Valor do length -->
                <div class="modal-content">
                    <span class="flow-text">Editar Bloco "<?= $blocos->nome ?>"</span>

                    <div class="row">
                        <div class="input-field">
                            <label for="nome" class="active">Nome do Bloco</label>
                            <input id="nome" name="nome" type="text" value="<?= $blocos->nome ?>" class="validate">
                        </div>
                    </div>
                    <? if ($blocos->tipo != 'cat' and $blocos->tipo != 'pag' and $blocos->tipo != 'sub'): ?>

                        <? if ($blocos->tipo == 'img'): ?>

                            <div class="file-field input-field">
                                <div class="btn">
                                    <span><i class="material-icons">image</i></span>
                                    <input type="file" name="img">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" placeholder="Selecione" type="text">
                                </div>
                            </div>

                        <? else: ?>
                            <div class="input-field">
                                <? $editor = ($blocos->tipo == 'txt') ? 'editor_txt' : $editor = ($blocos->tipo == 'cod') ? 'editor_code' : ''; ?>
                                <textarea name="conteudo" class="<?= $editor ?>"><?= $blocos->conteudo ?></textarea>
                            </div>
                        <? endif; ?>
                    <? endif; ?>
                </div>
                <div class="modal-footer">
                    <a class="modal-action modal-close waves-effect waves-green btn-flat">
                        <i class="material-icons left">arrow_back</i>Cancelar</a>
                    <button type="submit" class="waves-effect waves-purple btn-flat blue-text">
                        <i class="material-icons left">save</i>Salvar</button>
                </div>
            </form>
        </div>

        <!-- Modal DELETE -->
        <div id="d<?= $blocos->id ?>" class="modal">

            <div class="modal-content">
                <h5>Apagar Bloco "<span class="red-text"><?= $blocos->nome ?></span>"</h5>
                <p>Este bloco será apagado. Deseja continuar?</p>
            </div>
            <div class="modal-footer">
                <a class=" modal-action modal-close waves-effect waves-green btn-flat">
                    <i class="material-icons left">arrow_back</i>Não</a>
                <a href="<?= LinkWidBlocos ?>?delete_bloco&id=<?= $blocos->id ?>" class="waves-effect waves-red btn-flat red-text">
                    <i class="material-icons left">delete_forever</i>Sim</a>
            </div>
        </div>

    <? endforeach; ?>

    <div class="col s12 m6 l4">
        <div class="card small">
            <div class="card-content">
                <span class="card-title">Facebook</span>
                <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
                <a href="#">This is a link</a>
                <a href="#">This is a link</a>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l4">
        <div class="card small">
            <div class="card-content">
                <span class="card-title">Twitter</span>
                <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
                <a href="#">This is a link</a>
                <a href="#">This is a link</a>
            </div>
        </div>
    </div>

</div>