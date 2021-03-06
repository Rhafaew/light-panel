<?
$listar = listar("usuarios", "where id='" . $_SESSION['id'] . "'");
$count = count($listar);
foreach ($listar as $user):endforeach;
if ($user->fone != NULL):
    $fone = explode('-', $user->fone);
else:
    $fone = NULL;
endif;
?>

<div class="col s12">
    <h4 class="blue-text center">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  Meu Perfil</h4>

    <div class="divider"></div>

    <div class="row">

        <div class="col s12 center-on-small-only">
            <h4>Dados Pessoais</h4>
            <p>
                <button data-target="editar_perfil" class="btn green waves-effect waves-light modal-trigger" type="submit" name="action">
                    Editar Perfil <i class="material-icons left">edit</i>
                </button>
            </p>
        </div>

        <div class="col s12 l3">
            <div class="center-block" style="height: 120px; width: 120px">
                <? if ($user->foto == NULL): ?>
                    <i class="material-icons large circle grey white-text">perm_identity</i>
                <? else: ?>
                    <img class="circle img-thumb z-depth-1 hoverable" src="<?= BaseHost . DirFoto . $user->foto ?>">
                <? endif; ?>
            </div>
        </div>

        <div class="col s12 l6 flow-text">
            <?= $user->nome ?>
        </div>

        <div class="col s12 l6">
            <b>Data de Nascinento:</b> <?= $user->data ?>
        </div>

        <div class="col s12 l6">
            <b>Login:</b> <?= $user->nickname ?>
        </div>

        <div class="col s6">
            <b>E-mail:</b> <?= $user->email ?>
        </div>

        <div class="col s12 l6">
            <b>Telefone:</b> <?= $user->fone ?>
        </div>

        <div class="col s12">
            <span class="flow-text"><b>Sobre:</b></span>
            <p><?= $user->sobre ?></p>
        </div>

        <div class="col s12">
            <div class="divider"></div>
            <blockquote class="flow-text red-text">Nivel de Acesso:
                <span class="orange-text"><?= $nivel = ($user->nivel == 0) ? 'Editor' : 'Administrador' ?></span></blockquote>
            <div class="divider"></div>
        </div>

    </div>

    <!-- /////////////////////////////////////////////////////////////////////////// -->

    <div class="col s12 l6">
        <h5>Alterar Senha</h5>

        <form action="<?= LinkPerfil ?>?update_pass&id=<?= $_SESSION['id'] ?>" method="post">

            <div class="input-field">
                <label for="atual">Senha Atual</label>
                <input name="atual" id="atual" type="password" class="validate" required>
            </div>
            <div class="input-field">
                <label for="nova">Nova Senha</label>
                <input name="nova" id="nova" type="password" class="validate" required>
            </div>

            <div class="input-field">
                <label for="cofirma">Confirme a Senha</label>
                <input name="cofirma" id="cofirma" type="password" class="validate" required>
            </div>

            <div class="center-on-small-only">
                <button class="btn blue waves-effect waves-light" type="submit" name="action">Alterar Senha
                    <i class="material-icons right">done</i>
                </button>
            </div>

        </form>

    </div>

</div>

<!-- /////////////////////////////////////////////////////////////////////////// -->

<!-- Modal Structure -->
<div id="editar_perfil" class="modal modal-fixed-footer">
    <form name="form_perfil" action="<?= LinkPerfil ?>?update_perfil&id=<?= $user->id ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
            <h4>Editar Perfil</h4>

            <div class="col s12 l6">

                <div class="input-field">
                    <input id="nome" name="nome" type="text" class="validate" value="<?= $user->nome ?>">
                    <label for="nome" class="active">Nome</label>
                </div>

                <div class="input-field">
                    <input id="data" name="data" type="text" value="<?= $user->data ?>" class="datepicker">
                    <label for="data">Data de Nascimento</label>
                </div>

                <div class="input-field">
                    <input id="nickname" name="nickname" type="text" class="validate" value="<?= $user->nickname ?>">
                    <label for="nickname" class="active">Nick</label>
                </div>

                <div class="input-field">
                    <input id="email" name="email" type="email" class="validate" value="<?= $user->email ?>">
                    <label for="email" class="active">E-mail</label>
                </div>

                <div class="input-field col s3 l2">
                    <input name="ddd" type="text" class="validate" value="<?= $fone[0] ?>">
                    <label for="ddd" class="active">DDD</label>
                </div>

                <div class="input-field col s9 l10">
                    <input name="fone" type="text" class="validate" value="<?= $fone[1] ?>">
                    <label for="fone" class="active">Telefone</label>
                </div>

            </div>

            <div class="col s12 l6">

                <div class="input-field">
                    <textarea id="sobre" name="sobre" class="materialize-textarea"><?= $user->sobre ?></textarea>
                    <label for="sobre">Fale um pouco sobre você.</label>
                </div>

                <div class="col s12">
                    <label>Alterar Foto do Perfil</label>
                    <div class="divider"></div>

                    <? if ($user->foto != NULL): ?>
                        <p>
                            <input name="enviar_img" type="checkbox" id="del" onclick="document.form_perfil.foto.disabled = true" value="del" class="filled-in" />
                            <label for="del">Remover Foto</label>
                        </p>
                    <? endif; ?>

                    <p class="switch">
                        <label>
                            <input name="enviar_img" type="checkbox" onclick="document.form_perfil.foto.disabled = false" value="sim">
                            <span class="lever"></span>
                            Alterar
                        </label>
                    </p>

                    <div class="file-field input-field">
                        <div class="file-path-wrapper">
                            <div class="btn">
                                <span>Imagem</span>
                                <input name="foto" type="file" disabled>
                            </div>
                            <input class="file-path validate" placeholder="Selecione" type="text">
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="modal-footer">
            <a class=" modal-action modal-close waves-effect waves-green btn-flat">
                <i class="material-icons left">arrow_back</i>Cancelar</a>
            <button class="modal-action modal-close waves-effect waves-green btn-flat" type="submit">
                <i class="material-icons left">save</i> Salvar</button>
        </div>
    </form>
</div>