<?php
$listar = listar("galerias", "where id =" . $_GET['id']);
foreach ($listar as $galerias):endforeach;

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

            <p>
                <span class="left">
                    <a href="<?= LinkGalerias ?>" class="btn orange"><i class="material-icons">arrow_back</i></a>
                </span>
            </p>
            <div class="clearfix hide-on-med-and-up"></div>

            <h4 class="green-text center">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  Atualizar Galeria</h4>
            <div class="divider"></div>
        </div>
    </div>
    <form action="<?= LinkGaleriaUpdate ?>?update_galeria&id=<?= $_GET['id'] ?>" name="form_galeria" method="post">

        <div class="card col s12 m6 l4">
            <div class="card-content">
                <div class="input-field">
                    <i class="material-icons prefix">title</i>
                    <label for="titulo" class="active">Titulo da Galeria</label>
                    <input id="titulo" name="titulo" type="text" class="validate" value="<?= $galerias->titulo ?>" required >
                </div>

                <div class="input-field">
                    <label for="descricao" class="active">Descrição</label>
                    <textarea id="descricao" name="descricao" class="materialize-textarea" required><?= $galerias->descricao ?></textarea>
                </div>

                <div class="input-field">
                    <select name="status" required>
                        <option disabled selected>Selecione um Status</option>
                        <? if ($galerias->status == 1): ?>
                            <option hidden selected value="<?= $galerias->status ?>">Ativa</option>
                            <option hidden value="0">Inativa</option>
                        <? else: ?>
                            <option hidden selected value="<?= $galerias->status ?>">Inativa</option>
                            <option hidden value="1">Ativa</option>
                        <? endif; ?>
                    </select>
                </div>

            </div>

            <div class="card-action">
                <button class="btn blue" type="submit"><i class="material-icons left">save</i> Atualizar</button>
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